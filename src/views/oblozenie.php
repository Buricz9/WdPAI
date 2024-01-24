<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... inne tagi head ... -->
    <link rel="stylesheet" href="../../public/css/oblozenie.css">
    <link rel="stylesheet" href="../../public/css/global.css">
    <script type="text/javascript" src="../../public/js/oblozenie.js" defer></script>

    <title>Obłożenie</title>
</head>
<body>
<div class="top-bar">
    <button onclick="location.href='profil'">Twój profil</button>
    <button onclick="location.href='main'">Strona główna</button>
    <button onclick="location.href='pomoc'">Pomoc</button>
</div>
<div id="container">
    <header>
        Wykres liczby użytkowników na Siłowni (Ostatnie Kilka Godzin)
    </header>
    <section>
        <canvas id="myChart" width="400" height="200"></canvas>
    </section>
</div>

<script src="script.js"></script>
</body>
</html>
