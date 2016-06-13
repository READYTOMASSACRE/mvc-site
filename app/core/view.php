<?php
namespace app\core;

class View
{
  function generate($content, $template, $data = null)
  {
    include 'app/view/' . $template;
  }
}
