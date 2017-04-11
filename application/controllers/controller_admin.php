<?php
class ControllerAdmin extends Controller
{

    function index()
    {
        session_start();

        /*
        Для простоты, в нашем случае, проверяется равенство сессионной переменной admin прописанному
        в коде значению — паролю. Такое решение не правильно с точки зрения безопасности.
        Пароль должен храниться в базе данных в захешированном виде, но пока оставим как есть.
        */
        if ( $_SESSION['admin'] == "admin" )
        {
            $this->view->generate('admin_view.php', 'template_view.php');
        }
        else
        {
            session_destroy();
            throw new NotFoundException();
        }
    }

    // Действие для разлогинивания администратора
    function logout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }
}