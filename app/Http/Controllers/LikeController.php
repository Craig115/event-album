<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
  public function show(Like $like)
  {
    return view('comments.show', compact('comment'));
  }

  public function store(Request $request, Like $like)
  {
      $this->validate($request, [
          'id' => 'required',
      ]);

      $comment = new Comment($request->all());

      $album->createComment($comment, 1);

      return back();
  }
}
