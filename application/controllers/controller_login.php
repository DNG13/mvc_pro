<?php
class ControllerLogin extends Controller
{

    function index()
    {
        //$data["login_status"] = "";
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password =$_POST['password'];

            /*
            Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
            Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
            Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
            */
            if($login=="admin" && $password=="admin")
            {
                $data["login_status"] = "access_granted";

                session_start(); echo $_SESSION['admin'];
                $_SESSION['admin'] = $password;
                header('Location:/admin/');
            }
            else
            {
                $data["login_status"] = "access_denied";
            }
        }
        else
        {
            $data["login_status"] = "";
        }

        $this->view->generate('login_view.php', 'template_view.php', $data);
    }

}