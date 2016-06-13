<?
namespace app\core;

class MySQL
{
  private static $con;

  public static function connect()
  {
      $user = '';
      $pass = '';
      self::$con = new \PDO('mysql:host=localhost;dbname=name', $user, $pass);
  }

  /**
   * Example insert query: SELECT * FROM T WHERE A = :A
   * insert($sql, array('A' => $A))
   */
  public static function query($sql, $vars = array(), $pdostate = null)
  {
    if(!self::$con) self::connect();
    header('Content-Type: text/html; charset=utf-8');
    // die('<pre>' . $sql . '</pre>');
    $result = self::$con->prepare($sql);
    $result->execute($vars);
    return $result->fetchAll($pdostate);
  }
  public static function installDB()
  {
    if(!self::$con) self::connect();
    if(!self::$con) return false;
    $query = "
    CREATE TABLE IF NOT EXISTS users
    (
      ID INT(11) NOT NULL AUTO_INCREMENT,
      username VARCHAR(100) NOT NULL DEFAULT '',
      password VARCHAR(100) NOT NULL DEFAULT '',
      regdate TIMESTAMP NOT NULL,
      PRIMARY KEY (ID)
    );
    CREATE TABLE IF NOT EXISTS category
    (
      ID INT(11) NOT NULL AUTO_INCREMENT,
      name VARCHAR(100) NOT NULL DEFAULT '',
      PRIMARY KEY (ID)
    );
    CREATE TABLE IF NOT EXISTS item
    (
      ID INT(11) NOT NULL AUTO_INCREMENT,
      name VARCHAR(100) NOT NULL DEFAULT '',
      description VARCHAR(400) NOT NULL DEFAULT '',
      fk_category INT(11) NOT NULL DEFAULT 0,
      material VARCHAR(100) NOT NULL,
      size VARCHAR(100) NOT NULL,
      PRIMARY KEY (ID)
    );
    CREATE TABLE IF NOT EXISTS country
    (
      ID INT(11) NOT NULL AUTO_INCREMENT,
      name VARCHAR(100) NOT NULL DEFAULT '',
      PRIMARY KEY(ID)
    );
    CREATE TABLE IF NOT EXISTS assortiment
    (
      ID INT(11) NOT NULL AUTO_INCREMENT,
      fk_item INT(11) NOT NULL DEFAULT 0,
      fk_country INT(11) NOT NULL DEFAULT 0,
      brand VARCHAR(100) NOT NULL DEFAULT '',
      item_count INT(11) NOT NULL,
      price INT(11) NOT NULL,
      uptime INT(11) NOT NULL,
      other VARCHAR(400) DEFAULT '',
      PRIMARY KEY (ID)
    );
    ";
    self::query($query);
  }

  public static function fillCategory()
  {
    $sql = "
    INSERT INTO category
    (`name`)
    VALUES
    ('Все товары'),
    ('Дискография'),
    ('Духовые'),
    ('Струнные'),
    ('Клавишные'),
    ('Ударные'),
    ('Электромузыкальные'),
    ('Усилители');
    ";
    return self::query($sql);
  }

  public static function fillCountry()
  {
    $sql = "
    INSERT INTO country
    (`name`)
    VALUES
    ('Россия'),
    ('Украина'),
    ('Беларусь'),
    ('Германия'),
    ('Китай'),
    ('Англия'),
    ('Италия'),
    ('США'),
    ('Япония'),
    ('Канада');
    ";
    return self::query($sql);
  }

  public static function fillItem()
  {
    $sql = "
    INSERT INTO item
    (name, description, fk_category, material, size)
    VALUES
    ('Алиса', 'Советская и российская рок-группа, образованная в 1983 году в Ленинграде.', '2', 'Рок', 'Энергия/1985'),
    ('Blue System', 'Немецкая англоязычная поп-группа, созданная Дитером Боленом в 1987', '2', 'Поп', 'Walking On The Rainbow/1987'),
    ('Nirvana', 'Американская рок-группа, созданная Куртом Кобейном и басистом Кристом Новоселичем.', '2', 'Рок', 'Nevermind/1991'),
    ('Блокфлейта', 'Разновидность продольной флейты.', '3', 'Медь', '150см'),
    ('Флейта-пикколо', 'Самый высокий по звучанию инструмент среди духовых.', '3', 'Дерево', '32см'),
    ('Оригинальная труба', 'Медный духовой музыкальный инструмент альтово-сопранового регистра', '3', 'Латунь', '160см'),
    ('Кларнет', 'Язычковый деревянный духовой музыкальный инструмент с одинарной тростью', '3', 'Дерево', '66см'),
    ('Электро-гитара', 'Разновидность гитары с электромагнитными звукоснимателями', '4', 'Клен', '8 струн'),
    ('Бас-гитара', 'Струнно-щипковый музыкальный инструмент', '4', 'Дерево', '4 струная'),
    ('Дредноут', 'Вид акустических гитар, отличающийся увеличенным корпусом ', '4', 'Дерево', '12 струн'),
    ('Русская гитара', 'Струнный щипковый музыкальный инструмент из семейства гитар', '4', 'Клен', '7 струнная'),
    ('Рояль', 'Музыкальный инструмент, основной вид фортепиано.', '5', 'Сложная конструкция', 'Салонный'),
    ('Барабан', 'Музыкальный инструмент из семейства ударных.', '6', 'Бамбук', 'Малый барабан'),
    ('Синтезатор', ' Электронный музыкальный инструмент.', '7', 'Сложная техника', 'Рабочая станция'),
    ('Усилитель', 'Элемент системы управления (или регистрации и контроля)', '8', 'Сложная конструкция', 'Активный усилитель');
    ";
    return self::query($sql);
  }
  public static function dropDB()
  {
    if(!self::$con) self::connect();
    if(!self::$con) return false;
    $sql = '
    DROP TABLE IF EXISTS `users`;
    DROP TABLE IF EXISTS `category`;
    DROP TABLE IF EXISTS `item`;
    DROP TABLE IF EXISTS `country`;
    DROP TABLE IF EXISTS `assortiment`;
    ';
    self::query($sql);
  }
}
