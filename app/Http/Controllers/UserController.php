<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        $data["randomUser"] = $this->getAllUserRandomly();
        return view("pages.find-matches", compact("data"));
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

    public function show(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.show", compact("data"));
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
        request()->validate([
            "username" => "required",
            "password" => "required|min:5",
        ]);

        $existingUser = $user::where('email', request()->username)->first();
        if(!$existingUser){
            $existingUser = $user::where('username', request()->username)->first();
        }

        if(!$existingUser){
            return back()->with("msg", "Sorry!, This account cannot be found");
        }

        if(Hash::check(request()->password, $existingUser->password)){ 
            session()->put("admyrer_id", $existingUser->id);
            return redirect("/find-matches");      
        }

        return back()->with("msg", "Password or Email is not correct!");     
    }

    public function registerUser(User $user){
        request()->validate([
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required|min:5|max:10",
            "username" => "required|min:5|unique:users",
        ]);

        if(request()->c_password != request()->password){
            return back()->with("msg", "password does not match");
        }

        $user->first_name = request()->first_name;
        $user->last_name = request()->last_name;
        $user->username = request()->username;
        $user->email = request()->email;
        $user->password = request()->password;
        $user->save();

        if($user){
            session()->put("admyrer_id", $user->id);
            return redirect("/steps");
        }
        
        return back()->with("msg", "something went wrong");
    }

    public function getUser($id){        
       $user = User::find($id);
        return $user;
    }

    public function logOut(){
        session()->pull("admyrer_id");
    }

    public function getAllUser(){        
       $user = User::all();
        return $user;
    }

    public function getAllUserRandomly(){        
       $user = User::inRandomOrder()->get();
        return $user;
    }

    public function getAllUserFilter($key, $value){        
       $user = User::where($key, $value);
        return $user;
    }

    public function getSortedUser($sort){        
       $user = User::orderBy($sort)->get();
        return $user;
    }

    public function matchedUsers()
    {
        $users = $this->getAllUser();
        $currentUser = $this->getUser(session("admyrer_id"));
        $gender =  $currentUser->gender;
        $data = [];
        foreach($users as $key => $u){
            if($u->gender != $gender){
                $data[$key] = $u;
            }
        }

        if(count($data) == 0){
            $data = $users;
        }
       return $data;
    }

}
