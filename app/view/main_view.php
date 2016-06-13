  <div class="category-title">
    <h1>Популярные товары</h1>
  </div>
  <div class="material-block">
    <a href="/catalog/item/1" class="item">
      <img src="/assets/img/electric-guitar.png">
      Электро-гитара
    </a>
    <a href="/catalog/item/3" class="item">
      <img src="/assets/img/drum.png">
      Барабан
    </a>
    <a href="/catalog/item/4" class="item">
      <img src="/assets/img/bass-guitar.png">
      Басс гитара
    </a>
  </div>
  <div class="floatfix"></div>
  <div class="category-title">
    <h1>Список товаров</h1>
    <div class="category-sort">
      <div class="materials-amount"><?=count($data['catalog'])?> товар(а)</div>
      <?if($_SESSION['login']):?>
      <a style="float:right; font-size: 18px;" href="/catalog/add/">добавить товар +</a>
      <a style="float:right; font-size: 18px;" href="/item/add/">новый вид +&nbsp | &nbsp</a>
      <?endif?>
    </div>
  </div>
  <table class="category-list">
    <thead>
      <tr>
        <td class="thead_0">Артикул</td>
        <td class="">Название</td>
        <td class="">Тип</td>
        <td class="">Страна</td>
        <td class="">Брэнд</td>
        <td class="">Цена</td>
        <td class="">Количество</td>
        <td class="">Детальный просмотр</td>
      </tr>
    </thead>
    <tbody>
      <?foreach($data['catalog'] as $d):?>
      <tr>
        <td class=""><?=$d['article']?></td>
        <td class=""><?=$d['name']?></td>
        <td class=""><?=$d['category']?></td>
        <td class=""><?=$d['country']?></td>
        <td class=""><?=$d['brand']?></td>
        <td class=""><?=$d['price']?> ₽</td>
        <td class=""><?=$d['item_count']?></td>
        <td class=""><a href="/catalog/item/<?=$d['article']?>">Перейти</a></td>
      </tr>
      <?endforeach?>
    </tbody>
  </table>
