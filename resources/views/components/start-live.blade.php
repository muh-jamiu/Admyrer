<div class="live_vid d-none">
   <div class="btns d-flex">
        {{-- <button  class="btn" id="join-btn" onclick="joinStream()">start</button> --}}
        <button onclick="leaveAndRemoveLocalStream()" class="btn bg-danger" id="leave-btn">Leave <i class="fa-solid fa-person-walking-arrow-right"></i></button>
        <button onclick="toggleMic()" class="btn bg-danger" id="mic-btn">Mic On <i class="fa-solid fa-microphone"></i></button>
        <button onclick="toggleCamera()" class="btn bg-danger" id="camera-btn">Camera On <i class="fa-solid fa-camera-retro"></i></button>


        <button  data-bs-toggle="offcanvas" data-bs-target="#messages_" class="btn" style="background-color: rgb(133, 133, 134)" >Messages <i class="fa-solid fa-message"></i></button>
        <div class="offcanvas offcanvas-end" id="messages_">
            <div class="offcanvas-header bg-primary text-white">
              <h5 style="margin: 0 !important" class="offcanvas-title">Messages</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <li class="d-none">Wow, you look gorgeus today</li>
            </div>
            <div class="offcanvas-footer bg-primary p-2">
                <textarea name="" id="message" placeholder="type message...."></textarea>
                <button onclick="sendMsg_()" class="btn text-dark">Send</button>
            </div>
        </div>


        <button  data-bs-toggle="offcanvas" id="_mus" data-bs-target="#music_" class="btn d-none" style="background-color: rgb(71, 202, 130)">Music <i class="fa-solid fa-music"></i></button>
 
        <div class="offcanvas offcanvas-end" id="music_">
            <div class="offcanvas-header bg-danger text-white">
              <h5 style="margin: 0 !important" class="offcanvas-title">Choose Music</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
            </div>
        </div>
    </div>

    <div id="video-streams" class="video-streams p-4 row" style="">
    </div>
</div>

@push('javascript')
    <script>
        function sendMsg_(params) {
            var message = document.getElementById("message")
            if(message.value.length > 0){
                $(".offcanvas-body").append(`<li class="">${message.value}</li>`)
                $(".offcanvas-body").scrollTop($(".modal-body").height()*100);
                message.value = ""
            }
        }
    </script>
@endpush