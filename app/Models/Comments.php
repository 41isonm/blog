<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['post_id', 'user_id', 'content'])]
#[Hidden(['id'])]
class Comments extends Authenticatable
{
  /** @use HasFactory<UserFactory> */
  use HasFactory, Notifiable;
  use SoftDeletes;
  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'created_at' => 'datetime',
      'deleted_at' => 'datetime',
      'updated_at' => 'datetime'
    ];
  }
}
