<h1>Добавление товара в каталог</h1> <br/>
<?if(!$_SESSION['login']):?>
<?='У вас нет прав на добавление товара'?>
<?else:?>
<form method="post" action="/catalog/add">
  <table>
  <tr>
    <td>
      <label for="catalog[fk_category]">Категория</label>
    </td>
    <td>
      <select style="width: 173px;" name="catalog[fk_category]">
        <?$i = 1;
        foreach($data['category'] as $c):?>
        <option value="<?=$i?>"><?=$c?></option>
        <?$i++?>
        <?endforeach?>
      </select>
    </td>
  </tr>

  <tr>
    <td>
      <label for="catalog[fk_item]">Вид товара</label>
    </td>
    <td>
      <select style="width: 173px;" name="catalog[fk_item]">
        <?$i = 1;
        foreach($data['item'] as $c):?>
        <option value="<?=$i?>"><?=$c["name"]?></option>
        <?$i++?>
        <?endforeach?>
      </select>
    </td>
  </tr>

  <tr>
    <td>
      <label for="catalog[fk_country]">Страна производитель</label>
    </td>
    <td>
      <select style="width: 173px;" name="catalog[fk_country]">
        <?$i = 1;
        foreach($data['country'] as $c):?>
        <option value="<?=$i?>"><?=$c?></option>
        <?$i++?>
        <?endforeach?>
      </select>
    </td>
  </tr>

  <tr><td><label for="catalog[brand]">Брэнд</label></td><td><input type="text" name="catalog[brand]" value></td></tr>
  <tr><td><label for="catalog[price]">Цена</label></td><td><input type="number" name="catalog[price]" value></td></tr>
  <tr><td><label for="catalog[item_count]">Количество</label></td><td><input type="number" name="catalog[item_count]" value></td></tr>
  <tr><td><label for="catalog[other]">Описание</label></td><td><textarea cols="22" rows="3" name="catalog[other]"></textarea></td></tr>
  <tr><td><input class="search-button" type="submit" value="Добавить"></td></tr>
</table>
</form>
<?endif?>
