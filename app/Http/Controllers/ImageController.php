<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Album;
use App\User;
use App\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function store(Request $request)
    {
      $img = new Image($request->all());

      return $img;
    }

    public function upload()
    {
      return view('images.upload');
    }

}
