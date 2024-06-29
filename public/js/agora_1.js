const APP_ID = "b76f67d420d2486699d05d28cf678251"
const TOKEN = "007eJxTYMg8dfqV1Ks5TSdXV+RlTHp1YjL768fWE211fPVeO5hwNjAoMCSZm6WZmaeYGBmkGJlYmJlZWqYYmKYYWSQDRS2MTA0VrBvSGgIZGW6LZDEzMkAgiM/CkJuYmcfAAABkYB5Y"
const CHANNEL = "main"

const client = AgoraRTC.createClient({mode:'rtc', codec:'vp8'})

let localTracks = []
let remoteUsers = {}

joinAndDisplayLocalStream =async () => {
    await client.on('user-published', handleUserJoined)
    await client.on('user-left', handleUserLeft)
    var live_vid = document.querySelector(".live_vid")
    var _liveBtn = document.querySelector("._liveBtn")
    live_vid.classList.remove("d-none")
    setTimeout(()=> {
        _liveBtn.classList.remove("d-none")
    },1500)
    let UID = await client.join(APP_ID, CHANNEL, TOKEN, null)
    if(!is_stream_){
        localTracks = await  AgoraRTC.createMicrophoneAndCameraTracks() 
        let player = `<div class="video-containers col-sm-4" id="user-container-${UID}">
                            <div class="video-player" id="user-${UID}"></div>
                    </div>`
        document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)
    }
    localTracks[1].play(`user-${UID}`)
    
    await client.publish([localTracks[0], localTracks[1]])
}


var show_ = document.querySelector(".show_")
let username_;
let is_stream_;
let is_rev_;
let is_speed_;

let _mus = document.getElementById("_mus")
const timer = document.getElementById('timer');
const speed_con = document.getElementById('speed_con');
const end_club = document.getElementById('end_club');
let joinStream = async (username, avatar, gender, name, country, is_stream, is_club, is_rev, is_speed, is_club_own) => {
    username_ = username
    is_stream_ = is_stream
    is_rev_ = is_rev
    is_speed_ = is_speed
    if(is_club == true){
        _mus.classList.remove("d-none")
    }else{
        _mus.classList.add("d-none")
    }

    if(is_club_own){
        end_club.classList.remove("d-none")
    }

    if(is_speed){
        timer.classList.remove("d-none")
        speed_con.classList.remove("d-none")
        start()
    }

    await joinAndDisplayLocalStream()
    if(show_){
        show_.classList.add("d-none")
    }
    if(avatar){
        storeLive(username, username, avatar, gender, name, country)
    }
}

let handleUserJoined = async (user, mediaType) => {
    remoteUsers[user.uid] = user 
    await client.subscribe(user, mediaType)
    if (mediaType === 'video'){
        let player = document.getElementById(`user-container-${user.uid}`)
        if (player != null){
            player.remove()
        }

        player = `<div class="video-containers col-sm-4" id="user-container-${user.uid}">
        <div class="video-player" id="user-${user.uid}"></div>
        </div>`
        document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)

        user.videoTrack.play(`user-${user.uid}`)
    }
    
    if (mediaType === 'audio'){
        user.audioTrack.play()
    }
}

let handleUserLeft = async (user) => {
    delete remoteUsers[user.uid]
    pauseAudio()
    if(show_){
        show_.classList.remove("d-none")
    }
    // window.location.href = "/review?username=" + username_
    document.getElementById(`user-container-${user.uid}`).remove()
    var live_vid = document.querySelector(".live_vid")
    // live_vid.classList.add("d-none")
    // document.getElementById('video-streams').innerHTML = ""
}

let leaveAndRemoveLocalStream = async () => {
    var live_vid = document.querySelector(".live_vid")
    live_vid.classList.add("d-none")
    pauseAudio()
    if(show_){
        show_.classList.remove("d-none")
    }
    deleteLive(_liveID)
    if(is_rev_){
        window.location.href = "/review?username=" + username_
    }

    for(let i = 0; localTracks.length > i; i++){
        localTracks[i].stop()
        localTracks[i].close()
    }

    await client.leave()
}

