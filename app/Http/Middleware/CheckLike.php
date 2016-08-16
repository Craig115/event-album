<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Album;
use App\User;
use DB;
use App\Like;
use App\Repositories\AlbumRepository;


class CheckLike
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $album = $request->album;

        $albumid = $request->album->id;

        $like = Like::SelectLikedAlbum($albumid)->SelectUser(Auth::id())->get();

        if($like == '[]'){

          return view('albums.show.unliked')->with('album', $album);

        } else {

          return view('albums.show.liked')->with('album', $album);

        }

    }

}
