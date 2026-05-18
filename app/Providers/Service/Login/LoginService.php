<?php

namespace App\Providers\Service\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
  protected User $model;

  public function __construct(User $model)
  {
    $this->model = $model;
  }

  public function login($email, $password): ?User
  {
    $user = $this->model
      ->where('email', $email)
      ->first();

    if (!$user) {
      return null;
    }

    if (Hash::check($password, $user->password)) {
      return $user;
    }

    return null;
  }
}
