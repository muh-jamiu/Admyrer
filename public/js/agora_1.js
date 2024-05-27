const APP_ID = "b76f67d420d2486699d05d28cf678251"
const TOKEN = "007eJxTYDhy47pt1OrJocpp0haqAitbfiq5nFj8aK3s5sfeE9+dEQlSYDA2t0g2MTY0Nk5JTDIxTTWwsDQ2skhLNjU0SE62NE5MPNERktYQyMjQI7KDkZEBAkF8FobcxMw8BgYATTMfYQ=="
const CHANNEL = "main"

const client = AgoraRTC.createClient({mode:'rtc', codec:'vp8'})

let localTracks = []
let remoteUsers = {}

let joinAndDisplayLocalStream = async () => {
    var live_vid = document.querySelector(".live_vid")
    live_vid.classList.remove("d-none")

    // Initialize the AgoraRTC client
    client.init(APP_ID, () => {
        client.join(
            TOKEN, 
            CHANNEL,
            null,
            TOKEN,
            async (uid) =>  {
                var UID = uid
                await client.on('user-published', handleUserJoined)
                
                await client.on('user-left', handleUserLeft)
                
                localTracks = await  AgoraRTC.createMicrophoneAndCameraTracks() 

                let player = `<div class="video-containers col-sm-4" id="user-container-${UID}">
                                    <div class="video-player" id="user-${UID}"></div>
                            </div>`
                document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)

                localTracks[1].play(`user-${UID}`)

                console.log(localTracks)
                
                await client.publish([localTracks[0], localTracks[1]])
            },
            (err) => {
                console.error('Failed to join channel', err);
            }
        );
    }, (err) => {
        console.error('AgoraRTC client initialization failed', err);
    });

}

let joinStream = async () => {
    await joinAndDisplayLocalStream()
    document.getElementById('join-btn').style.display = 'none'
    document.getElementById('stream-controls').style.display = 'flex'
}

let handleUserJoined = async (user, mediaType) => {
    alert(user.id)
    remoteUsers[user.uid] = user 
    await client.subscribe(user, mediaType)

    if (mediaType === 'video'){
        let player = document.getElementById(`user-container-${user.uid}`)
        if (player != null){
            player.remove()
        }

        player = `<div class="video-container" id="user-container-${user.uid}">
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
    alert(user.id)
    delete remoteUsers[user.uid]
    document.getElementById(`user-container-${user.uid}`).remove()
    var live_vid = document.querySelector(".live_vid")
    live_vid.classList.add("d-none")
    document.getElementById('video-streams').innerHTML = ""
}

let leaveAndRemoveLocalStream = async () => {
    var live_vid = document.querySelector(".live_vid")
    live_vid.classList.add("d-none")
    document.getElementById('video-streams').innerHTML = ""

    for(let i = 0; localTracks.length > i; i++){
        localTracks[i].stop()
        localTracks[i].close()
    }

    await client.leave()
    document.getElementById('join-btn').style.display = 'block'
    // document.getElementById('stream-controls').style.display = 'none'
    // document.getElementById('video-streams').innerHTML = ''
}

let toggleMic = async (e) => {
    if (localTracks[0].muted){
        await localTracks[0].setMuted(false)
        e.target.innerText = 'Mic on'
        e.target.style.backgroundColor = 'cadetblue'
    }else{
        await localTracks[0].setMuted(true)
        e.target.innerText = 'Mic off'
        e.target.style.backgroundColor = '#EE4B2B'
    }
}

let toggleCamera = async (e) => {
    if(localTracks[1].muted){
        await localTracks[1].setMuted(false)
        e.target.innerText = 'Camera on'
        e.target.style.backgroundColor = 'cadetblue'
    }else{
        await localTracks[1].setMuted(true)
        e.target.innerText = 'Camera off'
        e.target.style.backgroundColor = '#EE4B2B'
    }
}

document.getElementById('join-btn').addEventListener('click', joinStream)
document.getElementById('leave-btn').addEventListener('click', leaveAndRemoveLocalStream)
document.getElementById('mic-btn').addEventListener('click', toggleMic)
document.getElementById('camera-btn').addEventListener('click', toggleCamera)