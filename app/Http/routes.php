<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    // Profile Routes
    Route::get('/profile/{user}', 'ProfileController@show');

    //Album Routes
    Route::get('/albums/{album}', 'AlbumController@show');
    Route::post('profile/{user}/albums', 'AlbumController@store');
    Route::get('/albums/{album}/edit', 'AlbumController@edit');
    Route::patch('albums/{album}', 'AlbumController@update');
    Route::post('/albums/{album}/delete', 'AlbumController@delete');

    //Comment Routes
    Route::post('albums/{album}/comments', 'CommentController@store');
    Route::get('/comments/{comment}/edit', 'CommentController@edit');
    Route::patch('comments/{comment}', 'CommentController@update');

    //Like Routes
    Route::post('albums/{album}/likes', 'LikeController@store');

    //Auth
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

});
