<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Models\accountVerify;
use App\Models\conversation;
use App\Models\Follows;
use App\Models\Like;
use App\Models\notification;
use App\Models\User;
use App\Models\Visitors;
use App\Services\GoogleGeminiService;
use App\Services\OpenAIService;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserApiController extends Controller
{
    protected $openAIService;
    protected $googleGeminiService;

    public function __construct(OpenAIService $openAIService, GoogleGeminiService $googleGeminiService)
    {
        $this->openAIService = $openAIService;
        $this->googleGeminiService = $googleGeminiService;
    }

    public function getUser(){        
        $data["user"] = User::find(request()->id);
        $data["visits"] = $this->get_visits();
        $data["likes"] = $this->getPersonalLikes();

        return response()->json(["data" => $data], 200);
    }

    public function buildPage(){
        $data["random"] = $this->getAllUserRandomly();
        $data["all"] = $this->getAllUser();

        return response()->json(["data" => $data], 200);
    }

    public function searchUser(){  
        $query = request()->search;   
        $user = User::where("username", "like", "%$query%")
        ->orWhere("first_name", "like", "%$query%")
        ->orWhere("last_name", "like", "%$query%")
        ->orWhere("country", "like", "%$query%")
        ->orWhere("gender", "like", "%$query%")
        ->get()
        ;
        
        return response()->json(["data" => $user], 200);
    }
 
    public function getToken(){  
        $token = "007eJxTYMj8dcqtqobLlr9VccnPv3WPLePkDa7ndv9fwGehslqM20yBIcncLM3MPMXEyCDFyMTCzMzSMsXANMXIIhkoamFkavj8YHlaQyAjQ9MBIWZGBggE8VkYchMz8xgYANfMHac=";
        return response()->json(["data" => $token], 200);
    }
 

    public function getAllUser(){        
       $user = User::all();
        return $user;
    }

    //likes and dislike
    public function getAllLikes(){        
       $like = Like::where(["is_liked" => true, "user_id" =>  request()->id])->orderBy("created_at", "desc")->get();
       $data = [];
       $time = [];

       foreach($like as $key => $l){  
            $user = User::where('id', $l->like_id)->first();
            $data[$key] = $user;
            $time[$key] = $l->created_at;
       }

       return response()->json(["data" => $data], 200);
    }

    public function getPersonalLikes(){        
       $like = Like::where(["is_liked" => true, "like_id" =>  request()->id])->orderBy("created_at", "desc")->get();
       $data = [];

       foreach($like as $key => $l){  
            $user = User::where('id', $l->like_id)->first();
            $data[$key] = $user;;
       }

       return response()->json(["data" => $data], 200);
    }

    public function deleteLikes(){
       $like = Like::where(["like_id" => request()->like_id, "user_id" =>  request()->id])->first();
       $like->delete();
        return true;
    }

    public function getAllDisLikes(){        
       $like = Like::where(["is_disliked" => true, "user_id" => request()->id])->orderBy("created_at", "desc")->get();
       $data = [];

        foreach($like as $key => $l){  
            $user = User::where('id', $l->like_id)->first();
            $data[$key] = $user;
        }

        return response()->json(["data" => $data], 200);
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
        $follows = Follows::where("followersID", request()->id)->orderBy("created_at", "desc")->get();
        $data = [];

        foreach($follows as $key => $v){  
            $user = User::where('id', $v->followsID)->first();
            $data[$key] = $user;
        }

        return response()->json(["data" => $data], 200);
    }

    public function deleteFollows(){
        $follows = Follows::where(["followsID" => request()->id, "followersID" => session("admyrer_id")])->first();
        $follows->delete();

        return true;        
    }

    //visits
    public function post_visits($visitorsID, $visitsID){
        $visit = Visitors::where(["visitorsID" => session("admyrer_id"), "visitsID" => $visitsID])->get();
        if(count($visit) > 0){
            return false;
        }

        $visitors = new Visitors();
        $visitors->visitorsID = $visitorsID;
        $visitors->visitsID = $visitsID;
        $visitors->save();

        return true;
    }

    public function get_visits(){
        $visitors = Visitors::where("visitsID", request()->id)->orderBy("created_at", "desc")->get();
        $data = [];

        foreach($visitors as $key => $v){  
            $user = User::where('id', $v->visitorsID)->first();
            $data[$key] = $user;
        }

        return response()->json(["data" => $data], 200);
    }

    //get users
    public function getUserByUsername($username){  
        $user = User::where('username', $username)->first();
        return $user;
    }

    public function updateUser(Request $request){
        $user = User::find(session("admyrer_id"));
        
        if(!$user){
            return "User Not Fuund" . session("admyrer_id");
        }
        
        $user->first_name = $request->first_name ?? $user->first_name;
        $user->last_name = $request->last_name ?? $user->last_name;
        $user->email = $request->email ?? $user->email;
        $user->username = $request->username ??  $user->username ;
        $user->avatar = $request->avatar ?? $user->avatar;
        $user->address = $request->address ?? $user->address;
        $user->birthday = $request->birthday ??  $user->birthday;
        $user->gender = $request->gender ?? $user->gender ;
        $user->country = $request->country ?? $user->country;
        $user->verified = $request->verified ?? $user->verified;
        $user->height = $request->height >> $user->height;
        $user->hair_color = $request->hair_color ?? $user->hair_color;
        $user->interest = $request->interest ?? $user->interest;
        $user->state = $request->state ?? $user->state;
        $user->location = $request->location ?? $user->location;
        $user->phone_number = $request->phone ?? $user->phone_number;
        $user->relationship = $request->relationship ?? $user->relationship;
        $user->work_status = $request->work_status ?? $user->work_status;
        $user->education = $request->education ?? $user->education;
        $user->body = $request->body ?? $user->body;
        $user->car = $request->car ?? $user->car;
        $user->religion = $request->religion ?? $user->religion ;
        $user->city = $request->city ?? $user->city ;
        $user->color = $request->color ?? $user->color;
        if($request->image){
            $photo = $this->uploadImage();
            $user->avatar = $photo;
        }
        $user->update();
        
        return true;
    }

    public function getAllUserRandomly(){        
       $user = User::inRandomOrder()->get();
        return $user;
    }

    public function uploadImage(){    
        $file = request()->file('image')->getRealPath();   
        $cloudinary = new Cloudinary();    
        $uploadedFileUrl = $cloudinary->uploadApi()->upload($file,);
        
        return $uploadedFileUrl["url"];
    }

    public function postCode($code, $id){
        $verify = new accountVerify();
        $verify->userId = session("admyrer_id") ?? $id;
        $verify->code = $code;
        $verify->save();

        return true;
    }

    public function verifyCode(accountVerify $verify){
        $code = $verify::where('code', request()->code)->first();
        if(!$code){
            return "Invalid code";
        }

        if($code->userId != session("admyrer_id")){
            return "Invalid code";
        }

        $code->delete();
        return true;
    }

    public function countryUser()
    {      
        $user = User::where("country", request()->country)->get();
        return response()->json(["data" => $user], 200);
    }

    //dislikes
    public function post_disliked(Like $like){ 
        $like = Like::where(["user_id" => session("admyrer_id"), "like_id" => request()->like_id, "is_disliked" => true])->get();
        if(count($like) > 0){
            return false;
        }

        $like = new Like();
        $like->user_id = request()->userId ;
        $like->like_id = request()->like_id ;
        $like->is_disliked = true;
        $like->save();

        return true;
    }

    public function post_like(Like $like){
        $like = Like::where(["user_id" => session("admyrer_id"), "like_id" => request()->like_id, "is_liked" => true])->get();
        if(count($like) > 0){
            return false;
        }
        
        $like = new Like();
        $like->user_id = request()->userId ;
        $like->like_id = request()->like_id ;
        $like->is_liked = true;
        $like->save();
        return true;
    }

    
    // authentication
    public function loginUser(User $user){
        // request()->validate([
        //     "username" => "required",
        //     "password" => "required|min:5",
        // ]);

        $existingUser = $user::where('email', request()->username)->first();
        if(!$existingUser){
            $existingUser = $user::where('username', request()->username)->first();
        }

        if(!$existingUser){
            return response()->json("account does not exist", 404);
        }

        if(Hash::check(request()->password, $existingUser->password)){ 
            return response()->json($existingUser->id, 200);      
        }

        return response()->json("something went wrong", 500);     
    }

    public function registerUser(User $user, Request $request){
        request()->validate([
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required|min:5|max:10",
            "username" => "required|min:5|unique:users",
        ]);

        $user->first_name = request()->first_name;
        $user->last_name = request()->last_name;
        $user->username = request()->username;
        $user->email = request()->email;
        $user->password = request()->password;
        $user->save();

        if($user){
            session()->put("admyrer_id", $user->id);
            $this->sendMail($request, $user->id);
            return true;
        }
        
        return false;
    }

    public function sendMail(Request $request, $id){
        $name = strtoupper($request->first_name);
        $message = $request->message;
        $email = $request->email;
        $subject = strtoupper($request->subject);
        $code = rand(1000, 9999);

        $mail = Mail::to($email)->send(new VerifyMail($message, $subject, $email, $name, $code));
        if(!$mail){
            false;
        }

        $this->postCode($code, $id);
        return true;
    }

    // chat
    public function chatGemini(Request $request)
    {
        $userMessage = request()->message;
        $messages = [
            ["parts" => [
                ["text" => "You are a admyrer free dating website assistant."]
            ], "role" => "model"],
            ["parts" => [
                ["text" => $userMessage]
            ], "role" => "user"],
        ];

        $result = $this->googleGeminiService->generateChatResponse($messages);

        $text = $result["candidates"][0]["content"]["parts"][0]["text"];
        $text = str_replace("*", "", $text);
        return response()->json(["data" => $text], 200);
    }

    public function saveMessage(){
        $msg = new conversation();
        $msg->sender = request()->sender;
        $msg->reciever = request()->reciever;
        $msg->message = request()->message;

        $msg->save();
        $notification = new notification();
        $notification->from =  request()->from_username ?? "";
        $notification->to = request()->username ?? "";
        $notification->save();

        return true;
    }

    
    public function getMessage(){
        $senderId = request()->sender;
        $receiverId = request()->reciever;

        $msg = Conversation::where(function($query) use ($senderId, $receiverId) {
                $query->where('sender', $senderId)
                    ->where('reciever', $receiverId);
            })
            ->orWhere(function($query) use ($senderId, $receiverId) {
                $query->where('sender', $receiverId)
                    ->where('reciever', $senderId);
            })
            ->orderBy('created_at', 'asc')
            ->get();
            
        return response()->json(["data" => $msg], 200);
    }

    public function getNotification(){     
        $existingUser = User::where('id', session("admyrer_id"))->first() ?? null;
        $notification = notification::where(["to" => $existingUser->username])->get();
        return $notification;
    }
    
    public function getRecentMessage(){
        $senderId = request()->sender ?? 1;

        $msg = Conversation::where(["sender" => $senderId])
            ->orderBy('created_at', 'asc')
            ->get();


        foreach($msg as $key => $d){
            $dt = User::where('id',  $d->reciever)->get() ?? null;
            $name[] = $dt[0]->username;
            $image[] = $dt[0]->avatar;
        }

        $data["name"] = array_unique($name);
        $data["image"] = array_unique($image);      
        return response()->json(["data" => $data], 200);
    }

}

