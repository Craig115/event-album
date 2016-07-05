<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function search(Request $request)
    {
        $user = User::SearchUser($request->username)->get();

        return view('profile.results')->with('user', $user);
    }

}
