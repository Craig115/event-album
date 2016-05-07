<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Album;
use App\User;
use Image;
use App\Photo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
  public function store(Request $request, Album $album)
  {
    $userid = $request->album->user_id;
    $name = $userid . date('Y-m-d-h-i-s') . '.png';
    $path = public_path('images/') . $name;
    $nicepath = '/public/images/' . $name;

    $image = Image::make($request->file('fileName'));
    $image->save($path);

    $photo = new Photo($request->all());

    $album->uploadImage($photo, $nicepath, $userid);

    return back();
  }

  public function upload()
  {
    return view('images.upload');
  }
}
