<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Providers\Service\Comments\CommentsService;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

  protected CommentsService $service;


  public function __construct(CommentsService $service)
  {

    $this->service = $service;
  }


  public function store(Request $request)
  {
    $comment = $this->service->createComment($request->all());
    if ($comment) {
      return redirect()->back()->with('success', 'Comment added successfully!');
    } else {



      return redirect()
        ->back()
        ->with('error', 'Invalid credentials');
    }
  }


  public function select(Request $request)
  {
    var_dump($request->input('post_id'));
    $comments = $this->service->listCommentsByPostId($request->input('post_id'));
    var_dump($comments);
    return response()->json($comments);
  }
}
