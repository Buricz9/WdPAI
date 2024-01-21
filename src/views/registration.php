<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/registration.css">
    <script type="text/javascript" src="../../public/js/registration.js" defer></script>
    <title>Registration</title>
</head>
<body>

<div class="registration-container">
    <h2>Registration</h2>
    <form class="registration" action="registration" method="POST">
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <input name="email" type="text" placeholder="email@email.com">
        <input name="password" type="password" placeholder="password">
        <input name="confirmedPassword" type="password" placeholder="confirm password">
        <input name="name" type="text" placeholder="name">
        <input name="surname" type="text" placeholder="surname">
        <button type="submit">registration</button>
    </form>
</div>
</body>
</html>
