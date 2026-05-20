<?php

namespace App\Providers\Service\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PostReactionService
{
  protected Model $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }


  public function getCountReaction($post): int
  {
    return $this->model->where('post_id', $post)->count();
  }


  public function create(array $attributes): Model
  {
    return $this->model->create($attributes);
  }
}
