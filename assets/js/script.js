const date = new Date();
const hour = document.getElementById("hours");
const minute = document.getElementById("minutes");
const second = document.getElementById("seconds");

let hours = date.getHours();
let minutes = date.getMinutes();
let seconds = date.getSeconds();
let timer = document.getElementById("time");

timer.innerHTML = hours + ":" + minutes + ":" + seconds;

time();

function time() {
    seconds++
    if(seconds >= 60) {
        seconds = 0;
        minutes++;
        if(minutes >= 60) {
            minutes = 0;
            hours++;
            if(hours >= 24) {
                hours = 0;
            }
        }
    }

    if(seconds < 10 && minutes < 10) {
        timer.innerHTML = hours + ":0" + minutes + ":0" + seconds;
    }
    else if(seconds < 10) {
        timer.innerHTML = hours + ":" + minutes + ":0" + seconds;
    }
    else if(minutes < 10) {
        timer.innerHTML = hours + ":0" + minutes + ":" + seconds;
    }
    else {
        timer.innerHTML = hours + ":" + minutes + ":" + seconds;
    }

    if(hours < 10) {
        timer.innerHTML = "0" + timer.innerHTML;
    }

    setTimeout( time, 1000)
}