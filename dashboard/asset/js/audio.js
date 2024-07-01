// dashboard
var myAudio = document.getElementById("audio");
var isPlaying = false;

function togglePlay() {
    isPlaying ? myAudio.pause() : myAudio.play();
};

myAudio.onplaying = function() {
    isPlaying = true;
    audioIcon.classList.remove('volume_up');
    audioIcon.classList.add('play_arrow');
};

myAudio.onpause = function() {
    isPlaying = false;
};