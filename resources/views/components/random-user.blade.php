
@php
@endphp

@if (!$issearch)
    
<div class="row" id="random_users_container">
    @foreach ($randomuser as $user) 
    @php
        $totalQuestions = count($quiz);
        $matchingAnswers = 0;
        $_userId = $user->id;
        $loginQuiz = $quiz->Where('userId', $luser->id);
        $otherQuiz = $quiz->Where('userId', $_userId);
        if($otherQuiz){
            foreach ($loginQuiz as $answer1) {
                $answer2 = $otherQuiz->firstWhere('title', $answer1->title);
                if ($answer2 && $answer1->answer == $answer2->answer) {
                    $matchingAnswers++;
                }
            }
            $cent = 0;
            if($matchingAnswers > 0){
                $cent = ($matchingAnswers) * 5;
            }
        }
    @endphp       
        <div class="col-sm-4 m6 s12 random_user_item">
            <div class="card valign-wrapper" style="border: none !important">
                <div class="card-image">
                    <a href={{"/@" .$user->username}}>
                        <img src={{$user->avatar ?? "/img/icon.png"}} alt="" loading="lazy">
                    </a>
                </div>
                <span class="text-capitalize h_Id d-none">{{$user->id}}</span>
                <div class="card-content">
                    <a style="font-size: 12px" href={{"/@" .$user->username}} class="d-block mb-2 text-truncate fw-bold text-capitalize" data-ajax="/"><span class="card-title">{{$user->first_name}} {{$user->last_name}}</span></a>
                    <p class="text-capitalize">{{$user->age ?? "0"}},  {{$user->country}}</p>
                    <p class="text-capitalize">{{$user->gender ?? "N/A"}}</p>
                    @if ($user->id == $_userId)
                        @if ($cent > 0)
                            <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(26, 112, 76, 0.577)" class="text-capitalize px-3 text-white">{{intval($cent)}}% Match  <i class="fa-solid fa-check"></i></div>
                        @else
                            <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(255, 0, 0, 0.415)" class="text-capitalize px-3 text-white">0% Match <i class="fa-solid fa-xmark"></i></div>
                        @endif
                     @else
                        <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(255, 0, 0, 0.415)" class="text-capitalize px-3 text-white">0% Match <i class="fa-solid fa-xmark"></i></div>
                    @endif
                    {{-- <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(0, 255, 149, 0.415)" class="text-capitalize px-3 text-white">90% Match <i class="fa-solid fa-xmark"></i></div> --}}
                    <div class="rand_bottom_bar">
                        <button  onclick="like('{{$user->first_name}}', 'rand', {{$user->id}})" class="btn waves-effect like" id="like_btn" data-userid="" data-ajax-post="/useractions/like" data-ajax-params="userid=>&username=" data-ajax-callback="callback_like">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"/></svg>
                        </button>
                        <button  onclick="dislike('{{$user->first_name}}', 'rand', {{$user->id}})" class="btn waves-effect dislike _dislike_text" data-userid="" id="dislike_btn" data-ajax-post="/useractions/dislike" data-ajax-params="userid" data-ajax-callback="callback_dislike">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif

@if ($issearch)
    
<div class="row" id="random_users_container">
    @foreach ($searchuser as $user) 
    @php
        $totalQuestions = count($quiz);
        $matchingAnswers = 0;
        $_userId = $user->id;
        $loginQuiz = $quiz->Where('userId', $luser->id);
        $otherQuiz = $quiz->Where('userId', $_userId);
        if($otherQuiz){
            foreach ($loginQuiz as $answer1) {
                $answer2 = $otherQuiz->firstWhere('title', $answer1->title);
                if ($answer2 && $answer1->answer == $answer2->answer) {
                    $matchingAnswers++;
                }
            }
            $cent = ($matchingAnswers / $totalQuestions) * 25;
        }
    @endphp       
        <div class="col-sm-4 m6 s12 random_user_item">
            <div class="card valign-wrapper" style="border: none !important">
                <div class="card-image">
                    <a href={{"/@" .$user->username}}>
                        <img src={{$user->avatar ?? "/img/icon.png"}} alt="" loading="lazy">
                    </a>
                </div>
                <span class="text-capitalize h_Id d-none">{{$user->id}}</span>
                <div class="card-content">
                    <a style="font-size: 12px" href={{"/@" .$user->username}} class="d-block text-truncate fw-bold text-capitalize" data-ajax="/"><span class="card-title">{{$user->first_name}} {{$user->last_name}}</span></a>
                    <a style="font-size: 12px" href={{"/@" .$user->username}} class="d-block mb-2 text-truncate fw-bold text-capitalize" data-ajax="/"><span class="card-title">{{$user->username}}</span></a>
                    <p class="text-capitalize">{{$user->age ?? "0"}},  {{$user->country}}</p>
                    <p class="text-capitalize">{{$user->gender ?? "N/A"}}</p>
                    @if ($user->id == $_userId)
                        @if ($cent > 0)
                            <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(26, 112, 76, 0.577)" class="text-capitalize px-3 text-white">{{intval($cent)}}% Match  <i class="fa-solid fa-check"></i></div>
                        @else
                            <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(255, 0, 0, 0.415)" class="text-capitalize px-3 text-white">0% Match <i class="fa-solid fa-xmark"></i></div>
                        @endif
                     @else
                        <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(255, 0, 0, 0.415)" class="text-capitalize px-3 text-white">0% Match <i class="fa-solid fa-xmark"></i></div>
                    @endif
                    {{-- <div style="border: none !important; width:50%; margin: auto auto; background-color:rgba(0, 255, 149, 0.415)" class="text-capitalize px-3 text-white">90% Match <i class="fa-solid fa-xmark"></i></div> --}}
                    <div class="rand_bottom_bar">
                        <button  onclick="like('{{$user->first_name}}', 'rand', {{$user->id}})" class="btn waves-effect like" id="like_btn" data-userid="" data-ajax-post="/useractions/like" data-ajax-params="userid=>&username=" data-ajax-callback="callback_like">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"/></svg>
                        </button>
                        <button  onclick="dislike('{{$user->first_name}}', 'rand', {{$user->id}})" class="btn waves-effect dislike _dislike_text" data-userid="" id="dislike_btn" data-ajax-post="/useractions/dislike" data-ajax-params="userid" data-ajax-callback="callback_dislike">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@if (count($searchuser) == 0)
<x-dashboard-empty></x-dashboard-empty> 				
@endif    
@endif