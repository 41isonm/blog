<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Providers\Service\Post\PostService;
use Illuminate\Http\Request;

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
    return view('home.home', ['posts' => $posts]);
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