let toggleMic = async (e) => {
    var mic = document.getElementById('mic-btn')
    if (localTracks[0].muted){
        await localTracks[0].setMuted(false)
        mic.innerHTML = 'Mic On <i class="fa-solid fa-microphone"></i>'
        mic.style.backgroundColor = 'cadetblue'
    }else{
        await localTracks[0].setMuted(true)
        mic.innerHTML = 'Mic Off <i class="fa-solid fa-microphone"></i>'
        mic.style.backgroundColor = '#EE4B2B'
    }
}

let toggleCamera = async (e) => {
    var camera = document.getElementById('camera-btn')
    if(localTracks[1].muted){
        await localTracks[1].setMuted(false)
        camera.innerHTML = 'Camera On <i class="fa-solid fa-camera-retro"></i>'
        camera.classList.backgroundColor = 'cadetblue'
    }else{
        await localTracks[1].setMuted(true)
        camera.innerHTML = 'Camera Off <i class="fa-solid fa-camera-retro"></i>'
        camera.style.backgroundColor = '#EE4B2B'
    }
}

let _liveID;
function storeLive(liveId, username, avatar, gender, name, country) {
    axios.post("/store-live", {
        username: username,
        liveId: liveId,
        avatar: avatar,
        gender: gender,
        name: name,
        country: country,
    })
    .then(res => {
        console.log(res)
        _liveID = res.data
    })
    .catch(error => {
        console.log(error)
    })
}

function deleteLive(id) {
    axios.post("/delete-live", {
        id: id,
    })
    .then(res => {
        console.log(res)
    })
    .catch(error => {
        console.log(error)
    })
}

let clubId;
function createClub(params) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title:`You Created a night club`,
        showConfirmButton: false,
        timer: 1500
    });
    joinStream(null, null, null, null, null, null, true, null, null, true)
    axios.post("/store-club", {
        password: _pass.value,
        name: _name.value,
        username: _user.innerHTML,
    })
    .then(res => {
        console.log(res)
        clubId = res.data
    })
    .catch(res => console.log(res))
}

function deleteclub() {
    leaveAndRemoveLocalStream()
    
    axios.post("/delete-club", {
        id: clubId,
    })
    .then(res => {
        console.log(res, remoteUsers)
    })
    .catch(error => {
        console.log(error, remoteUsers)
    })
}

let currentAudio = null;
var playbtn = document.querySelectorAll(".playbtn")

function playAudio(src) {
    if (currentAudio) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
    }

    currentAudio = new Audio(src);
    currentAudio.play();
}

function pauseAudio(src) {
    if (currentAudio) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
        currentAudio = null
        return
    }
}

function startTimer(duration, display) {
    let timer = duration, minutes, seconds;
    const interval = setInterval(() => {
        minutes = Math.floor(timer / 60);
        seconds = timer % 60;

        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        display.textContent = minutes + ':' + seconds;
        

        if (--timer < 0) {
            clearInterval(interval);
            handleUserLeft()
            leaveAndRemoveLocalStream()
        }

        if (timer == 540) {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title:`No Speed user is Connected at the moment`,
                showConfirmButton: false,
                timer: 1500
            });
            clearInterval(interval);
            handleUserLeft()
            leaveAndRemoveLocalStream()
        }
    }, 1000);
}

function start(params) {
    const twoMinutes = 60 * 10;
    const display = document.getElementById('timer');
    startTimer(twoMinutes, display);
}

document.getElementById('join-btn').addEventListener('click', joinStream)
document.getElementById('leave-btn').addEventListener('click', leaveAndRemoveLocalStream)
document.getElementById('mic-btn').addEventListener('click', toggleMic)
document.getElementById('camera-btn').addEventListener('click', toggleCamera)