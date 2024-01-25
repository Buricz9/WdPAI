<!-- profil.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... inne tagi head ... -->
    <link rel="stylesheet" href="../../public/css/profil.css">
    <link rel="stylesheet" href="../../public/css/global.css">
    <title>Twój Profil</title>
</head>
<body>
<div class="top-bar">
    <button onclick="location.href='profil'">Twój profil</button>
    <button onclick="location.href='main'">Strona główna</button>
    <button onclick="location.href='pomoc'">Pomoc</button>
</div>

<div class="profile-container">
    <h1>Witaj na swojej stronie profilowej!</h1>
    <p>Tutaj znajdziesz informacje o swoim profilu treningowym.</p>
    <p>Zalogowany użytkownik: <?= $_COOKIE['user_email'] ?></p>
    <a href="logout">Wyloguj</a> <!-- Link do wylogowania -->

    <?php
    // Sprawdzenie, czy użytkownik jest zalogowany (czy ciasteczko istnieje)
    if (isset($_COOKIE['user_email']) && $_COOKIE['user_email'] === 'admin@admin.pl'): ?>
        <br>

        <!-- Formularz do usuwania użytkowników -->
        <form method="post" action="delete_user">
            Usuń użytkownika o emailu: <input type="text" name="user_email" required>
            <input type="submit" value="Usuń">
        </form>
    <?php else: ?>
        <p>Nie jesteś zalogowany jako administrator.</p>
    <?php endif; ?>
</div>

</body>
</html>
