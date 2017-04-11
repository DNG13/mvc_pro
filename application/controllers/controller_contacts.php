<?php
class ControllerContacts extends Controller
{

    function index()
    {
        $this->view->generate('contacts_view.php', 'template_view.php');
    }
}