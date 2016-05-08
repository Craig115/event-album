<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Album;

class MostRecent
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
      $album = Album::SelectAllAlbums()->get();

      $album->load('user', 'photos');

      return view('home')->with('album', $album);
    }

}
