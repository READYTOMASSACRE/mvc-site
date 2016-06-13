<?php
namespace app\core
{
  class Autoloader
  {
    const debug = 0;
    public function __construct(){}

    public static function autoload($file)
    {
      $file = strtolower(str_replace('\\', '/', $file));
      self::StPutFile('На очереди ' . $file);
      $path = $_SERVER['DOCUMENT_ROOT'];
      $filepath = $_SERVER['DOCUMENT_ROOT'] . '/' . $file . '.php';
      if (file_exists($filepath))
      {
        if(self::debug) self::StPutFile('подключили ' .$filepath);
        require_once($filepath);
      }
      else
      {
        $flag = true;
        if(self::debug) self::StPutFile('начинаем рекурсивный поиск ' . $file);
        self::recursive_autoload($file, $path, $flag);
      }
    }

    public static function recursive_autoload($file, $path, &$flag)
    {
      if (FALSE !== ($handle = opendir($path)) && $flag)
      {
        while (FAlSE !== ($dir = readdir($handle)) && $flag)
        {

          if (strpos($dir, '.') === FALSE)
          {
            $path2 = $path .'/' . $dir;
            $filepath = $path2 . '/' . $file . '.php';
            if(self::debug) self::StPutFile('ищем файл <b>' .$file .'</b> in ' .$filepath);
            if (file_exists($filepath))
            {
              if(self::debug) self::StPutFile('подключили ' .$filepath );
              $flag = FALSE;
              require_once($filepath);
              break;
            }
            self::recursive_autoload($file, $path2, $flag);
          }
        }
        closedir($handle);
      }
    }

    private static function StPutFile($data)
    {
      $dir = $_SERVER['DOCUMENT_ROOT'] .'/Log/Log.html';
      $file = fopen($dir, 'a');
      flock($file, LOCK_EX);
      fwrite($file, ('║' .$data .'=>' .date('d.m.Y H:i:s') .'<br/>║<br/>' .PHP_EOL));
      flock($file, LOCK_UN);
      fclose ($file);
    }

  }
  \spl_autoload_register('app\core\Autoloader::autoload');
}
