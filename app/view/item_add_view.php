<h1>Добавление нового вида товара</h1>
<?if(!$_SESSION['login']):?>
<?='У вас нет прав на добавление товара'?>
<?else:?>
<form method="post" action="/item/add">
  <table>
  <tr><td><label for="item[name]">Имя товара</label></td><td><input type="text" name="item[name]" value></td></tr>
  <tr><td><label for="item[description]">Описание (100символов)</label></td><td><textarea cols="22" rows="3" name="item[description]" value></textarea></td></tr>

  <tr>
    <td>
      <label for="item[fk_category]">Категория товара</label>
    </td>
    <td>
      <select style="width: 173px;" name="item[fk_category]">
        <?$i = 1;
        foreach($data['category2'] as $c):?>
        <option value="<?=$i?>"><?=$c?></option>
        <?$i++?>
        <?endforeach?>
      </select>
    </td>
  </tr>

  <tr><td><label for="item[material]">Материал</label></td><td><input type="text" name="item[material]" value></td></tr>
  <tr><td><label for="item[size]">Размер</label></td><td><input type="text" name="item[size]" value></td></tr>
  <tr><td><input class="search-button" type="submit"></td></tr>
</table>
</form>
<?endif?>
