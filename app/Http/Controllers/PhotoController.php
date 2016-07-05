<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Album;
use App\User;
use DB;
use Image;
use File;
use App\Photo;
use App\Http\Requests;
use App\Repositories\PhotoRepositoryInterface;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{

  protected $repository;

  public function store(PhotoRepositoryInterface $repository, Album $album)
  {
    $this->repository = $repository;

    $this->repository->uploadPhoto();
    $this->repository->createPhoto();
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

    // Delete remove the image form the server then deleted from DB
    File::delete([public_path('../' . $photo->path), public_path('../' . $photo->thumbnail)]);
    $photo->delete($request->all());

    return back();
  }
}
