<!DOCTYPE html>
<html>
<?php include "templates/head.php";?>

<link rel="stylesheet" type="text/css" href="../styles/registerStyle.css">
<link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">

<body>
    <div class="ver">
    <div class="container">
        <form action="../controllers/register.php" onsubmit="return validate()" method="POST">
            <p><strong>РЕГИСТРАЦИЯ</strong></p>
            <div><input required maxlength="10" placeholder="  Потребителско име" type="text" name="nickname"></div>
            <div><input required maxlength="10" placeholder="  Парола" type="password" name="passwordFirst"></div>
            <div><input required maxlength="10" placeholder="  Повтори паролата" type="password" name="passwordSecond"></div>
            <div><button id="submitButton" class="button " type="submit">Регистрация</button></div>
        </form>
      	<form action="../views/login.php"  method="GET">
            <div><button class="button " type="submit">Влез със съществуващ профил</button></div>
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
    const myParam = urlParams.get('failed');
    if(myParam == "true"){
        let node = document.createElement("p");
        node.innerHTML = "Това потребителско име вече съществува."
        errors.appendChild(node)
    }
</script>

</html>