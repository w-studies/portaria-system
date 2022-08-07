<?php
  if ($View['name'] == 'add') {
    $fdata = $getNew('records');

    $response = view('layouts/modal-form', [
      'fdata' => $fdata,
      'form'  => (object)[
        'action' => 'users/save'
      ],
      'modal' => (object)[
        'icon'  => 'fa-solid fa-user-plus',
        'title' => 'Cadastrar User'
      ],
      'body'  => $View['path']
    ]);

    // devolve json com mensagem
    jsonResponse($response);
  } else if ($View['name'] == 'save') {
    pr(['Salvar dados no database', 'Em desenvolvimento', $_POST]);
    jsonResponse(['response' => get_pr()], 500);
  }
