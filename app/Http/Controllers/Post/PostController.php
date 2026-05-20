<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Providers\Service\Post\PostService;
use Illuminate\Http\Request;
use App\Models\PostReaction;

class PostController extends Controller
{

  protected PostService $service;


  public function __construct(PostService $service)
  {

    $this->service = $service;
  }

  function index()
  {
    $posts = $this->service->all();

    $posts = $this->service->all();


    $reactionCounts = PostReaction::selectRaw('post_id, count(*) as total')
      ->groupBy('post_id')
      ->pluck('total', 'post_id')
      ->mapWithKeys(fn($total, $postId) => [(int) $postId => (int) $total]);

    return view('home.home', compact('posts', 'reactionCounts'));
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
