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

  public function createReaction(Request $request)
  {

    $data = $request->all();

    $data['user_id'] = session('user_id');


    return $this->service->create($data);
  }

  public function getCountReaction(Request $request)
  {
    $data = $request->all();
    return $this->service->getCountReaction($data['post_id']);
  }
}
