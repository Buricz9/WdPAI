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

    <form id="registrationForm"> <!-- Added id to the form -->
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Adres email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Hasło:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" onclick="togglePasswordVisibility('password')">&#x1F441;</span>
        </div>

        <label for="confirm-password">Potwierdź hasło:</label>
        <div class="password-container">
            <input type="password" id="confirm-password" name="confirm-password" required>
            <span class="toggle-password" onclick="togglePasswordVisibility('confirm-password')">&#x1F441;</span>
        </div>

        <button type="submit">Zarejestruj się</button> <!-- Changed type to submit -->
    </form>
</div>
</body>
</html>
