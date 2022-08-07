<?php
echo get_pr();
$viewFile = 'app/views/' . $View['path'] . '.php';
if (is_file($viewFile)) {
  require $viewFile;
} else {
  echo '<div class="alert alert-danger">Oops! View not found!</div>';
}

if($_SERVER['SERVER_NAME']=='was2') {
  echo '<pre>$Controller: ';
  print_r($Controller);
  echo '</pre>';
  echo '<pre>$View: ';
  print_r($View);
  echo '</pre>';
}
