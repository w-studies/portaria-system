<?php

$controller = 'dashboard';
$view = 'index';

if (isset($_SERVER['PATH_INFO'])) {

  $url = explode('/', trim($_SERVER['PATH_INFO'], '/'));

  $controller = array_shift($url);

  if (sizeof($url)) {
    $view = array_shift($url);
  }

  $Params = $url;
}

$Controller = [
  'name' => $controller
];

$View = [
  'name' => $view,
  'path' => $controller . '/' . $view,
];

// se a view for add
if ($view === 'add') {
  require 'app/helpers/forms_helper.php';
}

$controllerFile = 'app/controllers/' . $controller . '.php';
// se existir um controller
if (is_file($controllerFile)) {
  //
  require 'app/helpers/database_helper.php';
  //
  require $controllerFile;
}
