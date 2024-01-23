<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Users" WHERE "email" = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."Users" (name, surname, email, password)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->name,
            $user->surname,
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }
    public function isEmailUnique($email)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT email FROM public."Users"
    ');

        $stmt->execute();

        $existingEmails = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Convert all emails to lowercase for case-insensitive comparison
        $lowercaseExistingEmails = array_map('strtolower', $existingEmails);
        $lowercaseEmail = strtolower($email);

        // Check if the provided email is unique
        return !in_array($lowercaseEmail, $lowercaseExistingEmails);
    }
    public function deleteUser(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM public."Users" WHERE "email" = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }


}
