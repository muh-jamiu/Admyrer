<?php

namespace App\Http\Controllers;

use App\Models\Follows;
use App\Models\Like;
use App\Models\Poll;
use App\Models\User;
use App\Models\UserPoll;
use App\Models\Userpolls;
use App\Models\Visitors;
use GuzzleHttp\Client;
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
        $data["matchedUsers"] = $this->matchedUsers();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.matches", compact("data"));
    }

    public function visits(){
        $data["visits"] = $this->get_visits();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.visits", compact("data"));
    }

    public function friends(){
        $data["follows"] = $this->get_follows();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.friends", compact("data"));
    }

    public function gifts(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.gifts", compact("data"));
    }

    public function likes(){
        $data["personalLikes"] = $this->getPersonalLikes();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.likes", compact("data"));
    }
    
    public function liked(){
        $data["liked"] = $this->getAllLikes();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.liked", compact("data"));
    }

    
    public function disliked(){
        $data["dislikes"] = $this->getAllDisLikes();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.disliked", compact("data"));
    }

    
    public function stories(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.stories", compact("data"));
    }

    public function show(){
        $username = str_replace("@", "", request()->path());
        $userProf = $this->getUserByUsername($username);
        if(!$userProf){
            abort(404);
        }
        $this->post_visits(session("admyrer_id"), $userProf->id);
        $data["user"] = $userProf;
        $data["loginUser"] = $this->getUser(session("admyrer_id"));
        return view("pages.show", compact("data"));
    }

    
    public function hot(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.hot", compact("data"));
    }

    public function live_users(){
        return view("pages.live_users");
    }

    public function friend_requests(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.friend_requests", compact("data"));
    }

    public function ai_assistant(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.ai_assistant", compact("data"));
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

    //likes and dislike
    public function getAllLikes(){        
       $like = Like::where(["is_liked" => true, "user_id" => session("admyrer_id")])->orderBy("created_at", "desc")->get();
       $data = [];
       $time = [];

       foreach($like as $key => $l){  
            $user = User::where('id', $l->like_id)->first();
            $data[$key] = $user;
            $time[$key] = $l->created_at;
       }

        return $data;
    }

    public function getPersonalLikes(){        
       $like = Like::where(["is_liked" => true, "like_id" => session("admyrer_id")])->orderBy("created_at", "desc")->get();
       $data = [];

       foreach($like as $key => $l){  
            $user = User::where('id', $l->like_id)->first();
            $data[$key] = $user;;
       }

        return $data;
    }

    public function deleteLikes(){
       $like = Like::where(["like_id" => request()->like_id, "user_id" => session("admyrer_id")])->first();
       $like->delete();
        return true;
    }

    public function getAllDisLikes(){        
       $like = Like::where(["is_disliked" => true, "user_id" => session("admyrer_id")])->orderBy("created_at", "desc")->get();
       $data = [];

        foreach($like as $key => $l){  
            $user = User::where('id', $l->like_id)->first();
            $data[$key] = $user;
        }

        return $data;
    }

     //Follow
     public function post_follows(){
        $follows = Follows::where(["followersID" => session("admyrer_id"), "followsID" => request()->followsID])->get();
        if(count($follows) > 0){
            return false;
        }

        $follows = new Follows();
        $follows->followsID = request()->followsID;
        $follows->followersID = session("admyrer_id");
        $follows->save();

        return true;
    }

    public function get_follows(){
        $follows = Follows::where("followersID", session("admyrer_id"))->orderBy("created_at", "desc")->get();
        $data = [];

        foreach($follows as $key => $v){  
            $user = User::where('id', $v->followsID)->first();
            $data[$key] = $user;
        }

        return $data;
    }

    public function deleteFollows(){
        $follows = Follows::where(["followsID" => request()->id, "followersID" => session("admyrer_id")])->first();
        $follows->delete();

        return true;        
    }

    //visits
    public function post_visits($visitorsID, $visitsID){
        $visitors = new Visitors();
        $visitors->visitorsID = $visitorsID;
        $visitors->visitsID = $visitsID;
        $visitors->save();

        return true;
    }

    public function get_visits(){
        $visitors = Visitors::where("visitsID", session("admyrer_id"))->orderBy("created_at", "desc")->get();
        $data = [];

        foreach($visitors as $key => $v){  
            $user = User::where('id', $v->visitorsID)->first();
            $data[$key] = $user;
        }

        return $data;
    }

    //get users
    public function getUserByUsername($username){  
        $user = User::where('username', $username)->first();
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

    //match users
    public function matchedUsers()
    {
        $currentUser = $this->getUser(session("admyrer_id"));        
        $user = User::where("country", $currentUser->country)->get();
        return $user;
    }

    //likes
    public function post_disliked(Like $like){
        $like->user_id = request()->userId ;
        $like->like_id = request()->like_id ;
        $like->is_disliked = true;
        $like->save();

        return true;
    }

    public function post_like(Like $like){
        $like->user_id = request()->userId ;
        $like->like_id = request()->like_id ;
        $like->is_liked = true;
        $like->save();
        return true;
    }

    public function handleAIMessage()
    {
        $userMessage = request()->message;

        // Send user message to Google Gemini
        $response = $this->sendToGemini($userMessage);

        // Process the response from Gemini
        $botReply = $this->processGeminiResponse($response);
        return $botReply;
    }

    private function sendToGemini($message)
    {
        $client = new Client();
        $key = "AIzaSyAF3l3ODTEHgGnhqf6Il4D9tPo-MrwuKaI";

        $response = $client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=$key", [
            'headers' => [
                'Authorization' => 'AIzaSyAF3l3ODTEHgGnhqf6Il4D9tPo-MrwuKaI',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "contents" => [
                    ["parts" => [
                            ["text" => $message]
                        ]
                    ]
                ],
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    private function processGeminiResponse($response)
    {
        $botReply = $response["candidates"][0]["content"]["parts"];

        return $botReply;
    }

    //Polls
    public function createPoll(){
        $poll = new Poll();
        $poll->title = request()->title;
        $poll->options = request()->options;
        
        $poll->save();
        return true;
    }

    public function createUserPoll(){
        $poll = new Poll();
        $poll->userId = session("admyrer_id");
        $poll->answer = request()->answer;
        $poll->pollId = request()->pollId;
        $poll->save();

        return true;
    }

    public function getUserPoll(){
        $Userpoll = Userpolls::where("userId", session("admyrer_id"))->get();
        $Allpoll = $this->getPolls();

        $data["Userpoll"] = $Userpoll;
        $data["Allpoll"] = $Allpoll;
        $data["user"] = $this->getUser(session("admyrer_id"));

        return view("pages.user_polls", compact("data"));
    }


    public function getPolls(){
        $poll = Poll::all();
        return $poll;        
    }

    public function deletePoll(){
        $poll = Poll::find(request()->id);
        $poll->delete();

        return true;        
    }

    //Agora
    public function generateToken()
    {
        $channelName = "main";
        $appId = "378c43133dab45e089328fc510cc93aa";
        $appCertificate = "bf64dee4113d4718a4222096a3f03ef3";

        // Make a request to Agora's token server to generate a token
        $client = new Client();
        $response = $client->post('https://api.agora.io/v1/token/rtc/generate', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($appId . ':' . $appCertificate),
            ],
            'json' => [
                'cname' => $channelName,
            ],
        ]);

        $token = json_decode($response->getBody()->getContents(), true)['rtcToken'];
        dd($token);

        return response()->json(['token' => $token]);
    }

}
