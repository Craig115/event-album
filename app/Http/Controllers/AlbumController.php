<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Album;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{

  public function __construct(Album $album)
  {
    $this->middleware('liked', ['only'  =>  'show']);

    $this->middleware('owner', ['only' => [
        'edit',
        'delete',
    ]]);
  }


  public function show(Album $album)
  {
    $album->load('comments.user');
  }

  public function store(Request $request, User $user)
  {
      $this->validate($request, [
          'title' => 'required',
      ]);

      $album = new Album($request->all());

      $user->createAlbum($album, Auth::id());

      flash('Successfully created new album.', 'success');

      return back();
  }

  public function edit(Album $album)
  {
      return view('albums.show.edit', compact('album'));
  }

  public function update(Request $request, Album $album)
  {
      $album->update($request->all());

      flash('Album details have been updated.', 'success');

      return back();
  }

  public function delete(Request $request, Album $album)
  {
      $album->delete($request->all());

      flash('Album has been deleted.', 'error');

      return back();
  }
}
