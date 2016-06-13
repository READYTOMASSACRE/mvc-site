<?php
namespace app\controller;
use app\core;
use app\model;

class Controller_Catalog extends core\Controller
{
  public $catalog;

  function __construct()
  {
    $this->model = new model\Model_Main;
    $this->catalog = new model\Model_Catalog;
    $this->view = new core\View;
  }

  function action_index($id = 0)
  {
    $data = $this->model->get_data(array('category' => $id));
    $this->view->generate('catalog_view.php', 'template_view.php', $data);
  }

  function action_add()
  {
    if(!empty($_POST['catalog'])) {
      $this->catalog->add($_POST['catalog']);
    }
    $data = array_merge($this->model->get_data(), $this->catalog->get_data());
    $this->view->generate('catalog_add_view.php', 'template_view.php', $data);
  }

  function action_all()
  {
    $this->action_index();
  }

  function action_get_items()
  {
    $data = null;
    if(!empty($_POST['id'])) {
      $data = $this->catalog->get_items($_POST['id']);
    }
    echo json_encode($data);
    exit;
  }

  function action_item($id = 0)
  {
    $data = $this->catalog->get_data(array('detail' => $id));
    $this->view->generate('catalog_item_view.php', 'template_view.php', $data);
  }

  function action_edit($id = 0)
  {
    if(!empty($_POST['catalog'])) {
      $this->catalog->edit($id, $_POST['catalog']);
      $this->action_item($id);
    } else {
    $data = $this->catalog->get_data(array('detail' => $id));
    $this->view->generate('catalog_edit_view.php', 'template_view.php', $data);
    }
  }

  function action_delete($id = 0)
  {
    if(!$_SESSION['login']) return false;
    $this->catalog->delete($id);
    $this->action_index();
  }
}
