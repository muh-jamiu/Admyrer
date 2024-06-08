@php
    $audio = App\Models\Audio::inRandomOrder()->get();
@endphp

<div class="live_vid d-none">
   <div class="btns d-none _liveBtn d-flex">
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

        <button onclick="deleteclub()" id="end_club" class="btn d-none" style="background-color: rgb(238, 2, 2)">End Club <i class="fa-solid fa-xmark"></i></button>


        <button  data-bs-toggle="offcanvas" id="_mus" data-bs-target="#music_" class="btn d-none" style="background-color: rgb(71, 202, 130)">Music <i class="fa-solid fa-music"></i></button>
        <button id="timer"  class="btn d-none" style="background-color: rgb(61, 201, 30)"></button>
        
        <div class="offcanvas offcanvas-end" id="music_">
            <div class="offcanvas-header bg-danger text-white">
              <h5 style="margin: 0 !important" class="offcanvas-title">Choose Music</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div id="accordion">

                    <div class="card" style="box-shadow: .1em .1em .5em rgb(240, 240, 240)">
                      <div class="card-header bg-dark" data-bs-toggle="collapse" href="#collapseOne">
                        <a class="collapsed text-white" >
                          All Category
                        </a>
                      </div>
                      <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body">
                            @foreach ($audio as $item)
                            <div class="d-flex" style="border-bottom:1px solid lightgray">
                                <div>
                                    <h6 class="name mb-0 text-capitalize">{{$item->name}}</h6>
                                    <p style="font-size: 10px" class="name mb-0 text-capitalize">Music by {{$item->artist}}
                                        <span style="font-size: 16px" class="mb-0 text-danger playbtn mx-2" onclick="playAudio('{{ url('audio/' . $item->filename)}}')"><i class="fa-regular fa-circle-play"></i></span> 
                                        <span style="font-size: 16px" class="mb-0 text-info " onclick="pauseAudio('{{ url('audio/' . $item->filename)}}')"><i class="fa-regular fa-circle-pause"></i></span> 
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                      </div>
                    </div>
                  
                    <div class="card" style="box-shadow: .1em .1em .5em rgb(240, 240, 240)">
                      <div class="card-header bg-primary" data-bs-toggle="collapse" href="#collapseTwo">
                        <a class="collapsed text-white">
                          Genre
                        </a>
                      </div>
                      <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            @foreach ($audio as $item)
                            <div class="d-flex" style="border-bottom:1px solid lightgray">
                                <div>
                                    <h6 class="name mb-0 text-capitalize">{{$item->name}}</h6>
                                    <p style="font-size: 10px" class="name mb-0 text-capitalize">Music by {{$item->artist}}
                                        <span style="font-size: 16px" class="mb-0 text-danger playbtn mx-2" onclick="playAudio('{{ url('audio/' . $item->filename)}}')"><i class="fa-regular fa-circle-play"></i></span> 
                                        <span style="font-size: 16px" class="mb-0 text-info " onclick="pauseAudio('{{ url('audio/' . $item->filename)}}')"><i class="fa-regular fa-circle-pause"></i></span> 
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                      </div>
                    </div>

                    <div class="card" style="box-shadow: .1em .1em .5em rgb(240, 240, 240)">
                        <div class="card-header bg-danger" data-bs-toggle="collapse" href="#collapse3">
                          <a class="collapsed text-white">
                            Others
                          </a>
                        </div>
                        <div id="collapse3" class="collapse" data-bs-parent="#accordion">
                          <div class="card-body">
                              
                          </div>
                        </div>
                      </div>
                                    
                </div>

                @if (count($audio) > 0)
                    @foreach ($audio as $item)
                        <div class="d-flex mt-5">
                            <div>
                                <p style="font-size: 14px" class="name mb-0 text-capitalize">Play all music
                                    <span style="font-size: 16px" class="mb-0 text-danger playbtn mx-2" onclick="playAudio('{{ url('audio/' . $audio[0]->filename)}}')"><i class="fa-regular fa-circle-play"></i></span> 
                                    <span style="font-size: 16px" class="mb-0 text-info " onclick="pauseAudio('{{ url('audio/' . $audio[0]->filename)}}')"><i class="fa-regular fa-circle-pause"></i></span> 
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if (count($audio) == 0)
                    <div class="text-center mt-5">
                        <h4 class="fw-bold">Empty</h4>
                        <p>There are no music to be play at the moment</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div id="video-streams" class="video-streams p-4 row" style="">
    </div>
</div>

@push('javascript')
    <script>
        let loginUser;
        Pusher.logToConsole = true;
        var pusher = new Pusher('61cbedc7014185332c2d', {
        cluster: 'mt1'
        });
	    var channel = pusher.subscribe('callMessage');

        channel.bind('call-Message', function(data) {
            if(loginUser != data.username){
                $(".offcanvas-body").append(`<li class=""><strong>${data.username}:</strong> ${data.message}</li>`)
                $(".offcanvas-body").scrollTop($(".modal-body").height()*100);                
            }
	    });	
        
        function sendMsg_(params) {
            var message = document.getElementById("message")
            if(message.value.length > 0){
                $(".offcanvas-body").append(`<li class="">${message.value}</li>`)
                $(".offcanvas-body").scrollTop($(".modal-body").height()*100);
                send(message.value)
                message.value = ""
            }
        }

        function send(msg) {
            axios.post("/call-message", {
                msg: msg,
            })
            .then((res) => {
                console.log(res)
                loginUser = res.data
            })
            .catch((error) => console.log(error))
        }

    </script>
@endpush