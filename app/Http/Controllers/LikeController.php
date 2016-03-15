<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Album;
use App\User;
use DB;
use App\Like;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\AlbumRepository;

class LikeController extends Controller
{

  public function __construct(Album $album)
  {
    $this->middleware('liked', ['album'  => $album]);
  }

  public function store(Album $album)
  {
    //return $album;
  }

}
