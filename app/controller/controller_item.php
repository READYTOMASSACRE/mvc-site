<?php
namespace app\controller;
use app\core;
use app\model;

class Controller_Item extends core\Controller
{
  public $item;

  function __construct()
  {
    $this->model = new model\Model_Main;
    $this->item = new model\Model_Item;
    $this->view = new core\View;
  }

  function action_index()
  {
    $data = $this->model->get_data();
    $this->view->generate('item_view.php', 'template_view.php', $data);
  }

  function action_add()
  {
    if(!empty($_POST['item'])) {
      $this->item->add($_POST['item']);
    }
    $data = $this->model->get_data();
    $this->view->generate('item_add_view.php', 'template_view.php', $data);
  }
}
