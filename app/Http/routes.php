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
    Route::post('/user/search', 'UserController@search');

    //Album Routes
    Route::get('/albums/{album}', 'AlbumController@show');
    Route::post('profile/{user}/albums', 'AlbumController@store');
    Route::get('/albums/{album}/edit', 'AlbumController@edit');
    Route::patch('albums/{album}', 'AlbumController@update');
    Route::delete('/albums/{album}', 'AlbumController@delete');

    //Comment Routes
    Route::post('albums/{album}/comments', 'CommentController@store');
    Route::get('/comments/{comment}/edit', 'CommentController@edit');
    Route::patch('comments/{comment}', 'CommentController@update');
    Route::delete('/comments/{comment}', 'CommentController@delete');

    //Like Routes
    Route::post('albums/{album}/likes', 'LikeController@store');
    Route::delete('/likes/{like}', 'LikeController@unlike');

    //Photo Routes
    Route::post('uploads/{album}', 'PhotoController@store');
    Route::delete('/photos/{photo}', 'PhotoController@delete');

    //Settings
    Route::get('/settings', 'ProfileController@settings');
    Route::patch('/settings/update/{user}', 'ProfileController@updateDetails');

    //Image Splash Pages
    Route::get('/images/{photo}', 'PhotoController@show');

    //Auth
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

});
