<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Providers\Service\Post\PostReactionService as PostPostReactionService;
use App\Providers\Service\PostReactionService;
use Illuminate\Http\Request;

class PostReactionController extends Controller
{

  protected PostPostReactionService $service;


  public function __construct(PostPostReactionService $service)
  {

    $this->service = $service;
  }

  public function creatreaction()
  {

      session([
        'user_id' => $data['user_id'],
        'post_id' => $data['post_id']
      ]
    )

    return $this->service->create($data);
  }
}
