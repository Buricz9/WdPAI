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
        <button >Twój profil</button>
        <button onclick="location.href='main'">Strona główna</button>
        <button>Pomoc</button>
    </div>

  <main>
    <section class="left-section">
      <h1>Tutaj możesz podzielić się swoim treningiem, a także informacją na kiedy go planujesz</h1>
      <button>Treningi publiczne</button>
      <button>Treningi prywatne</button>
    </section>

    <section class="right-section">
      <div id="calendar">
        <!-- Kalendarz zostanie wstawiony dynamicznie za pomocą JavaScript -->
      </div>
    </section>
  </main>


</body>
</html>
