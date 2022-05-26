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
  'name' => $controller,
  'path' => 'app/controllers/' . $controller . '.php',
];

$View = [
  'name' => $view,
  'path' => 'app/views/' . $controller . '/' . $view . '.php',
];


if (is_file($Controller['path'])) {
  require $Controller['path'];
}
