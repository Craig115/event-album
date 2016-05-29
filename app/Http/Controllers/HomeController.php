<?php

namespace App\Http\Controllers;

use Session;
use App\Album;
use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('recent', ['only' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Album $album)
    {
      $album = $request->session()->get('album');

      return view('home', compact('album'));
    }
}
