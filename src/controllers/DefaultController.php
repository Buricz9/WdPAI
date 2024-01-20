<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function log()
    {
        $this->render('log');
    }

    public function main()
    {
        $this->render('main');
    }

}