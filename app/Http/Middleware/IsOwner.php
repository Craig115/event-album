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
        $album = $request->album;

        if($request->album->user_id  == Auth::id()){

            return $next($request);

        } else {

            return view ('404');

        }

    }
}
