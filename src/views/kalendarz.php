<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/kalendarz.css">
    <link rel="stylesheet" href="../../public/css/global.css">

    <title>Twoja Strona Treningowa</title>
</head>
<body>

<div class="top-bar">
    <button onclick="location.href='profil.php'">Twój profil</button>
    <button onclick="location.href='main'">Strona główna</button>
    <button>Pomoc</button>
</div>

<main>
    <section class="left-section">
        <h1>Tutaj możesz podzielić się swoim treningiem, a także informacją na kiedy go planujesz</h1>

        <!-- Formularz do dodawania treningu -->
        <form method="post" action="addTraining" class="training-form">
            <label for="date">Data treningu:</label>
            <input type="datetime-local" id="date" name="date" required>
            <label for="description">Opis treningu:</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit" class="submit-button">Dodaj trening</button>
        </form>

    </section>

</main>

</body>
</html>
