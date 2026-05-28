<?php

namespace App\Http\Controllers\CommentsReaction;

use App\Http\Controllers\Controller;
use App\Providers\Service\CommentsReaction\CommentsReactionService;
use Illuminate\Http\Request;

class CommentsReactionController extends Controller
{
  protected CommentsReactionService $service;

  public function __construct(CommentsReactionService $service)
  {
    $this->service = $service;
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'comment_id' => 'required|integer|exists:comments,id',
      'user_id' => 'required|integer|exists:users,id',
      'post_id' => 'sometimes|integer|exists:posts,id',
      'reaction' => 'sometimes|string|max:10'
    ]);

    $reaction = $this->service->createCommentReaction($validated);

    return response()->json([
      'success' => true,
      'message' => $reaction ? 'Reaction added' : 'Reaction removed',
      'reaction' => $reaction
    ]);
  }

  public function getCount(Request $request)
  {
    $commentId = $request->input('comment_id');
    $count = $this->service->getReactionCountByCommentId($commentId);

    return response()->json([
      'count' => $count,
      'comment_id' => $commentId
    ]);
  }

  public function getCountMultiple(Request $request)
  {
    $commentIds = $request->input('comment_ids', []);
    $counts = $this->service->getReactionCountsByCommentIds($commentIds);

    return response()->json($counts);
  }

  public function getUserReaction(Request $request)
  {
    $commentId = $request->input('comment_id');
    $userId = $request->input('user_id');

    $reaction = $this->service->getUserReactionByCommentId($commentId, $userId);

    return response()->json([
      'has_reaction' => $reaction !== null,
      'reaction' => $reaction
    ]);
  }
}
