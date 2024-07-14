<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feeds;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function mail(){
        return view('emails.welcome');
    }
    public function index()
    {
        $result = request()->get('search', ''); 
        $feeds= Feeds::orderBy('created_at', 'DESC'); 
        // $comment = Comment::orderBy('created_at','DESC');


        if(request()->has('search')){
            $feeds = $feeds->where('content','LIKE', '%'. request()->get('search', '') . '%') ; 
        }
        return view("dashboard",  [
            'feeds' => $feeds->paginate(5),
            
        ], );
    }

    public function feed()
    {
        return view("feed");
    }
    public function profile()
    {
        return view("users.profile");
    }
    public function terms()
    {
        return view("terms");
    }
}
