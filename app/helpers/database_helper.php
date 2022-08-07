<?php

$getNew = function (string $table, $params = null) use ($sqli) {
  $obj = (object)[];
  $query = 'show columns from ' . $table;

  $result = $sqli->query($query);

  foreach ($result->fetch_all(MYSQLI_ASSOC) as $r) {
    // se tiver alguma coluna a ser ignorada
    if (isset($params['skipFields']) && in_array($r['Field'], $params['skipFields'])) {
    } else {
      $obj->{$r['Field']} = isset($_POST[$r['Field']]) ? $r['Field'] : $r['Default'];
      sizeof($_FILES) ? $obj->_files = $_FILES : null;
    }
  }
  return $obj;
};
