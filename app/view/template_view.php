<!DOCTYPE html>
<html>
<head>
<meta name="description" value="Musis info site">
<meta charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Lobster|Cuprum:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/assets/css/style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<title>Музыкально-информационный портал</title>
</head>
<body>
  <div class="header">
    <div class="centered floatfix">
      <div style="float:left; display:inline;">
        <a href="/main" class="logo">
          <span class="logo">ИНФОРМАЦИОННО-МУЗЫКАЛЬНЫЙ СПРАВОЧНИК</span>
        </a>
      </div>
      <div class="search-form">
        <input class="search-button" type="submit" name="login" value="<?=$_SESSION['login']?'Выход':'Вход'?>">
      </div>
    </div>
  </div>
  <div class="menu">
    <div class="centered">
      <ul class="inline-block">
				<?foreach($data['menu'] as $a => $m):?>
        <? $url = explode('/', $_SERVER['REQUEST_URI']);?>
					<li <?=($url[1] == $a ? 'class="space"' : '')?>><a href="/<?=$a?>"><?=$m?></a></li>
				<?endforeach?>
      </ul>
    </div>
  </div>
  <div class="wrapper">
  <div class="main">
    <div class="content-wrapper">
      <div class="content">
	<?php include 'app/view/'.$content; ?>
      </div>
    </div>
<div class="sidebar">
  <div class="sidebar-title"><span>Категории</span></div>
  <ul>
		<?
      $i = 0;
      foreach($data['category'] as $c):
      $i++?>
		  <li><a href='/catalog/<?=($i == 1 ? 'all' : $i)?>'><?=$c?></a></li>
		<?endforeach?>
  </ul>
</div>
</div>
<div class="floatfix"></div>
</div>
<div class="footer centered">

  <span class="copyrights">дезигн / марка © 2016 Информационно-музыкальный справочник;</span>
  <span class="navigation">
    <ul>
			<?foreach($data['menu'] as $a => $m):?>
				<li><a href = '/<?=$a?>'><?=$m?></a></li>
			<?endforeach?>
    </ul>
  </span>
</div>

</body>
<script src="/assets/js/script.js"></script>
</html>
