<?php
namespace app\model;
use app\core;
class Model_Main extends core\Model
{
    public function get_data($params)
    {
      /*demo install*/
      //core\MySQL::dropDB();
      //core\MySQL::installDB();
      //core\MySQL::fillCategory();
      //core\MySQL::fillCountry();
      //core\MySQL::fillItem();
      return array(
        'menu' => array(
          'main' => 'Главная',
          'catalog' => 'Каталог',
          'about' => 'О сайте'
        ),
        'category' => $this->get_category(),
        'category2' => $this->get_category(),
        'catalog' => $params['category'] ? $this->get_assortiment($params['category']) : $this->get_assortiment(),
      );
    }

    public function get_category()
    {
      $sql = 'SELECT name FROM category';
      return core\MySQL::query($sql, array(), \PDO::FETCH_COLUMN);
    }

    public function get_country()
    {
      $sql = 'SELECT name FROM country';
      return core\MySQL::query($sql, array(), \PDO::FETCH_COLUMN);
    }

    public function get_item()
    {
      $sql = 'SELECT name FROM item';
      return core\MySQL::query($sql, array(), \PDO::FETCH_COLUMN);
    }
    public function get_assortiment($id = null)
    {
      if ($id) {
        $sql = "
        SELECT
          a.ID as article, a.brand as brand, a.item_count as item_count,
          a.price as price, a.other as other, i.name as name,
          c.name as category, co.name as country
        FROM
          assortiment a
        INNER JOIN item i ON a.fk_item = i.ID
        INNER JOIN category c ON i.fk_category = c.ID
        INNER JOIN country co ON a.fk_country = co.ID
        WHERE c.ID = :id;
        ";
        return core\MySQL::query($sql, array("id" => $id));
      }
      $sql = "
      SELECT
        a.ID as article, a.brand as brand, a.item_count as item_count,
        a.price as price, a.other as other, i.name as name,
        c.name as category, co.name as country
      FROM
        assortiment a
      INNER JOIN item i ON a.fk_item = i.ID
      INNER JOIN category c ON i.fk_category = c.ID
      INNER JOIN country co ON a.fk_country = co.ID;
      ";
      return core\MySQL::query($sql);
    }
}
