<?php
namespace app\model;
use app\core;
class Model_Catalog extends core\Model
{
    public function get_data($params)
    {
      return array(
        'menu' => array(
          'main' => 'Главная',
          'catalog' => 'Каталог',
          'about' => 'О сайте'
        ),
        'category' => $this->get_category(),
        'item' => $params['detail'] ? $this->item($params['detail'])[0] : $this->get_items(),
        'country' => $this->get_country(),
      );
    }

    public function add($data)
    {
      $sql = "
      INSERT INTO assortiment
      SET
      fk_item = :fk_item,
      fk_country = :fk_country,
      brand = :brand,
      item_count = :item_count,
      price = :price,
      other = :other,
      uptime = :uptime;
      ";
      $values = array(
      ':fk_item' => $data['fk_item'],
      ':fk_country' => $data['fk_country'],
      ':brand' => $data['brand'],
      ':item_count' => $data['item_count'],
      ':price' => $data['price'],
      ':uptime' => time(),
      ':other' => $data['other'],
      );
      core\MySQL::query($sql, $values);
    }

    public function edit($ID, $data)
    {
      $sql = "
      UPDATE assortiment
      SET
      fk_country = :fk_country,
      brand = :brand,
      item_count = :item_count,
      price = :price,
      other = :other
      WHERE
      ID = :ID;
      ";
      $vars = array(
        'ID' => $ID ,
        'fk_country' => $data['fk_country'],
        'brand' => $data['brand'],
        'item_count' => $data['item_count'],
        'price' => $data['price'],
        'other' => $data['other'],
      );
      return core\MySQL::query($sql, $vars);
    }

    public function delete($id = 0)
    {
      if ($id < 1) return false;
      $sql = "
      DELETE FROM assortiment WHERE ID = :id
      ";
      return core\MySQL::query($sql, array("id" => $id));
    }
    public function get_category()
    {
      $sql = 'SELECT name FROM category';
      return core\MySQL::query($sql, array(), \PDO::FETCH_COLUMN);
    }

    public function get_items($id = null)
    {
      $vars = null;
      if ($id && $id != 1) {
        $sql = 'SELECT ID, fk_category, name FROM item WHERE fk_category = :fid';
        $vars = array(':fid' => $id);
      } else {
        $sql = 'SELECT fk_category, name FROM item';
      }
      return core\MySQL::query($sql, $vars);
    }

    public function get_catalog()
    {
      $sql = 'SELECT * FROM assortiment';
      return core\MySQL::query($sql, array(), \PDO::FETCH_COLUMN);
    }

    public function get_country()
    {
      $sql = 'SELECT name FROM country';
      return core\MySQL::query($sql, array(), \PDO::FETCH_COLUMN);
    }

    public function item($id = 0)
    {
      $sql = "
      SELECT
        a.ID as article, a.brand as brand, a.item_count as item_count,
        a.price as price, a.other as other,
        i.name as name, i.description as description, i.material as material,
        i.size as size,
        c.name as category,
        co.name as country
      FROM
        assortiment a
      LEFT OUTER JOIN item i ON a.fk_item = i.ID
      INNER JOIN category c ON i.fk_category = c.ID
      INNER JOIN country co ON a.fk_country = co.ID
      WHERE
        a.ID = :fk_item;
      ";
      return core\MySQL::query($sql, array("fk_item" => $id));
    }
}
