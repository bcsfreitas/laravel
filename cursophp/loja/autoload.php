<?php
function customAutoLoad($className) {
  if(file_exists($className . '.php')) {
    require_once $className . '.php';
  }
}

spl_autoload_register('customAutoLoad');
 ?>
