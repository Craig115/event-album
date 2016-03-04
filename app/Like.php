<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function album()
    {
      return $this->belongsTo(Album::class);
    }

    public function comment()
    {
      return $this->belongsTo(Comment::class);
    }
}
