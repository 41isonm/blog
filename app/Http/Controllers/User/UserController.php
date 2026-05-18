<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\Service\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

  protected UserService $service;


  public function __construct(UserService $service)
  {

    $this->service = $service;
  }


  function find(int $id)
  {
    return $this->service->find($id);
  }

  public function account(Request $request)
  {
    $data = $request->only(['name', 'email', 'password']);
    $data['password'] = bcrypt($data['password']);
    $this->service->create($data);
    return view('login.login');
  }
}
