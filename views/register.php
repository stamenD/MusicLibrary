<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Music Library</title>
    <link rel="icon" href="./static/imgs/music.ico">
</head>
<link rel="stylesheet" type="text/css" href="../styles/registerStyle.css">
<link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">

<body>
    <div class="ver">
    <div class="container">
        <form action="../controllers/register.php" onsubmit="return validate()" method="POST">
            <p><strong>РЕГИСТРАЦИЯ</strong></p>
            <div><input maxlength="20" placeholder="  Потребителско име" type="text" name="nickname"></div>
            <div><input maxlength="20" placeholder="  Парола" type="text" name="passwordFirst"></div>
            <div><input maxlength="20" placeholder="  Повтори паролата" type="password" name="passwordSecond"></div>
            <div><button onclick="loadDoc()" id="submitButton" class="button " type="submit">Регистрация</button></div>
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
    const myParam = urlParams.get('info');
    if(myParam == "true"){
        let node = document.createElement("p");
        node.innerHTML = "Това потребителско име вече съществува."
        errors.appendChild(node)
    }   
</script>

</html>