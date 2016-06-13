<div class="category-title">
    <h1>Карточка детального описания</h1>
    <?if($_SESSION['login']):?>
    <a style="float:right; font-size: 18px;" href="/catalog/delete/<?=$data['item']['article']?>">удалить</a>
    <a style="float:right; font-size: 18px;" href="/catalog/edit/<?=$data['item']['article']?>">изменить&nbsp | &nbsp</a>
    <?endif?>
  </div>
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
          <td class=""><?=$data['item']['country']?></td>
        </tr>

          <tr>
            <td class=""></td>
            <td class="">Категория</td>
            <td class=""><?=$data['item']['category']?></td>
          </tr>

          <tr>
            <td class=""></td>
            <td class="">Брэнд</td>
            <td class=""><?=$data['item']['brand']?></td>
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
                  <td class=""><?=$data['item']['price']?></td>
                </tr>


             <tr>
               <td class=""></td>
               <td class="">Количество</td>
               <td class=""><?=$data['item']['item_count']?></td>
             </tr>

            <tr>
              <td class=""></td>
              <td class="">Описание</td>
              <td class=""><?=$data['item']['other']?></td>
            </tr>

      </tbody>
    </table>
