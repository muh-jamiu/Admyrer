<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Audio;
use App\Models\conversation;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = $this->buildPage();
        return view("admin.dashboard", compact("data"));
    }

    public function system_status()
    {
        return view("admin.dashboard");
    }

    public function changelog()
    {
        return view("admin.dashboard");
    }

    public function push_notifications_system()
    {
        return view("admin.dashboard");
    }

    public function manage_reports()
    {
        return view("admin.dashboard");
    }

    public function manage_custom_pages()
    {
        return view("admin.dashboard");
    }

    public function manage_faqs()
    {
        return view("admin.dashboard");
    }

    public function pages_seo()
    {
        return view("admin.dashboard");
    }

    public function manage_terms_pages()
    {
        return view("admin.dashboard");
    }

    public function general_settings()
    {
        return view("admin.dashboard");
    }

    public function site_settings()
    {
        return view("admin.dashboard");
    }

    public function site_features()
    {
        return view("admin.dashboard");
    }

    public function email_settings()
    {
        return view("admin.dashboard");
    }

    public function video_settings()
    {
        return view("admin.dashboard");
    }

    public function social_login()
    {
        return view("admin.dashboard");
    }

    public function live()
    {
        return view("admin.dashboard");
    }

    public function amazon_settings()
    {
        return view("admin.dashboard");
    }

    public function add_language()
    {
        return view("admin.dashboard");
    }

    public function manage_languages()
    {
        return view("admin.dashboard");
    }

    public function manage_users()
    {
        return view("admin.dashboard");
    }

    public function manage_genders()
    {
        return view("admin.dashboard");
    }

    public function manage_countries()
    {
        return view("admin.dashboard");
    }

    public function manage_profile_fields()
    {
        return view("admin.dashboard");
    }

    public function manage_success_stories()
    {
        return view("admin.dashboard");
    }

    public function manage_verification_requests()
    {
        return view("admin.dashboard");
    }

    public function manage_photos()
    {
        return view("admin.dashboard");
    }

    public function manage_stickers()
    {
        return view("admin.dashboard");
    }

    public function add_new_sticker()
    {
        return view("admin.dashboard");
    }

    public function manage_articles()
    {
        return view("admin.dashboard");
    }

    public function manage_blog_categories()
    {
        return view("admin.dashboard");
    }

    public function add_new_article()
    {
        return view("admin.dashboard");
    }

    public function manage_gifts()
    {
        return view("admin.dashboard");
    }

    public function addnew_gift()
    {
        return view("admin.dashboard");
    }

    public function manage_themes()
    {
        return view("admin.dashboard");
    }

    public function change_site_design()
    {
        return view("admin.dashboard");
    }

    public function adminLogin()
    {
        return view("admin.login");
    }

    public function polls()
    {
        $data["poll"] = $this->getPolls();
        return view("admin.polls", compact("data"));
    }

    public function getPolls(){
        $poll = Poll::orderBy("created_at", "desc")->get();
        return $poll;        
    }

    public function music()
    {
        $data["audio"] = $this->getAudio();
        return view("admin.musics", compact("data"));
    }

    public function getAudio(){
        $audio = Audio::orderBy("created_at", "desc")->get();
        return $audio;
    }

    public function adminLoginUser(Admin $admin)
    {
        request()->validate([
            "username" => "required",
            "password" => "required|min:5",
        ]);

        $existingUser = $admin::where('username', request()->username)->first();

        if(!$existingUser){
            return back()->with("msg", "Sorry!, This account cannot be found");
        }

        if(request()->password == $existingUser->password){ 
            session()->put("admin_username", $existingUser->username);
            return redirect("admin-cp");     
        }

        return back()->with("msg", "Password or Username is not correct!"); 
    }

    public function createAdmin(Admin $admin)
    {
        request()->validate([
            "username" => "required",
            "password" => "required|min:5",
        ]);

        $existingUser = new Admin();

        $existingUser->username = request()->username;
        $existingUser->password = request()->password;
        $existingUser->save();

        return true;
    }

    public function buildPage(){
        $data["allUser"] = User::all();
        $data["messages"] = conversation::all();
        $data["male"] = User::where('gender','male')->get();
        $data["female"] = User::where('gender','female')->get();
        $data["totalImage"] = User::where('avatar', "!=", '')->get();
        return $data;
    }
    
}
