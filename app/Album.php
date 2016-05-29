<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title'];

    public function scopeSelectAlbum($query)
    {
        return $query->where('album_id', '=', 3);
    }

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

    public function photos()
    {
      return $this->hasMany(Photo::class);
    }

    public function createComment(Comment $comment, $userId)
    {
      $comment->user_id = $userId;

      return $this->comments()->save($comment);
    }

    public function uploadImage(Photo $photo, $path, $thumbnail, $userId)
    {
      $photo->user_id = $userId;
      $photo->path = $path;
      $photo->thumbnail = $thumbnail;

      return $this->photos()->save($photo);
    }

    public function likeAlbum(Like $like, $userId)
    {
      $like->user_id = $userId;

      return $this->likes()->save($like);
    }

    public function scopeSelectUser($query, $userid)
   {
       return $query->where('user_id', '=', $userid);
   }

   public function scopeSelectAllAlbums($query)
  {
      return $query->orderBy('id','DESC')->limit(10);
  }
}
