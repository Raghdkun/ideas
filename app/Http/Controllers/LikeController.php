<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use Illuminate\Http\Request;

class LikeController extends Controller
{
public function like(Feeds $feeds){


    $liker = auth()->user() ; 
    
    $liker->likes()->attach($feeds);

    return  redirect()->route('home',);

}
public function unlike(Feeds $feeds){
    $liker = auth()->user() ; 
    
    $liker->likes()->attach($feeds->id);

    return  redirect()->route('home', $feeds->id);
}
}
