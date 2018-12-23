let button = document.getElementById("submitButton");
let errors = document.getElementById("errors");

function validate() {
    while (errors.firstChild) {
        errors.removeChild(errors.firstChild);
    }
    let nickname = document.getElementsByName("nickname")[0]
    let passwordFirst = document.getElementsByName("passwordFirst")[0]
    let passwordSecond = document.getElementsByName("passwordSecond")[0]
    if (nickname.value.length < 3 || nickname.value.length > 10) {
        let node = document.createElement("p");
        node.innerHTML = "Потребителското име трябва да е поне 3 символа и най-много 10."
        errors.appendChild(node)
        return false;
    }
    if (nickname.value.search(/\W/) != -1) {
        let node = document.createElement("p");
        node.innerHTML = "Потребителското име трябва да се състои от букви, цифри и _."
        errors.appendChild(node)
        return false;
    }
    if (passwordFirst.value.length < 6) {
        let node = document.createElement("p");
        node.innerHTML = "Паролата трябва да се състои поне от 6 символа."
        errors.appendChild(node)
        return false;
    }
    if (!(passwordFirst.value.search(/[A-Z]/) >= 0 &&
            passwordFirst.value.search(/[a-z]/) >= 0 &&
            passwordFirst.value.search(/[0-9]/) >= 0)) {
        let node = document.createElement("p");
        node.innerHTML = "Паролата трябва да има поне 1 главна, 1 малка буква и 1 цифра."
        errors.appendChild(node)
        return false;
    }

    if (passwordFirst.value != passwordSecond.value) {
        let node = document.createElement("p");
        node.innerHTML = "Парола втори път - трябва да съвпадат."
        errors.appendChild(node)
        return false;
    }
    if (errors.firstChild)
        return false;



    return true;
}


function loadDoc() {
    console.log("clicked!");
    let nickname = document.getElementsByName("nickname")[0]
    let passwordFirst = document.getElementsByName("passwordFirst")[0]
    let passwordSecond = document.getElementsByName("passwordSecond")[0]
    let info = {}
    info.nickname = nickname.value
    info.passwordFirst = passwordFirst.value
    info.passwordSecond = passwordSecond.value
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "server/register.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(JSON.stringify(info));
}