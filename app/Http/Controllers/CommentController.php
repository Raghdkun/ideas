<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use App\Models\Comment;

use Illuminate\Http\Request;
use PharIo\Manifest\Url;

class CommentController extends Controller
{

    public function store(Feeds $feed)
    {
        // request()->validate([
        //     "content" => "required|min:3|max:240",
        // ]);



        $comment = new Comment();
        // $deccomment = Comment::orderBy('created_at', 'DESC'); 
        $comment->feeds_id = $feed->id;
        $comment->user_id = auth()->user()->id;
        $comment->user_name = auth()->user()->name;
        $comment->content = request()->get("content");



        $comment->save();



        // return redirect()->route("feed.show", $feed->id)->with("success","comment posted");


        return redirect()->back()->with("success","comment posted");
    }
}
