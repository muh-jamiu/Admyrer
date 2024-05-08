<?php

namespace App\Http\Controllers;

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
}
