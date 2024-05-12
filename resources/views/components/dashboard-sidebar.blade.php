@php
    $findActive = $findActive ?? false;
    $matchesactive = $matchesactive ?? false;
    $likedactive = $likedactive ?? false;
    $likesactive = $likesactive ?? false;
    $dislikedactive = $dislikedactive ?? false;
    $giftactive = $giftactive ?? false;
    $friendsactive = $friendsactive ?? false;
    $friendreqactive = $friendreqactive ?? false;
    $visitactive = $visitactive ?? false;
    $storiesactive = $storiesactive ?? false;
    $hotactive = $hotactive ?? false;
    $aiactive = $aiactive ?? false;
    $pollactive = $pollactive ?? false;
@endphp

<div class="col-sm-3">
    <div class="dt_left_sidebar">
        <div class="home_usr_sct">
            <div>
                <div class="user_popularity_icn" data-value="">
                    <svg width="90px" height="90px" viewBox="0 0 80 80">
                        <path class="load-bg cir1" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"></path>
                        <path id="load-line1" class="load-circle" style="stroke-dashoffset: 192.6168975830078px; stroke-dasharray: 192.6168975830078px;stroke:" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" ></path></svg>
                    <a class="avatar" href={{"/@" . $user->username}} data-ajax=""><img src={{$user->avatar}} class="circle" alt="" /></a>
                </div>
                <span>
                    <h3 class="text-capitalize mb-4"><a href="" data-ajax="">{{$user->first_name ." ". $user->last_name}}</a></h3>
                    {{-- <p class="text-capitalize"><a href="/popularity" data-ajax="/popularity"><?php echo __( 'Popularity' );?>: <b>dey play</b></a></p> --}}
                    {{-- <div>
                        <a href="/popularity" data-ajax="/popularity" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg> <?php echo __( 'Increase' );?> <?php echo __( 'Popularity' );?></a>
                    </div> --}}
                </span>
            </div>
        </div>

        <div class="home_usr_stats">
            <div>
                <div>
                    <b>0</b>
                    <p><?php echo __( 'Visitors' );?></p>
                </div>
                <div>
                    <b>0</b>
                    <p><?php echo __( 'Likes' );?></p>
                </div>
                <div>
                    <b>0</b>
                    <p><?php echo __( 'Friends' );?></p>
                </div>
            </div>
        </div>

        <ul class="menu">
            <li>
                <a href="/find-matches" data-ajax="/find-matches" class={{$findActive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M9.55 11.5a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5zm.45 8.248V16.4c0-.488.144-.937.404-1.338a6.473 6.473 0 0 0-5.033 1.417A8.012 8.012 0 0 0 10 19.749zM4.453 14.66A8.462 8.462 0 0 1 9.5 13c1.043 0 2.043.188 2.967.532.878-.343 1.925-.532 3.033-.532 1.66 0 3.185.424 4.206 1.156a8 8 0 1 0-15.253.504zm14.426 1.426C18.486 15.553 17.171 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm3.5-9.5a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg> <?php echo __( 'Find Matches' );?>
                </a>
            </li>
            <li>
                <a href="/matches" data-ajax="/matches" class={{$matchesactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm5.793 8.914l3.535-3.535 1.415 1.414-4.95 4.95-3.536-3.536 1.415-1.414 2.12 2.121z" /></svg> <?php echo __( 'Matches' );?>
                </a>
            </li>
            <li>
                <a href="/visits" data-ajax="/visits" class={{$visitactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11a5 5 0 0 1 5 5v6h-2v-6a3 3 0 0 0-2.824-2.995L12 13a3 3 0 0 0-2.995 2.824L9 16v6H7v-6a5 5 0 0 1 5-5zm-6.5 3c.279 0 .55.033.81.094a5.947 5.947 0 0 0-.301 1.575L6 16v.086a1.492 1.492 0 0 0-.356-.08L5.5 16a1.5 1.5 0 0 0-1.493 1.356L4 17.5V22H2v-4.5A3.5 3.5 0 0 1 5.5 14zm13 0a3.5 3.5 0 0 1 3.5 3.5V22h-2v-4.5a1.5 1.5 0 0 0-1.356-1.493L18.5 16c-.175 0-.343.03-.5.085V16c0-.666-.108-1.306-.309-1.904.259-.063.53-.096.809-.096zm-13-6a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm-13 2a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1zm13 0a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" /></svg> <?php echo __( 'Visits' );?>
                </a>
            </li>
                <li>
                    <a href="/friends" data-ajax="/friends" class={{$friendsactive ? "active" : ""}}>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z" /></svg> <?php echo __( 'Friends' );?>
                    </a>
                </li>
                
                <li>
                    <a href="/ai-assistant" data-ajax="/ai-assistant" class={{$aiactive ? "active" : ""}}>
                        <i class="fa-solid fa-robot" style="margin-right: 1.2em"></i>  <?php echo __( 'AI Assistant' );?>
                    </a>
                </li>
                <li>
                    <a href="/user-polls" data-ajax="" class={{$pollactive ? "active" : ""}}>
                        <i class="fa-solid fa-square-poll-vertical" style="margin-right: 1.2em"></i>  <?php echo __( 'Polls' );?>
                    </a>
                </li>
            <li class="divider" tabindex="-1"></li>
            {{-- <li>
                <a href="/gifts" data-ajax="/gifts" class={{$giftactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 10H2V4.003C2 3.449 2.455 3 2.992 3h18.016A.99.99 0 0 1 22 4.003V10h-1v10.001a.996.996 0 0 1-.993.999H3.993A.996.996 0 0 1 3 20.001V10zm16 0H5v9h14v-9zM4 5v3h16V5H4zm5 7h6v2H9v-2z"></path></svg> <?php echo __( 'Gifts' );?>
                </a>
            </li> --}}
            <li>
                <a href="/likes" data-ajax="/likes" class={{$likesactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z" /></svg> <?php echo __( 'Likes' );?>
                </a>
            </li>
            <li>
                <a href="/liked" data-ajax="/liked" class={{$likedactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.841 15.659l.176.177.178-.177a2.25 2.25 0 0 1 3.182 3.182l-3.36 3.359-3.358-3.359a2.25 2.25 0 0 1 3.182-3.182zM12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 7.75-7.996L12 14zm0-13c3.315 0 6 2.685 6 6a5.998 5.998 0 0 1-5.775 5.996L12 13c-3.315 0-6-2.685-6-6a5.998 5.998 0 0 1 5.775-5.996L12 1zm0 2C9.79 3 8 4.79 8 7s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z" /></svg> <?php echo __( 'People i liked' );?>
                </a>
            </li>
            <li>
                <a href="/disliked" data-ajax="/disliked" class={{$dislikedactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm7 6.586l2.121-2.122 1.415 1.415L20.414 19l2.122 2.121-1.415 1.415L19 20.414l-2.121 2.122-1.415-1.415L17.586 19l-2.122-2.121 1.415-1.415L19 17.586z" /></svg> <?php echo __( 'People i disliked' );?>
                </a>
            </li>
            {{-- <li>
                <a href="/friend-requests" data-ajax="/friend-requests" class={{$friendreqactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6 6v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z" /></svg> <?php echo __( 'Friend requests' );?>
                </a>
            </li> --}}
            <li>
                <a href="/hots" data-ajax="/hot" class={{$hotactive ? "active" : ""}}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 23a7.5 7.5 0 0 0 7.5-7.5c0-.866-.23-1.697-.5-2.47-1.667 1.647-2.933 2.47-3.8 2.47 3.995-7 1.8-10-4.2-14 .5 5-2.796 7.274-4.138 8.537A7.5 7.5 0 0 0 12 23zm.71-17.765c3.241 2.75 3.257 4.887.753 9.274-.761 1.333.202 2.991 1.737 2.991.688 0 1.384-.2 2.119-.595a5.5 5.5 0 1 1-9.087-5.412c.126-.118.765-.685.793-.71.424-.38.773-.717 1.118-1.086 1.23-1.318 2.114-2.78 2.566-4.462z" /></svg> <?php echo __( 'HOT OR NOT' );?>
                </a>
            </li>
                <li onclick="tessxt()">
                    <a href="#live-users" data-ajax="/live-users" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 9.2l5.213-3.65a.5.5 0 0 1 .787.41v12.08a.5.5 0 0 1-.787.41L17 14.8V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4.2zm0 3.159l4 2.8V8.84l-4 2.8v.718zM3 6v12h12V6H3zm2 2h2v2H5V8z"></path></svg> <?php echo __( 'Live Videos' );?>
                    </a>
                </li>
            <li class="divider" tabindex="-1"></li>
            <li>
                <a href="/blog" data-ajax="/blog" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 22H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2V4H5v16h14zM8 9h8v2H8V9zm0 4h8v2H8v-2z"></path></svg> <?php echo __( 'Blog' );?>
                </a>
            </li>
                <li>
                    <a href="/stories" data-ajax="/stories" class={{$storiesactive ? "active" : ""}}>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 17v5h-2v-5c0-4.451 2.644-8.285 6.447-10.016l.828 1.82A9.002 9.002 0 0 0 18 17zM8 17v5H6v-5A9.002 9.002 0 0 0 .725 8.805l.828-1.821A11.002 11.002 0 0 1 8 17zm4-5a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path></svg> <?php echo __( 'Success stories' );?>
                    </a>
                </li>
        </ul>
    </div>
</div>

{{-- 
<video autoplay onclick="startCall()" id="localVideo" style="width: 400px; height:400px; border:1px solid red"></video>
<video autoplay onclick="stopCall()" id="remoteVideo" style="width: 400px; height:400px; border:1px solid blue"></video> --}}

<x-start-live></x-start-live>

@push("javascript")
<script>
    const localVideo = document.getElementById('localVideo');
    const remoteVideo = document.getElementById('remoteVideo');

    function startCall (){
        navigator.mediaDevices.getUserMedia({ video: true, audio: true })
        .then(stream => {
            localVideo.srcObject = stream;

            const configuration = {
                iceServers: [
                    { urls: 'stun:stun.l.google.com:19302' } // STUN server for NAT traversal
                ]
            };

            const peerConnection = new RTCPeerConnection(configuration);
            stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));

            peerConnection.ontrack = event => {
                remoteVideo.srcObject = event.streams[0];
            };

            // Signaling logic (connecting to signaling server, exchanging SDP offers and answers, ICE candidates, etc.) would go here
        })
        .catch(error => console.error('getUserMedia error:', error));

    }

    function stopCall(){
        const stream = localVideo.srcObject;
        const tracks = stream.getTracks();

        tracks.forEach(track => track.stop());

        localVideo.srcObject = null;
        remoteVideo.srcObject = null;

        // peerConnection.close();
        // peerConnection = null;
    }

</script>
@endpush