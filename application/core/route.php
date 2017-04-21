<?php

class Route
{
    static function start()
    {
            $routes = explode('/', $_SERVER['REQUEST_URI']);

            // controller and default action
            // get controller name
            $controller_name = !empty($routes[1]) ? $routes[1] : 'Main';

            // get action name
            $action_name = !empty($routes[2]) ? $routes[2] : 'index';

            //ad prefix
            $model_name = $controller_name;
            $controller_class_name = 'Controller' . ucfirst($controller_name);
            $controller_name = 'controller_' . $controller_name;

            // includes and evaluates model if it exist
            $model_file = strtolower($model_name) . '.php';
            $model_path = "../application/models/" . $model_file;
            if (file_exists($model_path)) {
                require_once $model_path;
            }
            $flash = new Flash();
            $flash->setMessage('we', 'we are great');
            echo $flash->getMessage('we');

            // includes and evaluates controller
            $controller_file = strtolower($controller_name) . '.php';
            $controller_path = "../application/controllers/" . $controller_file;
            if (file_exists($controller_path)) {
                require_once $controller_path;
            } else {
                throw new NotFoundException();
            }

            // create controller
            $controller = new $controller_class_name;
            $action = $action_name;
            if (method_exists($controller, $action)) {
                //call controller action
                $controller->$action();
            } else {
                throw new NotFoundException();
            }
    }
}