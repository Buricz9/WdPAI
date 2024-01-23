<?php

require 'Router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);
Router::get('', 'DefaultController');
Router::get('main', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('sprzet', 'DefaultController');
Router::get('kalendarz', 'DefaultController');
Router::get('oblozenie', 'DefaultController');
//Router::get('registration', 'DefaultController');
Router::post('registration', 'SecurityController');
Router::get('cardio', 'DefaultController');
Router::get('wolneCiezary', 'DefaultController');
Router::get('maszyny', 'DefaultController');
Router::post('addTraining', 'DefaultController'); // Dodaj tę linię

Router::run($path);