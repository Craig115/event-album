<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Album;
use App\User;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
  public function __construct(Comment $comment)
  {
    $this->middleware('owner', ['only'  =>  'edit']);
  }

  public function show(Comment $comment)
  {
    return view('comments.show', compact('comment'));
  }

  public function store(Request $request, Album $album)
  {
      $this->validate($request, [
          'comment' => 'required',
      ]);

      $comment = new Comment($request->all());

      $album->createComment($comment);

      flash('Your comment has been added.', 'success');

      return back();
  }

  public function edit(Comment $comment)
  {
      return view('comments.edit', compact('comment'));
  }

  public function update(Request $request, Comment $comment, Album $album)
  {
      $comment->update($request->all());

      flash('Comment updated.', 'success');

      return back();
  }

  public function delete(Request $request, Comment $comment)
  {
      $comment->delete($request->all());

      flash('Your comment has been deleted.', 'error');

      return back();
  }
}
