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
}
