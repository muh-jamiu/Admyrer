<div class="live_vid d-none">
   <div class="btns d-flex">
        <button  class="btn" id="join-btn" onclick="joinStream()">start</button>
        <button onclick="leaveAndRemoveLocalStream()" class="btn bg-danger" id="leave-btn"><i class="fa-solid fa-person-walking-arrow-right"></i></button>
        <button onclick="toggleMic()" class="btn bg-danger" id="mic-btn"><i class="fa-solid fa-microphone"></i></button>
        <button onclick="toggleCamera()" class="btn bg-danger" id="camera-btn"><i class="fa-solid fa-camera-retro"></i></button>
        <button class="btn" style="background-color: rgb(133, 133, 134)" ><i class="fa-solid fa-message"></i></button>
        <button class="btn" style="background-color: rgb(65, 139, 251)"><i class="fa-solid fa-face-smile"></i></button>
    </div>

    <div id="video-streams" class="video-streams p-4 row" style="">
    </div>
</div>

<script src="https://download.agora.io/sdk/release/AgoraRTC_N-4.20.2.js"></script>