<?php
namespace app\controller;
use app\core;
use app\model;

class Controller_User extends core\Controller
{
    public $user;

    function __construct()
    {
      $this->model = new model\Model_Main;
      $this->user = new model\Model_User;
      $this->view = new core\View;
    }

    function action_index()
    {
      $data = $this->model->get_data();
      $this->view->generate('template_view.php', 'main_view.php', $data);
    }
    function action_login()
    {
      if ($_POST['u']) {
        echo json_encode($this->user->get_data($_POST));
        exit;
      }
      if($_SESSION['login']) $_SESSION['login'] = false;
      $this->view->generate('', 'login_view.php', $data);
    }
}
