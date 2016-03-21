<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class IsOwner
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
        if($request->album){

            $album = $request->album;

            if($album->user_id  == Auth::id()){

                return $next($request);

            } else {

                return view ('404');

            }

        } elseif ($request->comment) {

            $comment = $request->comment;

            if($comment->user_id == Auth::id()){

              return $next($request);

            } else {

              return view ('404');

            }
        }
    }
}
