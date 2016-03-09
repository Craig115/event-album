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

class LikeController extends Controller
{

  public function store(Request $request, Album $album, Like $like)
  {
        $check = DB::table('likes')->where('album_id', '=', $album->id)->where('user_id', '=', Auth::id())->get();

        if($check){

          foreach($check as $r){

            if($r->user_id != Auth::id()){

              $like = new Like($request->all());

              $album->likeAlbum($like, Auth::id());

              return back();

            } else {

              return view('albums.liked', compact('album'));

            }

          }

        } else {

          $like = new Like($request->all());

          $album->likeAlbum($like, Auth::id());

          return back();

        }

  }

}
