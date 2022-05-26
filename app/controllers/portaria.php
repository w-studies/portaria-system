<?php
if ($View['name'] == 'add') {
  $response = file_get_contents($View['path']);
  // devolve json com mensagem
  jsonResponse($response);
}
