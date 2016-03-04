<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function createAlbum(Album $album)
    {
        return $this->albums()->save($album);
    }
}
