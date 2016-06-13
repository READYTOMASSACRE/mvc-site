<?php
namespace app\controller;
use app\core;
use app\model;

class Controller_Main extends core\Controller
{
    function __construct()
    {
      $this->model = new model\Model_Main;
      $this->view = new core\View;
    }
    function action_index()
    {
      $data = $this->model->get_data();
      $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}
