<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['comment_id', 'post_id', 'user_id', 'reaction'])]
class CommentsReaction extends Model
{
  use HasFactory;

  protected $table = 'comments_reaction';

  public function comment()
  {
    return $this->belongsTo(Comments::class, 'comment_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  protected function casts(): array
  {
    return [
      'created_at' => 'datetime',
      'updated_at' => 'datetime'
    ];
  }
}
