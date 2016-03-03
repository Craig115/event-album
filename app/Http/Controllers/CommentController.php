<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\User;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
  public function show(Comment $comment)
  {
    return view('comments.show', compact('comment'));
  }

  public function store(Request $request, User $user, Album $album)
  {
      $album->createComment(
          new Comment($request->all())
      );

      return back();
  }
}
