<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

  public function __construct(User $user)
  {

    $this->middleware('settings', ['only'  =>  'updateDetails']);
  }

  public function show(User $user)
  {
    return view('profile.show', compact('user'));
  }

  public function settings(User $user)
  {
    return view('profile.settings')->with('user', Auth::user());
  }

  public function updateDetails(Request $request, User $user)
  {
    $user->update(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'profile_pic' => $request->profile_pic->path]);

    flash('Your details have now been updated.', 'success');

    return back();
  }

}
