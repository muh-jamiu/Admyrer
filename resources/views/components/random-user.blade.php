
@php
@endphp

<div class="row" id="random_users_container">
    @foreach ($randomuser as $user)        
        <div class="col-sm-4 m6 s12 random_user_item">
            <div class="card valign-wrapper" style="border: none !important">
                <div class="card-image">
                    <a href={{"/@" .$user->username}}>
                        <img src={{$user->avatar}} alt="" loading="lazy">
                    </a>
                </div>
                <div class="card-content">
                    <a style="font-size: 12px" href={{"/@" .$user->username}} class="d-block mb-2 text-truncate fw-bold text-capitalize" data-ajax="/"><span class="card-title">{{$user->first_name}} {{$user->last_name}}</span></a>
                    <p class="text-capitalize">{{$user->age ?? "0"}},  {{$user->country}}</p>
                    <p class="text-capitalize">{{$user->gender ?? "N/A"}}</p>
                    <div class="rand_bottom_bar">
                        <button class="btn waves-effect like" id="like_btn" data-userid="" data-ajax-post="/useractions/like" data-ajax-params="userid=>&username=" data-ajax-callback="callback_like">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"/></svg>
                        </button>
                        <button class="btn waves-effect dislike _dislike_text" data-userid="" id="dislike_btn" data-ajax-post="/useractions/dislike" data-ajax-params="userid" data-ajax-callback="callback_dislike">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>