<div class="category-title">
    <h1>Карточка детального описания</h1>
    <?if($_SESSION['login']):?>
    <a style="float:right; font-size: 18px;" href="/catalog/delete/<?=$data['item']['article']?>">удалить</a>
    <a style="float:right; font-size: 18px;" href="/catalog/item/<?=$data['item']['article']?>">< назад&nbsp | &nbsp</a>
    <?endif?>
  </div>
<?if(!$_SESSION['login']):?>
У вас нет прав для редактирования товара.
<?else:?>

  <table class="category-list">
    <tbody>
      <tr>
        <td width="252" class="left-column" style="vertical-align:top;">
          <!-- <img width="128" height="128" src='img/electric-guitar.png'> -->
          <h2><?=$data['item']['name']?></h2>
          <!-- <h3>Артикул: <?=$data['item']['article']?></h3> -->
        </td>
        <td class="right-column">
            <div class="detail-description">
            <h2 style="text-align: justify;">Описание товара</h2>
            <p style="margin: 0; text-align: justify;">
              <?=$data['item']['description']?>
          </p></div>
        </td>
      </tr>
  </table>
  <h2 style="text-align: justify;">Характеристика товара</h2>
    <form action="/catalog/edit/<?=$data['item']['article']?>" method="post">
      <table class="category-list">
      <thead>
        <tr>
          <td class="thead_0"></td>
          <td class="">Опция</td>
          <td class="">Описание</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class=""></td>
          <td class="">Артикул</td>
          <td class=""><?=$data['item']['article']?></td>
        </tr>
        <tr>
          <td class=""></td>
          <td class="">Страна производитель</td>
          <td class="">
            <select name="catalog[fk_country]">
              <?foreach($data['country'] as $d):?>
              <?$i++?>
              <option value="<?=$i?>" <?=$d==$data['item']['country']?'selected':''?>><?=$d?></option>
              <?endforeach;$i=0;?>
            </select>
        </tr>

          <tr>
            <td class=""></td>
            <td class="">Категория</td>
            <td class=""><?=$data['item']['category']?></td>
          </tr>

          <tr>
            <td class=""></td>
            <td class="">Брэнд</td>
            <td class=""><input name="catalog[brand]" type="text" value="<?=$data['item']['brand']?>"></td>
          </tr>


            <tr>
              <td class=""></td>
              <td class="">Материал</td>
              <td class=""><?=$data['item']['material']?></td>
            </tr>

              <tr>
                <td class=""></td>
                <td class="">Размер</td>
                <td class=""><?=$data['item']['size']?></td>
              </tr>


              <tr>
               <td class=""></td>
               <td class="">Цена</td>
               <td class=""><input name="catalog[price]" type="number" value="<?=$data['item']['price']?>"></td>
              </tr>


              <tr>
                <td class=""></td>
                <td class="">Количество</td>
                <td class=""><input name="catalog[item_count]" type="number" value="<?=$data['item']['item_count']?>"></td>
              </tr>

            <tr>
              <td class=""></td>
              <td class="">Описание</td>
              <td class=""><textarea name="catalog[other]"><?=$data['item']['other']?></textarea></td>
            </tr>
      </tbody>
    </table>
    <input type="submit" value="Сохранить">
  </form>
<?endif?>
