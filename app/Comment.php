<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function album()
    {
      return $this->belongsTo(Album::class);
    }

    public function scopeSelectAlbumComments($query, $albumid)
   {
       return $query->where('album_id', '=', $albumid);
   }

}
