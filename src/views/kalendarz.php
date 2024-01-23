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
    <button onclick="location.href='profil'">Twój profil</button>
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
            <textarea class="resizeable-textarea" id="description" name="description" required></textarea>
<!--            <div class="editable-description" contenteditable name="description" required></div>-->

            <button type="submit" class="submit-button">Dodaj trening</button>
        </form>
        <!-- Display user's trainings -->
        <h2>Twoje treningi:</h2>
        <ul>
            <?php
            $userEmail = $_COOKIE['user_email'] ?? null;

            if ($userEmail) {
                $trainingRepository = new TrainingRepository();
                $userTrainings = $trainingRepository->getUserTrainings($userEmail);

                foreach ($userTrainings as $training) {
                    echo '<li>';
                    echo '<strong>Data treningu:</strong> ' . $training['time'] . '<br>';
                    echo '<strong>Opis treningu:</strong> ' . $training['description'];
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </section>


</main>

</body>
</html>
