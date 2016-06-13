<?php
namespace app\model;
use app\core;
class Model_Item extends core\Model
{
    public function get_data() {}

    public function add($data)
    {
      $sql = "
      INSERT INTO item
      SET
      name = :name,
      description = :description,
      fk_category = :fk_category,
      material = :material,
      size = :size;
      ";
      $values = array(
      'name' => $data['name'],
      'description' => $data['description'],
      'fk_category' => $data['fk_category'],
      'material' => $data['material'],
      'size' => $data['size'],
      );
      core\MySQL::query($sql, $values);
    }
}
