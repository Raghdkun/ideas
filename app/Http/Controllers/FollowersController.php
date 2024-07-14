<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    public function follow( User $user){

        $follower = auth()->user(); 

        $follower->followings()->attach($user);


      return  redirect()->route('user.show', $user->id)->with('success', 'You followed this feeder');
    }
    public function unfollow(User $user){

        $follower = auth()->user(); 

        $follower->followings()->detach($user);
        
      return  redirect()->route('user.show', $user->id)->with('success', 'You unfollowed this feeder');

    }
}
