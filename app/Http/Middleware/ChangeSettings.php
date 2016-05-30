<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use File;
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
      if($request->profile_pic){

        $user = $request->user;

        //If it's the first time the user is changing their pic, don't delete anything
        if($request->profile_pic != '/public/images/profile/default.png'){
          File::delete(public_path('../' . $user->profile_pic));
        }

        $name = $user->id . date('Y-m-d-h-i-s') . '.png';
        $path = public_path('images/profile/') . $name;

        //Create a new image then store it in the profile folder
        $image = Image::make($request->file('profile_pic'));
        $image->save($path);

        $request->profile_pic = '/public/images/profile/' . $name;

        //Kind of had to force this a little to get things to work the way I wanted them to
        $user->update(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'profile_pic' => $request->profile_pic]);
        return back();

      }

    }

}
