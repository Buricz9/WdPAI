<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/sprzet.css">
    <title>Strona</title>
</head>
<body>

    <div class="top-bar">
        <button >Twój profil</button>
        <button onclick="location.href='main'">Strona główna</button>
        <button>Pomoc</button>
    </div>

    <div class="flex-container">
        <div  onclick="location.href='cardio'">
            <img src="src/images/bieg.png" alt="Zdjęcie 2">
            <div class="caption">Strefa cardio</div>
        </div>
        <div onclick="location.href='wolneCiezary'">
            <img src="src/images/wolne.png" alt="Zdjęcie 3">
            <div class="caption">Wolne ciężary</div>
        </div>    
        <div onclick="location.href='maszyny'">
            <img src="src/images/maszyny.png" alt="Zdjęcie 1">
            <div class="caption">Strefa maszyn</div>
        </div>  
        <div>
            <img src="src/images/ludzie.png" alt="Zdjęcie 4">
        </div>
    </div>
</body>
</html>
