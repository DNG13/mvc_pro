<?php
class Session{

    private static $instance;

    private function __construct()
    {
        session_start();
    }

    static public function getSession()
    {
        if(empty(self::$instance))
            self::$instance = new self;
        return self::$instance;
    }
    static public function destroy()
    {
        if(!empty(self::$instance)){
            unset(self::$instance);
            session_unset();
            session_destroy();
        }
    }

    public function setValue($key, $message){
        $_SESSION[$key] = $message;
    }

    public function getValue($key){
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public function deleteValue($key){
        if(!empty($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public function existsValue($key){
        return !empty($_SESSION[$key]);
    }

    //for debug only
    public function display(){
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    }
}