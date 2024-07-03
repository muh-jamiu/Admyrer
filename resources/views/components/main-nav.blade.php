
<nav role="navigation" class="bg-white" id="nav-logged-in" style="box-shadow: none; border-bottom: none">
    <div class="nav-wrapper container container_new">
        
        <span class="left dt_slide_menu hide" id="open_slide" onclick="SlideEraseCookie('open_slide')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 276.167 276.167"> <g fill="currentColor"><path d="M33.144,2.471C15.336,2.471,0.85,16.958,0.85,34.765s14.48,32.293,32.294,32.293s32.294-14.486,32.294-32.293 S50.951,2.471,33.144,2.471z"></path> <path d="M137.663,2.471c-17.807,0-32.294,14.487-32.294,32.294s14.487,32.293,32.294,32.293c17.808,0,32.297-14.486,32.297-32.293 S155.477,2.471,137.663,2.471z"></path> <path d="M243.873,67.059c17.804,0,32.294-14.486,32.294-32.293S261.689,2.471,243.873,2.471s-32.294,14.487-32.294,32.294 S226.068,67.059,243.873,67.059z"></path> <path d="M32.3,170.539c17.807,0,32.297-14.483,32.297-32.293c0-17.811-14.49-32.297-32.297-32.297S0,120.436,0,138.246 C0,156.056,14.493,170.539,32.3,170.539z"></path> <path d="M136.819,170.539c17.804,0,32.294-14.483,32.294-32.293c0-17.811-14.478-32.297-32.294-32.297 c-17.813,0-32.294,14.486-32.294,32.297C104.525,156.056,119.012,170.539,136.819,170.539z"></path> <path d="M243.038,170.539c17.811,0,32.294-14.483,32.294-32.293c0-17.811-14.483-32.297-32.294-32.297 s-32.306,14.486-32.306,32.297C210.732,156.056,225.222,170.539,243.038,170.539z"></path> <path d="M33.039,209.108c-17.807,0-32.3,14.483-32.3,32.294c0,17.804,14.493,32.293,32.3,32.293s32.293-14.482,32.293-32.293 S50.846,209.108,33.039,209.108z"></path> <path d="M137.564,209.108c-17.808,0-32.3,14.483-32.3,32.294c0,17.804,14.487,32.293,32.3,32.293 c17.804,0,32.293-14.482,32.293-32.293S155.368,209.108,137.564,209.108z"></path> <path d="M243.771,209.108c-17.804,0-32.294,14.483-32.294,32.294c0,17.804,14.49,32.293,32.294,32.293 c17.811,0,32.294-14.482,32.294-32.293S261.575,209.108,243.771,209.108z"></path> </g></svg>
        </span>
        
        <div class="left header_logo">
            <a id="logo-container" href="/find-matches" class="brand-logo">
                <img src="" alt="" data-default="" data-light="">
            </a>
        </div>
        
            <ul class="left header_home_link hide_go_pro_hdr_link">
                <li>
                    <a href="/find-matches" data-ajax="/find-matches" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3.604 7.197l7.138 -3.109a0.96 .96 0 0 1 1.27 .527l4.924 11.902a1.004 1.004 0 0 1 -.514 1.304l-7.137 3.109a0.96 .96 0 0 1 -1.271 -.527l-4.924 -11.903a1.005 1.005 0 0 1 .514 -1.304z"></path><path d="M15 4h1a1 1 0 0 1 1 1v3.5"></path><path d="M20 6c.264 .112 .52 .217 .768 .315a1 1 0 0 1 .53 1.311l-2.298 5.374"></path></svg> <?php echo __( 'Find Matches' );?>
                    </a>
                </li>
            </ul>
            <ul class="right">

                <li class="header_notifications dropdown header_notifications_1">
                    <a data-bs-toggle="dropdown" href="javascript:void(0);" id="messenger_opener" class="btn-flat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path><line x1="8" y1="9" x2="16" y2="9"></line><line x1="8" y1="13" x2="14" y2="13"></line></svg>
                        <span class="badge red chat_badge" href="javascript:void(0);" id="messenger_opener">0</span></a>
                        <span class="badge d-none red chat_badge_1" href="javascript:void(0);" id="messenger_opener">{{count($notification)}}</span></a>
                    </a>
                    <ul id="notif_dropdown" class="dropdown-content dropdown-menu" style="opacity: 1.0 !important">
                        <div class="" style="height: 300px; overflow:scroll">
                        <p class="p-3 mb-0 fw-bold fs-5" style="border-bottom: 1px solid rgb(223, 223, 223)"><?php echo __( 'Messages' );?></p>
                            @foreach ($notification as $item)
                                <p class="p-1" style="border-bottom: 1px solid rgb(237, 237, 237)"><a style="color:rgb(138, 138, 138)" href="{{ "/@" . $item->from}}">{{$item->from}} sent you a message</a></p>
                            @endforeach
                          </div>
                    </ul>
                </li>
                
                <li class="header_notifications dropdown header_notifications_2">
                    <a data-bs-toggle="dropdown" href="javascript:void(0);" id="notificationbtn" data-ajax-post="/useractions/shownotifications" data-ajax-params="" data-ajax-callback="callback_show_notifications" data-target="notif_dropdown" class="dropdown-trigger btn-flat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path><path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path><path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path></svg>
                        @php
                            $count_ = 0;
                        @endphp   
                        @foreach ($dates as $key => $item)
                            @if ($item->endUsername == $user->username)  
                                @php
                                    $count_++;
                                @endphp                            
                            @endif
                        @endforeach
                        @foreach ($schedule as $key => $item)
                        @if ($item->endUsername == $user->username)  
                            @php
                                $count_++;
                            @endphp                            
                        @endif
                        @endforeach
                        <span class="badge notification_badge ">0</span>
                        <span class="badge d-none notification_badge_1 ">{{$count_ + 1}}</span>
                    </a>
                    <ul id="notif_dropdown" class="dropdown-content dropdown-menu" style="opacity: 1.0 !important">
                        <div class="" style="height: 300px; overflow:scroll">
                            <p style="border-bottom: 1px solid rgb(223, 223, 223)" class="fw-bold mb-0 p-3 fs-5"><?php echo __( 'Notifications' );?></p>
                            @foreach ($schedule as $key => $item)
                                @if ($item->endUsername == $user->username)
                                @php
                                    $date = explode("/", $item->date);
                                @endphp                          
                                <p onclick="check(`{{$item->username}}`,`{{$date[0]}}`, `{{$date[1]}}`)" class="p-1" style="border-bottom: 1px solid rgb(237, 237, 237)"><a style="color:rgb(138, 138, 138)" href="#">{{$item->username}} schedule a date with you on {{$date[0]}} - {{$date[1]}} </a></p>
                                @endif
                            @endforeach
                            @foreach ($dates as $key => $item)
                                @if ($item->endUsername == $user->username)                          
                                <p class="p-1" style="border-bottom: 1px solid rgb(237, 237, 237)"><a style="color:rgb(138, 138, 138)" href="{{ "/@" . $item->username}}">{{$item->username}} send you video call request</a></p>
                                @endif
                            @endforeach
                            <p style="border-bottom: 1px solid rgb(223, 223, 223)" class="pb-3"><a style="color:rgb(138, 138, 138)" href="#">Welcome to Admyrer, Connect and Chat with awesome people today, We have made it easy for you to have fun while you use our Admyrer platform.</a></p>
                            {{-- <button type="button" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></button> --}}
                        </div>
                    </ul>
                </li>
                <li class="header_user dropdown">                     
                    <a href="{{"/@" .$user->username}}" data-bs-toggle="dropdown" class="btn-flat dropdown-toggle">
                        <img src={{$user->avatar ?? "/img/icon.png"}} /> <span><?php echo __( 'Hi,' );?> {{$user->first_name}}</span> 
                    </a>
                    <div class="dropdown-menu">
                        <h5 class="dropdown-header text-capitalize mb-0 mt-0">{{$user->username}}</h5>
                        <hr class="dropdown-divider"></hr>
                        <p class="mb-0"><a href="{{"/@" .$user->username}}" class="dropdown-item">Profile</a></p>
                        <p class="mb-0"><a href="/user-settings" class="dropdown-item">General Settings</a></p>
                        <p class="mb-0"><hr class="dropdown-divider"></hr></p>
                        <p class="mb-0"><a class="dropdown-item fw-semibold text-danger" href="/logOut">Log Out</a></p>
                    </div>
                </li>
            </ul>
            
            <ul class="right">
                <li class="header_user">
                    <ul id="user_dropdown" class="dropdown-content">
                        <li>
                            <a href="javascript:void(0);" onclick="logout()" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.56,5.44L15.11,6.89C16.84,7.94 18,9.83 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12C6,9.83 7.16,7.94 8.88,6.88L7.44,5.44C5.36,6.88 4,9.28 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12C20,9.28 18.64,6.88 16.56,5.44M13,3H11V13H13" /></svg> <?php echo __( 'Log Out' );?></a>
                        </li>
                        <li class="divider night_day" tabindex="-1"></li>
                        <li>
                            <a href="javascript:void(0);" id="night_mode_toggle" class="" data-night-text="<?php echo __('Night mode');?>" data-light-text="<?php echo __('Day mode');?>" data-mode=''>
                                <div class="dayy">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z" /></svg> <?php echo __('Day mode');?>
                                </div>
                                <div class="nightt">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" /></svg> <?php echo __('Night mode');?>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
    </div>
