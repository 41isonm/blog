<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Providers\Service\Login\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

  protected LoginService $service;


  public function __construct(LoginService $service)
  {

    $this->service = $service;
  }



  public function login(Request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');

    $user = $this->service->login($email, $password);

    if ($user) {

      session([
        'user_id' => $user->id,
        'user_name' => $user->name,
        'user_email' => $user->email
      ]);

      $posts = \App\Models\Post::all();

      return view('home.home', ['posts' => $posts]);
    }

    return redirect()
      ->back()
      ->with('error', 'Invalid credentials');
  }
}
