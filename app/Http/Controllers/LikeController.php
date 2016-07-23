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

  public function store(Request $request, User $user, Album $album)
  {
    $like = new Like($request->all());

    $album->likeAlbum($like);

    return back();
  }

  public function unlike(Request $request, Like $like)
  {
      $like->delete($request->all());

      return back();
  }


}
