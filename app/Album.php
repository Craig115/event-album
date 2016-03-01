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
}
