<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
  public function show(Album $album)
  {
    $album->load('comments.user');

    return view('albums.show', compact('album'));
  }

  public function store(Request $request, User $user)
  {
      $user->createAlbum(
          new Album($request->all())
      );

      return back();
  }

  public function edit(Album $album)
  {
      return view('albums.edit', compact('album'));
  }

  public function update(Request $request, Album $album)
  {
      $album->update($request->all());

      return back();
  }
}
