<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Events\SignalingEvent;
use App\Mail\VerifyMail;
use App\Models\accountVerify;
use App\Models\Club;
use App\Models\conversation;
use App\Models\Date;
use App\Models\Follows;
use App\Models\Like;
use App\Models\Live;
use App\Models\notification;
use App\Models\Poll;
use App\Models\Quiz;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserPoll;
use App\Models\Userpolls;
use App\Models\Visitors;
use Cloudinary\Cloudinary;
use GuzzleHttp\Client;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Services\OpenAIService;
use App\Services\GoogleGeminiService;

class UserController extends Controller
{
    protected $openAIService;
    protected $googleGeminiService;

    public function __construct(OpenAIService $openAIService, GoogleGeminiService $googleGeminiService)
    {
        $this->openAIService = $openAIService;
        $this->googleGeminiService = $googleGeminiService;
    }

    public function index(Request $request){
        $data["club"] = $this->getClub();
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["quiz"] = $this->getUserQuiz();
        $data["notification"] = $this->getNotification();
        $data["user"] = $this->getUser(session("admyrer_id"));
        $data["randomUser"] = $this->getAllUserRandomly();
        $data["isSearch"] = false;
        return view("pages.find-matches", compact("data"));
    }

    public function matches(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["matchedUsers"] = $this->matchedUsers();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.matches", compact("data"));
    }

    public function visits(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["visits"] = $this->get_visits();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.visits", compact("data"));
    }

    public function friends(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["follows"] = $this->get_follows();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.friends", compact("data"));
    }

    public function gifts(){
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.gifts", compact("data"));
    }

    public function likes(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["personalLikes"] = $this->getPersonalLikes();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.likes", compact("data"));
    }
    
    public function liked(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["liked"] = $this->getAllLikes();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.liked", compact("data"));
    }

    
    public function disliked(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["dislikes"] = $this->getAllDisLikes();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.disliked", compact("data"));
    }

    
    public function stories(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.stories", compact("data"));
    }

    public function show(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $username = str_replace("@", "", request()->path());
        $userProf = $this->getUserByUsername($username);
        if(!$userProf){
            abort(404);
        }
        $data['conversation'] = $this->getMessage($userProf->id);
        $this->post_visits(session("admyrer_id"), $userProf->id);
        $data["user"] = $userProf;
        $data["loginUser"] = $this->getUser(session("admyrer_id"));
        return view("pages.show", compact("data"));
    }

    
    public function hot(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.hot", compact("data"));
    }

    public function live_users(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["lives"] = $this->getLive();
        $data["notification"] = $this->getNotification();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.live_users", compact("data"));
    }

    public function storeLive(Live $live){
        $live->userId = session("admyrer_id");
        $live->liveId = request()->liveId;
        $live->avatar = request()->avatar;
        $live->name = request()->name;
        $live->gender = request()->gender;
        $live->country = request()->country;
        $live->username = request()->username;
        $live->save();        
        return $live->id;
    }

    public function dateLive(Date $date){
        $date->username = request()->username;
        $date->endUsername = request()->endUsername;
        $date->save();        
        return true;
    }
    
    public function getdateLive(){
        $lives = Date::all();    
        return $lives;
    }

    
    public function scheduledateLive(Schedule $schedule){
        $schedule->username = request()->username;
        $schedule->endUsername = request()->endUsername;
        $schedule->date = request()->date;
        $schedule->save();        
        return true;
    }

    public function getScheduledateLive(){
        $schedule = Schedule::all();    
        return $schedule;
    }

    public function storeclub(Club $club){
        $club->name = request()->name;
        $club->duration = request()->duration;
        $club->save();        
        return true;
    }

    public function getClub(){
        $clubs = Club::all();   
        if(count($clubs) > 0){
            return $clubs;
        } 
        return false;
    }

    public function getLive(){
        $lives = Live::all();    
        return $lives;
    }

    public function deleteLive(){
        $lives = Live::find(request()->id);  
        $lives->delete();  
        return true;
    }

    public function friend_requests(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.friend_requests", compact("data"));
    }

    public function review(){
        return view("pages.review");
    }
    
    public function makereview(){
        return redirect("/find-matches");
    }

    public function ai_assistant(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
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
            return redirect("/find-matches")->with("first", "first");      
        }

