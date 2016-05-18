<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Image;

class ChangeSettings
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
      if($request->profile_pic != ""){
        $user = $request->user;

        $name = $user->id . date('Y-m-d-h-i-s') . '.png';
        $path = public_path('images/profile/') . $name;

        $image = Image::make($request->file('profile_pic'));
        $image->save($path);

        $request->profile_pic = '/public/images/profile/' . $name;

        $user->update(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'profile_pic' => $request->profile_pic]);
        return back();
        
      } else {
        $request->profile_pic = "default.png";
        $next($request);
      }

    }

}
