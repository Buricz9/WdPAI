<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/TrainingRepository.php'; // Dodaj import

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function main()
    {
        $this->render('main');
    }
    public function sprzet()
    {
        $this->render('sprzet');
    }
    public function kalendarz()
    {
        $this->render('kalendarz');
    }
    public function oblozenie()
    {
        $this->render('oblozenie');
    }
    public function registration()
    {
        $this->render('registration');
    }
    public function cardio()
    {
        $this->render('cardio');
    }
    public function wolneCiezary()
    {
        $this->render('wolneCiezary');
    }
    public function maszyny()
    {
        $this->render('maszyny');
    }



    public function addTraining()
    {
        if ($this->isPost()) {
            $description = $_POST['description'];
            $date = $_POST['date'];

            // Sprawdzenie poprawności danych
            if (empty(trim($description)) || empty(trim($date))) {
                return $this->render('kalendarz', ['messages' => ['Please provide valid data']]);
            }

            // Dodanie treningu do bazy danych
            $trainingRepository = new TrainingRepository();

            // Użyj repozytorium, aby dodać trening do bazy danych
            $trainingRepository->addTraining($description, $date);

            // Po dodaniu treningu możesz przekierować użytkownika na stronę kalendarza
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/kalendarz");
        }
    }
}