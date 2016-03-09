<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function album()
    {
      return $this->belongsTo(Album::class);
    }
}
