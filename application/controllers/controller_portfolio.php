<?php
class ControllerPortfolio extends Controller
{
    function __construct()
    {
        $this->model = new Portfolio();
        parent::__construct();
    }

    function index()
    {
        $data = $this->model->get();
        $this->view->generate('portfolio_view.php', 'template_view.php', $data);
    }
}