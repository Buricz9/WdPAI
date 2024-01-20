<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/logIn.css">
    <title>Zdjęcie jako tło</title>
</head>
<body>

<div class="right-side">
    <form class="login-form" action="login" method="POST">
        <div class="word" id="fitCheck">FitCheck</div>
        <a>
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </a>
        <input class="word input-field" placeholder="email" name="email" id="information" type="text">
        <input class="word input-field" placeholder="password" name="password" type="password">
        <button class="login-button"  type="submit">Log in</button>
    </form>
    <a onclick="location.href='registration'" class="registration">sign in</a>
    <div class="additional-links">
        <img class="facebook" src="https://c.animaapp.com/lnRjsIVN/img/facebook.svg" onclick="console.log('fb')"/>
        <img class="gmail-logo" src="https://c.animaapp.com/lnRjsIVN/img/gmail-logo@2x.png" onclick="console.log('gm')" />
    </div>
</div>

</body>
</html>
