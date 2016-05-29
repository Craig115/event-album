<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Album;
use App\User;
use DB;
use Image;
use App\Photo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
  public function store(Request $request, Album $album)
  {
    //Set up the names and the paths
    $userid = $request->album->user_id;
    $name = $userid . date('Y-m-d-h-i-s') . '.png';
    $path = public_path('images/') . $name;
    $nicepath = '/public/images/' . $name;

    //Create Image
    $image = Image::make($request->file('fileName'));
    $image->save($path);

    //Now make a thumbnail version
    $thumbpath = public_path('images/thumb/') . $name;
    $thumbnail = '/public/images/thumb/' . $name;
    $image->crop(150, 150);
    $image->save($thumbpath);

    $photo = new Photo($request->all());

    $album->uploadImage($photo, $nicepath, $thumbnail, $userid);

    return back();
  }

  public function upload()
  {
    return view('images.upload');
  }

  public function show(Photo $photo)
  {
    return view('images.show', compact('photo'));
  }

  public function delete(Request $request, Photo $photo)
  {
    $photo = $request->photo;

    $photo->delete($request->all());

    return back();
  }
}
