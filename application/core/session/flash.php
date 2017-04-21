<?php

class Flash{

    public $message;

    private $session;

    public function __construct()
    {
        $this->session = Session::getSession();
    }

    public function setMessage($key, $message){
        $this->session->setValue($key, $message);

    }

    public function getMessage($key){
        return $this->session->getValue($key);
    }
}