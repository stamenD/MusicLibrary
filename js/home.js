let playme = document.getElementById("audio");
playme.className = "hidden"

function like(path, nickname) {
    let info = { "nickname": myvar["nickname"], "song": parseInt(path) }
    console.log(info)
    let firstHeart = document.querySelectorAll(".song")[0];
    let firstNumber = firstHeart.className.split(" ")[1];
    let heart = document.querySelectorAll(".song")[path - parseInt(firstNumber)].querySelector(".songName .heart i")
    // heart.classList.remove("fa");
    console.log(heart)
    if (heart.innerHTML ==  "❤️") {
        heart.innerHTML = "🖤";
        send(info, "POST", "../controllers/dislikeSong.php")
    } else {
        heart.innerHTML = "❤️";
        send(info, "POST", "../controllers/likeSong.php")
    }


}
function millisToMinutesAndSeconds(millis) {
    let minutes = Math.floor(millis / 60000);
    let seconds = ((millis % 60000) / 1000).toFixed(0);
    return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
}


function play(path) {
    console.log("path:" + path)
    let playme = document.getElementById("audio");
    let arr = document.getElementsByClassName("song")
    for (var i = 0; i < arr.length; i++) {
        if (arr[i].className.split(" ")[1] != path) {
            arr[i].style.backgroundColor = 'white';
        }
    }
    arr = document.getElementsByClassName("audioBtn")
    for (var i = 0; i < arr.length; i++) {
        if (arr[i].className.split(" ")[2] != path) {
            arr[i].innerHTML = '▶️'
        }
    }

    if (document.getElementsByClassName(path)[2].innerHTML == '⏸️') {
        playme.pause();
        if (myvar["current_song"]) {
            let info = { "nickname": myvar["nickname"], "song": parseInt(myvar["current_song"]), "duration": millisToMinutesAndSeconds(new Date() - myvar["started_at"]) }
            send(info, "POST", "../controllers/listenSong.php")
            console.log("You listen: " + myvar["current_song"] + " : " + millisToMinutesAndSeconds(new Date() - myvar["started_at"]));
            myvar["current_song"] = null;
        }
        playme.className = "hidden"
        document.getElementsByClassName(path)[2].innerHTML = '⏯️'
    } else if (document.getElementsByClassName(path)[2].innerHTML === '⏯️') {
        playme.play();
        myvar["current_song"] = path;
        myvar["started_at"] = new Date();
        playme.className = "visible"
        document.getElementsByClassName(path)[2].innerHTML = '⏸️'
    } else {
        document.getElementsByClassName(path)[2].innerHTML = '⏸️'
        document.getElementsByClassName(path)[0].style.backgroundColor = '#b1baf5';
        if (myvar["current_song"] != path && !!myvar["current_song"]) {
            let info = { "nickname": myvar["nickname"], "song": parseInt(myvar["current_song"]), "duration": millisToMinutesAndSeconds(new Date() - myvar["started_at"]) }
            send(info, "POST", "../controllers/listenSong.php")
            console.log("You listen: " + myvar["current_song"] + " : " + millisToMinutesAndSeconds(new Date() - myvar["started_at"]));
        }
        myvar["current_song"] = path;
        myvar["started_at"] = new Date();
        playme.className = "visible"
        console.log(">>>>>>>>>>>>" + myvar["staticDir"] + path + ".mp3");
        playme.src = myvar["staticDir"] + path + ".mp3";
        // playme.src = "../static/" + sourceFrom.innerHTML.substring(8);
        playme.play();
    }
}