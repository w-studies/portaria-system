<?php
// ADD
if ($View['name'] == 'add') {
  $fdata = $getNew('records');

  $response = view('layouts/modal-form', [
    'fdata' => $fdata,
    'form'  => (object)[
      'action' => 'portaria/save'
    ],
    'modal' => (object)[
      'icon'  => 'fa-solid fa-address-card',
      'title' => 'Cadastrar'
    ],
    'body'  => $View['path']
  ]);

  // devolve json com mensagem
  jsonResponse($response);

  // SAVE
} else if ($View['name'] == 'save') {
  pr(['Salvar dados no database', 'Em desenvolvimento', array_merge($_POST, $_FILES)]);
  jsonResponse(['response' => get_pr()], 500);
}
