<?php
class ControllerMain extends Controller
{
    function index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}