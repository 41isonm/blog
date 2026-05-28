<?php

namespace App\Providers\Service\CommentsReaction;

use App\Models\CommentsReaction;

class CommentsReactionService
{
  protected CommentsReaction $model;

  public function __construct(CommentsReaction $model)
  {
    $this->model = $model;
  }

  public function createCommentReaction(array $data): ?CommentsReaction
  {
    $existing = $this->model
      ->where('comment_id', $data['comment_id'])
      ->where('user_id', $data['user_id'])
      ->first();

    if ($existing) {
      $existing->delete();
      return null;
    }

    $reaction = new CommentsReaction();
    $reaction->fill([
      'comment_id' => $data['comment_id'],
      'user_id' => $data['user_id'],
      'post_id' => $data['post_id'] ?? null,
      'reaction' => $data['reaction'] ?? '👍'
    ]);
    $reaction->save();

    return $reaction;
  }

  public function getReactionCountByCommentId(int $commentId): int
  {
    return $this->model->where('comment_id', $commentId)->count();
  }

  public function getUserReactionByCommentId(int $commentId, int $userId): ?CommentsReaction
  {
    return $this->model
      ->where('comment_id', $commentId)
      ->where('user_id', $userId)
      ->first();
  }

  public function listReactionsByCommentId(int $commentId)
  {
    return $this->model
      ->where('comment_id', $commentId)
      ->with('user')
      ->get();
  }

  public function getReactionCountsByCommentIds(array $commentIds): array
  {
    $reactions = $this->model
      ->whereIn('comment_id', $commentIds)
      ->groupBy('comment_id')
      ->selectRaw('comment_id, COUNT(*) as count')
      ->get();

    $counts = [];
    foreach ($reactions as $reaction) {
      $counts[$reaction->comment_id] = $reaction->count;
    }

    return $counts;
  }
}
