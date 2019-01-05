<!DOCTYPE html>
<html>
<?php include "templates/head.php";?>

<link rel="stylesheet" type="text/css" href="../styles/registerStyle.css">
<link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
<style type="text/css">

</style>
<body>
    <div class="ver">
    <div class="container">
        <form action="../controllers/login.php" onsubmit="return validate()" method="POST">
            <p><strong>ВХОД</strong></p>
            <div><input maxlength="20" placeholder="  Потребителско име" type="text" name="nickname"></div>
            <div><input maxlength="20" placeholder="  Парола" type="text" name="password"></div>
            <div><button onclick="loadDoc()" id="submitButton" class="button " type="submit">Вход</button></div>
        </form>
        <form action="../" method="GET">
            <div><button class="button " type="submit">Създай профил</button></div>
        </form>
    </div>
</div>

    <div id="errors">
    </div>
    <span id="demo">
    </span>
</body>
<script type="text/javascript" src="../js/register.js"></script>
<script type="text/javascript">
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('info');
    if(myParam == "true"){
        let node = document.createElement("p");
        node.innerHTML = "Грешно потребителско име или парола."
        errors.appendChild(node)
    }
</script>
</html>