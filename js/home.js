let playme = document.getElementById("audio");
playme.className = "hidden"

function like(path) {
    let firstHeart = document.querySelectorAll(".song")[0];
    let firstNumber = firstHeart.className.split(" ")[1];
    let heart = document.querySelectorAll(".song")[path - parseInt(firstNumber)]
        .childNodes[1]
        .childNodes[1]
        .childNodes[1]
    // heart.classList.remove("fa");
    console.log("..." + heart.className)
    if (heart.className == "fa fa-heart") {
        heart.className = "fa fa-heart-o";
    } else {
        heart.className = "fa fa-heart";

    }

    console.log(heart)

}



function play(path) {
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
            arr[i].innerHTML = '<i class="fa fa-play" ></i>'
        }
    }
    console.log(document.getElementsByClassName(path)[2].innerHTML)
    if (document.getElementsByClassName(path)[2].innerHTML == '<i class="fa fa-pause"></i>') {
        playme.pause();
        playme.className = "hidden"
        document.getElementsByClassName(path)[2].innerHTML = '<i class="fa fa-play-circle"></i>'
    } else if (document.getElementsByClassName(path)[2].innerHTML === '<i class="fa fa-play-circle"></i>') {
        playme.play();
        playme.className = "visible"
        document.getElementsByClassName(path)[2].innerHTML = '<i class="fa fa-pause"></i>'
    } else {
        document.getElementsByClassName(path)[2].innerHTML = '<i class="fa fa-pause"></i>'
        let sourceFrom = document.getElementsByClassName(path)[1];
        document.getElementsByClassName(path)[0].style.backgroundColor = '#b1baf5';
        playme.className = "visible"
        playme.src = "../static/" + sourceFrom.innerHTML.substring(6);
        playme.play();
    }

}