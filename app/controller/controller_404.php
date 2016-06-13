<?php
namespace app\controller;
use app\core;
use app\model;

class Controller_404 extends core\Controller
{
    function __construct()
    {
      $this->model = new model\Model_Main;
      $this->view = new core\View;
    }
    function action_index()
    {
      $data = $this->model->get_data();
      $this->view->generate('404_view.php', 'template_view.php', $data);
    }
}
