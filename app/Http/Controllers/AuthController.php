<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view("users.register");
    }
    public function store()
    {

        $validated = request()->validate([

            "name" => "required|min:3|max:40",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:8",
            
        ]);

     $user =   User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user)); 
        return redirect()->route("home")->with("success","Account Created!!");
    }


    public function login()
    {
        return view("users.login");
    }

    public function authenticate()
    {

// dd(request()->all());

        $validated = request()->validate([

            
            "email" => "required|email",
            "password" => "required|min:8"
        ]);

      if(auth()->attempt($validated)){
        request()->session()->regenerate();

        return redirect()->route("home")->with("success","Hello There");

      }
        return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();


        return redirect()->route("home");
    }

    public function profile()
    {
        return view("users.profile");
    }
}
