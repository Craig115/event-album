<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Auth;
use App\Album;
use App\Comment;

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
      $album = Album::SelectAllAlbums()->with('photos', 'comments')->get();

      $request->session()->flash('album', $album);

      return $next($request);
    }

}
