<?php
namespace app\model;
use app\core;
class Model_User extends core\Model
{
    public function get_data($data)
    {
      return array(
        'success' => $this->check($data['u'], $data['p']),
      );
    }

    public function check($u, $p)
    {
      $sql = '
      SELECT username
      FROM users
      WHERE username = :u AND password = :p;
       ';
      $logging = core\MySQL::query($sql, array('u' => $u, 'p' => $p));
      $logging = count($logging) > 0 ? true : false;
      $_SESSION['login'] = $logging;
      return $logging;
    }
}
