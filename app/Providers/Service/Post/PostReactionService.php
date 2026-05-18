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

  /**
   * Find a model by its primary key.
   *
   * @param  mixed  $id
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function find($id): ?Model
  {
    return $this->model->find($id);
  }

  /**
   * Get all records of the model.
   *
   * @param  array  $columns
   * @return \Illuminate\Support\Collection
   */
  public function all(array $columns = ["*"]): Collection
  {
    return $this->model->all($columns);
  }


  public function create(array $attributes): Model
  {
    return $this->model->create($attributes);
  }



  /*
  public function update(array $attributes, $id): Model
  {
    $model = $this->find($id);
    if ($model) {
      $model->update($attributes);
      return $model;
    }
    throw new \Exception("Model not found");
  }*/
}
