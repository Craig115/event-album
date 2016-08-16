<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use File;
use Image;
use App\User;
use App\Http\Requests;
use App\Repositories\PhotoRepositoryInterface;

class ChangeSettings
{

  protected $repository;

  public function __construct(PhotoRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function handle($request, Closure $next)
  {
    if(!empty($request->profile_pic)){

      File::delete([public_path('../' . $request->profile_pic)]);

      $this->repository->uploadProfile($request);

      return $next($request);

    } else {

      $request->user->update(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'profile_pic' => Auth::user()->profile_pic]);

      flash('Your details have now been updated.', 'success');

      return back();

    }

  }

}
