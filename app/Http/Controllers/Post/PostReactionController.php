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

  public function reaction(Request $request)
  {
    $data = $request->only(['post_id', 'user_id']);
    return $this->service->create($data);
  }
}
