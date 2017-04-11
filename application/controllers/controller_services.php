<?php
class ControllerServices extends Controller
{
    function index()
    {
        $this->view->generate('services_view.php', 'template_view.php');
    }
}