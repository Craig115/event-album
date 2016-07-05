<?php

namespace App\Repositories;

use Auth;
use App\Album;
use App\User;
use Image;
use File;
use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;

class ProfileRepository implements PhotoRepositoryInterface {

  protected $request;

  public function __construct(Request $request, Album $album)
    {
        $this->request = $request;
    }

  public function uploadPhoto()
  {
    $user = $request->user;

    //If it's the first time the user is changing their pic, don't delete anything
    if($request->profile_pic != '/public/images/profile/default.png'){
      File::delete(public_path('../' . $user->profile_pic));
    }

    $name = $user->id . date('Y-m-d-h-i-s') . '.png';
    $path = public_path('images/profile/') . $name;

    //Create a new image then store it in the profile folder
    $image = Image::make($request->file('profile_pic'));
    $image->resize(200, 200);
    $image->save($path);

    $request->profile_pic = '/public/images/profile/' . $name;

    //Kind of had to force this a little to get things to work the way I wanted them to
    $user->update(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'profile_pic' => $request->profile_pic]);

    return back();

  }

  public function createPhoto()
  {
  }

}
