<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Providers\Service\Post\PostService;
use App\Providers\Service\CommentsReaction\CommentsReactionService;
use Illuminate\Http\Request;
use App\Models\PostReaction;
use App\Models\Comments;
use App\Models\CommentsReaction;

class PostController extends Controller
{

  protected PostService $service;
  protected CommentsReactionService $commentReactionService;


  public function __construct(PostService $service, CommentsReactionService $commentReactionService)
  {
    $this->service = $service;
    $this->commentReactionService = $commentReactionService;
  }

  function index()
  {
    $posts = $this->service->all();

    $reactionCounts = PostReaction::selectRaw('post_id, count(*) as total')
      ->groupBy('post_id')
      ->pluck('total', 'post_id')
      ->mapWithKeys(fn($total, $postId) => [(int) $postId => (int) $total]);

    // Carrega todos os comentários de uma vez, agrupados por post_id
    $commentsByPost = Comments::whereIn('post_id', $posts->pluck('id'))
      ->orderBy('created_at', 'asc')
      ->get()
      ->groupBy(fn($c) => (string) $c->post_id);

    // Carrega reações dos comentários
    $allCommentIds = $commentsByPost->flatten()->pluck('id')->toArray();

    $commentReactionCounts = [];
    $userCommentReactions = [];

    if (!empty($allCommentIds)) {
      $commentReactionCounts = CommentsReaction::selectRaw('comment_id, count(*) as total')
        ->whereIn('comment_id', $allCommentIds)
        ->groupBy('comment_id')
        ->pluck('total', 'comment_id')
        ->mapWithKeys(fn($total, $commentId) => [(int) $commentId => (int) $total])
        ->toArray();

      // Carrega reações do usuário autenticado
      $userId = session('user_id');
      if ($userId) {
        $userReactions = CommentsReaction::whereIn('comment_id', $allCommentIds)
          ->where('user_id', $userId)
          ->pluck('id', 'comment_id')
          ->toArray();
        $userCommentReactions = array_combine(
          array_keys($userReactions),
          array_fill(0, count($userReactions), true)
        );
      }
    }

    return view(
      'home.home',
      compact(
        'posts',
        'reactionCounts',
        'commentsByPost',
        'commentReactionCounts',
        'userCommentReactions'
      )
    );
  }

  function find(int $id)
  {
    return $this->service->find($id);
  }

  public function create(Request $request)
  {

    $data = $request->only(['title', 'content']);
    $data['user_id'] = session('user_id');

    return $this->service->create($data);
  }
}
