<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Audio;
use App\Models\Avatar;
use App\Models\conversation;
use App\Models\Poll;
use App\Models\Testimony;
use App\Models\User;
use App\Models\UserPoll;
use App\Models\Userpolls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\GoogleGeminiService;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $openAIService;
    protected $googleGeminiService;

    public function __construct(GoogleGeminiService $googleGeminiService)
    {
        $this->googleGeminiService = $googleGeminiService;
    }

    public function index()
    {
        $data = $this->buildPage();
        $data["count"] = $this->userCount();
        return view("admin.dashboard", compact("data"));
    }

    function userCount()
    {
        $monthlyUserCounts = User::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $userCountsArray = [];

        foreach ($monthlyUserCounts as $userCount) {
            $userCountsArray[] = [
                'month' => $userCount->month,
                'count' => $userCount->count
            ];
        }

        return $userCountsArray;
    }

    public function system_status()
    {
        return view("admin.system_status");
    }

    public function changelog()
    {
        return view("admin.changelog");
    }

    public function push_notifications_system()
    {
        return view("admin.push_notifications_system");
    }

    public function manage_reports()
    {
        return view("admin.manage_reports");
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
        return view("admin.general");
    }

    public function site_settings()
    {
        return view("admin.site_setting");
    }

    public function site_features()
    {
        return view("admin.feature");
    }

    public function email_settings()
    {
        return view("admin.email_settings");
    }

    public function video_settings()
    {
        return view("admin.video_settings");
    }

    public function social_login()
    {
        return view("admin.social_login");
    }

    public function live()
    {
        return view("admin.live");
    }

    public function amazon_settings()
    {
        return view("admin.amazon_settings");
    }

    public function add_language()
    {
        return view("admin.add_language");
    }

    public function manage_languages()
    {
        return view("admin.manage_languages");
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

    public function testy()
    {
        $data["poll"] = $this->gettesty();
        return view("admin.testy", compact("data"));
    }

    public function getPolls()
    {
        $poll = Poll::orderBy("created_at", "desc")->get();
        return $poll;
    }

    public function gettesty()
    {
        $testy = Testimony::orderBy("created_at", "desc")->get();
        return $testy;
    }

    public function deletetesty()
    {
        $testy = Testimony::find(request()->id);
        $testy->delete();
        return back()->with("msg", "Testimony Deleted Successfully");
    }

    public function music()
    {
        $data["audio"] = $this->getAudio();
        return view("admin.musics", compact("data"));
    }

    public function getAudio()
    {
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

        if (!$existingUser) {
            return back()->with("msg", "Sorry!, This account cannot be found");
        }

        if (request()->password == $existingUser->password) {
            session()->put("admin_username", $existingUser->username);
            return redirect("admin-cp");
        }

        return back()->with("msg", "Password or Username is not correct!");
    }

    public function logout()
    {
        session()->pull("admin_username");
        return redirect("/admin-login");
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

    public function buildPage()
    {
        $data["allUser"] = User::all();
        $data["messages"] = conversation::all();
        $data["male"] = User::where('gender', 'male')->get();
        $data["female"] = User::where('gender', 'female')->get();
        $data["totalImage"] = User::where('avatar', "!=", '')->get();
        return $data;
    }

    public function Marketing()
    {
        $userMessage = request()->message ?? "hi";

        $messages = [
            ["parts" => [
                ["text" => "You are to provide market strategy for admyrer dating website."]
            ], "role" => "model"],
            ["parts" => [
                ["text" => $userMessage]
            ], "role" => "user"],
        ];

        $result = $this->googleGeminiService->generateChatResponse($messages);

        $text = $result["candidates"][0]["content"]["parts"][0]["text"];
        return str_replace("*", "", $text);
    }

    public function Strategy()
    {
        $data["poll"] = $this->Marketing();
        return view("admin.marketing", compact("data"));
    }

    public function manage_users()
    {
        $data["users"] = $this->getUser();
        return view("admin.users", compact("data"));
    }

    public function getUser()
    {
        $users = User::orderBy("created_at", "desc")->paginate(10);
        return $users;
    }

    function delete_user()
    {
        $user = User::find(request()->id);
        $user->delete();
        return true;
    }

    function block_user()
    {
        $user = User::find(request()->id);
        if ($user->is_block) {
            $user->is_block = false;
        } else {
            $user->is_block = true;
        }
        $user->update();

        return true;
    }

    function manage_asset()
    {
        $users = User::orderBy("created_at", "desc")->get();
        $avatars = Avatar::orderBy("created_at", "desc")->get();
        $data["users"] = $users;
        $data["avatars"] = $avatars;
        return view("admin.asset", compact("data"));
    }

    function delete_avatar()
    {
        $user = User::find(request()->id);
        $user->avatar = "";
        $user->update();
        
        if(request()->redirect){
            return back()->with("msg", "Picture deleted successfully");
        }

        return true;
    }

    function delete_avatar_real()
    {
        $user = Avatar::find(request()->id);
        $user->delete();

        if(request()->redirect){
            return back()->with("msg", "Picture deleted successfully");
        }
        return true;
    }

    function poll_result()
    {

        $polls = Userpolls::orderBy("created_at", "desc")->get();
        $poll_ = Poll::orderBy("created_at", "desc")->get();
        $votedPolls = [];
        $count = 0;
        foreach ($polls as $vote) {
            foreach ($poll_ as $key => $value) {
                $options = explode(",", $value->options);
                foreach ($options as $key => $option) {
                    if($option == $vote->answer){
                        $count += 1;
                        $votedPolls[$key] = [
                            'poll_question' => $value->title,
                            'vote_answer' => $vote->answer,
                            'count' => $count,
                        ];
                    }else{
                        
                    }
                }
            }
        }

        $data["votedPolls"] = $votedPolls;
        $data["polls"] = Poll::orderBy("created_at", "desc")->get();
        // dd($data);
        return view("admin.poll_r", compact("data"));
    }
}
