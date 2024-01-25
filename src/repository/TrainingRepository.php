<?php

require_once 'Repository.php';

class TrainingRepository extends Repository
{
    public function addTraining(string $description, string $date, string $userEmail)
    {
        try {
            $conn = $this->database->connect();

            // Insert the training and get its ID
            $stmt = $conn->prepare('
            INSERT INTO public."Trainings" (description, time)
            VALUES (?, ?) RETURNING id
        ');

            $stmt->execute([$description, $date]);
            $trainingId = $stmt->fetchColumn();

            // Associate the training with the user
            $stmt = $conn->prepare('
            INSERT INTO public."User_trainings" (id_user, id_training)
            VALUES ((SELECT id FROM public."Users" WHERE email = ?), ?)
        ');

            $stmt->execute([$userEmail, $trainingId]);
        } catch (PDOException $e) {
            // Handle the error
            echo 'Error: ' . $e->getMessage();
        }
    }

//    public function getUserTrainings(string $userEmail)
//    {
//        try {
//            $conn = $this->database->connect();
//            $stmt = $conn->prepare('
//                SELECT t.*
//                FROM public."Trainings" t
//                JOIN public."User_trainings" ut ON t.id = ut.id_training
//                JOIN public."Users" u ON ut.id_user = u.id
//                WHERE u.email = ?
//            ');
//
//            $stmt->execute([$userEmail]);
//
//            return $stmt->fetchAll(PDO::FETCH_ASSOC);
//        } catch (PDOException $e) {
//            // Handle the error
//            echo 'Error: ' . $e->getMessage();
//        }
//    }

    public function getUserTrainings(string $userEmail)
    {
        try {
            $conn = $this->database->connect();
            $stmt = $conn->prepare('
            SELECT t.*
            FROM public."Trainings" t
            JOIN public."User_trainings" ut ON t.id = ut.id_training
            JOIN public."Users" u ON ut.id_user = u.id
            WHERE u.email = ?
            ORDER BY t.time::timestamp DESC
        ');

            $stmt->execute([$userEmail]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the error
            echo 'Error: ' . $e->getMessage();
        }
    }


}