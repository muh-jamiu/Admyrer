<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("pages.find-matches");
    }

    public function matches(){
        return view("pages.matches");
    }

    public function visits(){
        return view("pages.visits");
    }

    public function friends(){
        return view("pages.friends");
    }

    public function gifts(){
        return view("pages.gifts");
    }

    public function likes(){
        return view("pages.likes");
    }
    
    public function liked(){
        return view("pages.liked");
    }

    
    public function disliked(){
        return view("pages.disliked");
    }

    
    public function stories(){
        return view("pages.stories");
    }

    
    public function hot(){
        return view("pages.hot");
    }

    public function live_users(){
        return view("pages.live_users");
    }

    public function friend_requests(){
        return view("pages.friend_requests");
    }

    public function loginUser(User $user){
        $request = request()->validate([
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
        ]);
        $user = $user->find(1);
        dd($user);
        return;
    }

    public function registerUser(User $user){
        request()->validate([
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required|min:5|max:10",
            "username" => "required|min:5",
        ]);

        if(request()->c_password != request()->password){
            return back()->with("msg", "password does not match");
        }

        $user->first_name = request()->first_name;
        $user->last_name = request()->last_name;
        $user->username = request()->username;
        $user->email = request()->email;
        $user->password = request()->password;
        $user = $user->save();

        dd($user);

        if($user){
            return redirect("/steps");
        }
        
        return back()->with("msg", "something went wrong");
    }
}
