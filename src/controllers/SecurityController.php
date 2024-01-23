<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function logout()
    {
        // Usunięcie ciasteczka sesji
        setcookie('user_email', '', time() - 3600, '/');

        // Przekierowanie użytkownika na stronę logowania (lub inną po wylogowaniu)
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        setcookie('user_email', $user->getEmail(), time()+3600, '/');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/main");
    }

    public function registration()
    {
        if (!$this->isPost()) {
            return $this->render('registration');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        // Check email uniqueness
        $userRepository = new UserRepository();
        if ($userRepository->isEmailUnique($email)) {
            // Perform other checks if email is unique
            if (
                !filter_var($email, FILTER_VALIDATE_EMAIL) ||
                strlen($password) < 8 ||
                $password !== $confirmedPassword ||
                empty(trim($name)) ||
                empty(trim($surname))
            ) {
                return $this->render('registration', ['messages' => ['Please provide valid data']]);
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $user = new User($email, $hashedPassword, $name, $surname);

            $this->userRepository->addUser($user);

            return $this->render('login', ['messages' => ['You\'ve been successfully registered!']]);
        } else {
            return $this->render('registration', ['messages' => ['Email address is already in use.']]);
        }
    }
}