</nav>

@push('javascript')
<script>
    function check(name, date, time) {
        Swal.fire({
            icon: "info",
            title: "Date Scheduled",
            html: `${name} Schedule a date with you </br></br> <p style="color:red">${date} - ${time}</p> Please be there..`,
            footer: `<a href="/@${name}">View ${name} profile?</a>`
        });
    }

    var header_notifications_1 = document.querySelector(".header_notifications_1")
    var chat_badge = document.querySelector(".chat_badge")
    var chat_badge_1 = document.querySelector(".chat_badge_1")
    header_notifications_1.addEventListener("click", () => {
        setCookie("allcount", "0", 100);
        chat_badge.innerHTML = 0
    })

    var header_notifications_2 = document.querySelector(".header_notifications_2")
    var notification_badge = document.querySelector(".notification_badge")
    var notification_badge_1 = document.querySelector(".notification_badge_1")
    header_notifications_2.addEventListener("click", () => {
        setCookie("allcountN_", "0", 100);
        notification_badge.innerHTML = 0
    })

    function setCookie(name, value, days) {
    var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Example usage: Get the value of the "username" cookie
    var getcount = getCookie("allcount");    
    if(getcount){
        chat_badge.innerHTML = getcount
    }else{
        var allcount = setCookie("allcount", chat_badge_1.innerHTML, 100);
        var getcount = getCookie("allcount");
        chat_badge.innerHTML = getcount
    }

    var allcountN_ = getCookie("allcountN_");
    console.log(notification_badge_1.innerHTML, allcountN_)
    if(allcountN_){
        notification_badge.innerHTML = allcountN_
    }else{
        var allcountN_ = setCookie("allcountN_", notification_badge_1.innerHTML, 100);
        var getcountN = getCookie("allcountN_");
        notification_badge.innerHTML = getcountN
    }
    


</script>
    
@endpush