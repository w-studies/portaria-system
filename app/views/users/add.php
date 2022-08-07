<div class="row">
  <?= col_input([
    'cols'  => 'col-12',
    'label' => 'Nome',
    'input' => [
      'name'     => 'name',
      'value'    => $fdata->name,
      'required' => true
    ]
  ])
  . col_input([
    'cols'  => 'col-md-6',
    'label' => 'Senha',
    'input' => [
      'type'     => 'password',
      'name'     => 'password',
      'required' => true
    ]
  ])
  . col_input([
    'cols'  => 'col-md-6',
    'label' => 'Confirmar Senha',
    'input' => [
      'type'     => 'password',
      'name'     => 'password-confirm',
      'required' => true
    ]
  ])
  ?>
</div>
