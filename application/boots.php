<?php
//for flash message
require_once 'core/session/session.php';
require_once 'core/session/flash.php';

//connect to errors
require_once 'errors/not_found_exception.php';
require_once 'errors/db_exception.php';

// connect to db
require_once 'core/db/db_connect.php';

// connect to core
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

//catch exception
try{
    Route::start();
}catch(Exception $e){
    $e->action();
}