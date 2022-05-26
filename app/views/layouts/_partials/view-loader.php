<?php
if (is_file($View['path'])) {
  require $View['path'];
} else {
  echo '<div class="alert alert-danger">Oops! View not found!</div>';
}


echo '<pre>$Controller: ';
print_r($Controller);
echo '</pre>';
echo '<pre>$View: ';
print_r($View);
echo '</pre>';