        return back()->with("msg", "Password or Email is not correct!");     
    }

    public function registerUser(User $user, Request $request){
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
            $this->sendMail($request, $user->id);
            return redirect("/steps");
        }
        
        return back()->with("msg", "something went wrong");
    }

    public function getUser($id){        
       $user = User::find($id);
        return $user;
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
        $data["club"] = $this->getClub();
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["quiz"] = $this->getUserQuiz();
        $data["notification"] = $this->getNotification();
        $data["user"] = $this->getUser(session("admyrer_id"));
        $data["randomUser"] = $this->getAllUserRandomly();
        $data["searchUser"] = $user;
        $data["isSearch"] = true;
        return view("pages.find-matches", compact("data"));
     }
 

    public function logOut(){
        session()->pull("admyrer_id");
        return redirect("/");
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

    public function getAllUserFilter($key, $value){        
       $user = User::where($key, $value);
        return $user;
    }

    public function getSortedUser($sort){        
       $user = User::orderBy($sort)->get();
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

    //match users
    public function matchedUsers()
    {
        $currentUser = $this->getUser(session("admyrer_id"));        
        $user = User::where("country", $currentUser->country)->get();
        return $user;
    }

    //likes
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
        $poll = Userpolls::where(["userId" => session("admyrer_id"), "pollId" =>  request()->pollId])->get();
        if(count($poll) > 0){
            $poll = Userpolls::find($poll[0]->id);
            $poll->answer = request()->answer;
            $poll->update();
            return true;
        }

        $poll = new Userpolls();
        $poll->userId = session("admyrer_id");
        $poll->answer = request()->answer;
        $poll->pollId = request()->pollId;
        $poll->save();

        return true;
    }

    public function getUserPoll(){
        $Userpoll = Userpolls::where("userId", session("admyrer_id"))->get();
        $Allpoll = $this->getPolls();

        $data["notification"] = $this->getNotification();
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
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

    //Quiz
    public function createUserQuiz(){
        $quiz = Quiz::where(["userId" => session("admyrer_id"), "title" =>  request()->title])->get();
        if(count($quiz) > 0){
            $quiz = Quiz::find($quiz[0]->id);
            $quiz->userId = session("admyrer_id");
            $quiz->answer = request()->answer;
            $quiz->title = request()->title;
            $quiz->update();
            return true;
        }

        $quiz = new Quiz();
        $quiz->userId = session("admyrer_id");
        $quiz->answer = request()->answer;
        $quiz->title = request()->title;
        $quiz->save();

        return true;
    }

    public function getUserQuiz(){
        $quiz = Quiz::where("userId", session("admyrer_id"))->get();
        $all = Quiz::all();
        return $all;
        $answers2 = Quiz::where("userId", 1)->get();

        $totalQuestions = $quiz->count();
        $matchingAnswers = 0;
    
        foreach ($quiz as $answer1) {
            $answer2 = $answers2->firstWhere('title', $answer1->title);
            if ($answer2 && $answer1->answer == $answer2->answer) {
                $matchingAnswers++;
            }
        }
        return ($matchingAnswers / $totalQuestions) * 100;
    }

    public function quiz(){
        $data["schedule"] = $this->getScheduledateLive();
        $data["dates"] = $this->getdateLive();
        $data["notification"] = $this->getNotification();
        $data["user"] = $this->getUser(session("admyrer_id"));
        return view("pages.quiz", compact("data"));
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

    //mail
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

    public function chat(Request $request)
    {
        $userMessage = $request->input('message');
        $messages = [
            ['role' => 'system', 'content' => 'You are a helpful assistant.'],
            ['role' => 'user', 'content' => $userMessage],
        ];

        $result = $this->openAIService->generateChatResponse($messages);

        return $result;
    }

    public function chatGemini(Request $request)
    {
        $userMessage = request()->message;
        $messages = [
            ["parts" => [
                ["text" => "You are a admyrer dating website assistant."]
            ], "role" => "model"],
            ["parts" => [
                ["text" => $userMessage]
            ], "role" => "user"],
        ];

        $result = $this->googleGeminiService->generateChatResponse($messages);

        $text = $result["candidates"][0]["content"]["parts"][0]["text"];
        return str_replace("*", "", $text);
    }

    public function Conversation(){
        $msg = request()->message;
        $sender = request()->sender;
        $t = broadcast(new ChatEvent($msg))->toOthers();
        return $sender;
    }

    public function saveMessage(){
        $msg = new conversation();
        $msg->sender = session("admyrer_id");
        $msg->reciever = request()->reciever;
        $msg->message = request()->message;

        $msg->save();
        $notification = new notification();
        $notification->from =  request()->from_username;
        $notification->to = request()->username;
        $notification->save();

        return true;
    }

    public function getMessage($reciever){
        $senderId = session("admyrer_id");
        $receiverId = $reciever;

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
        return $msg;
    }

    public function getNotification(){     
        $existingUser = User::where('id', session("admyrer_id"))->first() ?? null;
        $notification = notification::where(["to" => $existingUser->username])->get();
        return $notification;
    }
}
