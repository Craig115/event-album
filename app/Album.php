<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function createComment(Comment $comment, $userId)
    {
        $comment->user_id = $userId;

        return $this->comments()->save($comment);
    }
}
