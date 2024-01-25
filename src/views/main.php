<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/global.css">

    <title>Strona</title>
</head>
<body>

    <div class="top-bar">
        <button onclick="location.href='profil'">Twój profil</button>
        <button onclick="location.href='main'">Strona główna</button>
        <button onclick="location.href='pomoc'">Pomoc</button>
    </div>

    <div class="flex-container">
        <div onclick="location.href='sprzet'">
            <img src="src/images/gym2.png"  alt="Zdjęcie 2">
            <div class="caption">Dostępny sprzęt</div>
        </div>
        <div onclick="location.href='kalendarz'">
            <img src="src/images/gym3.png" alt="Zdjęcie 3">
            <div class="caption">Kalendarz</div>
        </div>    
        <div onclick="location.href='oblozenie'">
            <img src="src/images/gym1.png" alt="Zdjęcie 1">
            <div class="caption">Aktualne obłożenie</div>
        </div>
    </div>
</body>
</html>
