<?php

require_once 'AppController.php';

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
}