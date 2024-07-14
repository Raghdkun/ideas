<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Feeds;


use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



  
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $feeds =   $user->feeds()->latest()->paginate(5);
        return view("users.show", compact("user", "feeds"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $feeds =   $user->feeds()->latest()->paginate(5);
        return view("users.edit", compact("user", "editing", "feeds"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, ?Comment $comment)
    {
        $validated = request()->validate([

            "name" => "required|min:3|max:40",
            "bio" => "nullable|min:1|max:250",
            "image"=> "image",


        ]);
       
        if(request()->has("image")) {
            $imageName = $validated['image']->getClientOriginalName();
            $imagepath = request()->file("image")->storeAs("profile",$imageName , "public");
            $validated['image'] = $imagepath;
            // Storage::disk('public')->delete($user->image) ; 
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

        }
        
        
        

        $user->update($validated);
        // dd($validated); 
        $comment->update([$validated['image']]) ;

        return redirect()->route('myprofile');
    }


    public function profile(){
        return $this->show(auth()->user());
    }


}
