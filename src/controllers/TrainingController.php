<?php
// TrainingController.php
// TrainingController.php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/TrainingRepository.php'; // Dodaj import

class TrainingController extends AppController {

    public function addTraining()
    {
        $userEmail = $_COOKIE['user_email'] ?? null;
        // Dodawanie treningu do bazy danych
        if ($this->isPost()) {
            $description = $_POST['description'];
            $date = $_POST['date'];

            // Sprawdzenie poprawności danych
            if (empty(trim($description)) || empty(trim($date))) {
                return $this->render('kalendarz', ['messages' => ['Please provide valid data']]);
            }

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

    // Dodaj inne metody związane z treningami, jeśli są potrzebne
}
