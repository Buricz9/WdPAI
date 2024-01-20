<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/registration.css">
    <title>Registration</title>
</head>
<body>

<div class="registration-container">
    <h2>Registration</h2>
    <form>
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

        <button type="button" onclick="location.href='main'">Zarejestruj się</button>
    </form>
</div>

<script>
    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

</body>
</html>
