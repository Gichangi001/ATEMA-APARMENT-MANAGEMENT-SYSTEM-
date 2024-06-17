const APP_ID = "8deaf079189d4cdd9075f34f4262b37b"
const TOKEN = "007eJxTYBBgd+gQW+gkv7dSw9ViR3P6vLfTzO9Y/yhfXv+bn8uH/68Cg0VKamKagbmloYVliklySoqlgblpmrFJmomRmVGSsXm5y2XBhGyJTLs2XeqEMQVV3chUXURvs78cHYZ5OBAQCYqh19"
const CHANNEL = "HHH"

const client = AgoraRTC.createClient({mode:'rtc', codec:'vp8'})

let localTracks = []
let remoteUsers = {}

let joinAndDisplayLocalStream = async () => {

    let UID = await client.join(APP_ID, CHANNEL, TOKEN, null)
    
    localTracks = await AgoraRTC.createMicrophoneAndCameraTracks() 

    let player = `<div class="video-container" id="user-container-${UID}">
                        <div class="video-player" id="user-${UID}"></div>
                  </div>`
    
                  document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)

    
                  localTracks[1].play(`user-${UID}`)

                  await client.publish([localTracks[0], localTracks[1]])


}

let joinStream = async () => {
    await joinAndDisplayLocalStream()
    document.getElementById('join-btn').style.display = 'none'
    document.getElementById('stream-controls').style.display = 'flex'
}

document.getElementById('join-btn').addEventListener('click', joinStream)
