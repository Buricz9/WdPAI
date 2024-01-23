<?php
// TrainingController.php
// TrainingController.php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/TrainingRepository.php'; // Dodaj import

class TrainingController extends AppController {

    public function addTraining()
    {
        // Dodawanie treningu do bazy danych
        if ($this->isPost()) {
            $description = $_POST['description'];
            $date = $_POST['date'];

            // Sprawdzenie poprawności danych
            if (empty(trim($description)) || empty(trim($date))) {
                return $this->render('kalendarz', ['messages' => ['Please provide valid data']]);
            }

            // Dodanie treningu do bazy danych
            $trainingRepository = new TrainingRepository();
            $trainingRepository->addTraining($description, $date);

            // Przekierowanie użytkownika na stronę kalendarza
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/kalendarz");
        }
    }

    // Dodaj inne metody związane z treningami, jeśli są potrzebne
}
