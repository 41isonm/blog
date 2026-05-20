<?php

namespace App\Providers\Service\Comments;

use App\Models\Comments;
use Illuminate\Support\Facades\Hash;

class CommentsService
{
  protected Comments $model;

  public function __construct(Comments $model)
  {
    $this->model = $model;
  }

  public function createComment(array $data): ?Comments
  {
    $comment = new Comments();
    $comment->fill($data);
    $comment->save();

    return $comment;
  }


  public function listCommentsByPostId(int $postId)
  {
    return $this->model->where('post_id', $postId)->get();
  }
}
