<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/TrainingRepository.php'; // Dodaj import

class DefaultController extends AppController {

    private function checkIfLoggedIn()
    {
        // Sprawdzenie, czy użytkownik jest zalogowany (czy ciasteczko istnieje)
        if (!isset($_COOKIE['user_email'])) {
            // Przekierowanie użytkownika na stronę logowania (lub inną, jeśli to bardziej odpowiednie)
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit; // Zakończ proces, aby nie wykonywać dalszych działań
        }
    }
    public function index()
    {
        $this->checkIfLozggedIn();
        $this->render('login');
    }

    public function main()
    {
        $this->checkIfLoggedIn();
        $this->render('main');
    }
    public function sprzet()
    {
        $this->checkIfLoggedIn();
        $this->render('sprzet');
    }
    public function kalendarz()
    {
        $this->checkIfLoggedIn();
        $this->render('kalendarz');
    }
    public function oblozenie()
    {
        $this->checkIfLoggedIn();
        $this->render('oblozenie');
    }
    public function registration()
    {
        $this->checkIfLoggedIn();
        $this->render('registration');
    }
    public function cardio()
    {
        $this->checkIfLoggedIn();
        $this->render('cardio');
    }
    public function wolneCiezary()
    {
        $this->checkIfLoggedIn();
        $this->render('wolneCiezary');
    }
    public function maszyny()
    {
        $this->checkIfLoggedIn();
        $this->render('maszyny');
    }
    public function profil()
    {
        $this->checkIfLoggedIn();
        $this->render('profil');
    }


    public function addTraining()
    {
        $userEmail = $_COOKIE['user_email'] ?? null;

        $this->checkIfLoggedIn();
        if ($this->isPost()) {
            $description = $_POST['description'];
            $date = $_POST['date'];

            // Sprawdzenie poprawności danych
            if (empty(trim($description)) || empty(trim($date))) {
                return $this->render('kalendarz', ['messages' => ['Please provide valid data']]);
            }

            // Dodanie treningu do bazy danych
            // Add training with the user's email
            $description = $_POST['description'];
            $date = $_POST['date'];

            $trainingRepository = new TrainingRepository();
            $trainingRepository->addTraining($description, $date, $userEmail);

            // Redirect to the calendar page
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/kalendarz");
        }
    }
}