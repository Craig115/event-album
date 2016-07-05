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

class PhotoRepository implements PhotoRepositoryInterface {

  protected $request;

  public function __construct(Request $request, Album $album)
    {
        $this->request = $request;
    }

  public function uploadPhoto()
  {
    //Set up the names and the paths
    $this->request->name = Auth::id() . date('Y-m-d-h-i-s') . '.png';
    $path = public_path('images/') . $this->request->name;

    //Create Image
    $image = Image::make($this->request->file('fileName'));
    $image->save($path);

    //Now make a thumbnail version
    $thumbpath = public_path('images/thumb/') . $this->request->name;
    $image->crop(150, 150);
    $image->save($thumbpath);
  }

  public function uploadProfile()
  {
    //Set up the names and the paths
    $name = Auth::id() . date('Y-m-d-h-i-s') . '.png';
    $path = public_path('images/profile/') . $name;

    //Create Image
    $image = Image::make($this->request->file('profile_pic'));
    $image->crop(150, 150);

    $this->request->profile_pic->path = '/public/images/profile/' . $name;
    $image->save($path);
  }

  public function createPhoto()
  {
    $photo = new Photo();
    $photo->description = $this->request->description;
    $photo->path = '/public/images/' . $this->request->name;
    $photo->album_id = $this->request->album->id;
    $photo->user_id = $this->request->album->user_id;
    $photo->thumbnail = '/public/images/thumb/' . $this->request->name;

    $this->request->album->savePhoto($photo);
  }

}
