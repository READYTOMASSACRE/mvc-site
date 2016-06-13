<?php
namespace app\core;

class Route
{
  public static function say()
  {
    return 'hello';
  }
  static function start()
  {
    $controllerName = 'Main';
    $actionName = 'index';

    $routes = explode('/', $_SERVER['REQUEST_URI']);
    if (!empty($routes[1]))
      $controllerName = $routes[1];

    if (!empty($routes[2]) && !is_numeric($routes[2])) {
      $actionName = $routes[2];
    } else {
      $actionParam = $routes[2];
    }
    if (!empty($routes[3]) && !$actionParam)
      $actionParam = $routes[3];
    if (strtolower($routes[1]) == 'index')
      $controllerName = 'Main';

    $modelName = 'app\model\Model_'.$controllerName;
    $controllerName = 'app\controller\Controller_'.$controllerName;
    $actionName = 'action_'.$actionName;


    if (class_exists($controllerName)) {
      $controller = new $controllerName;
      $action = $actionName;
    }
    if (method_exists($controller, $action))
      $controller->$action($actionParam);
    else {
      Route::ErrorPage404();
    }

  }

  static function ErrorPage404()
  {
    $host = 'http://'.$_SERVER['HTTP_HOST'].'/404';
    header('Location:'.$host);
  }
}
