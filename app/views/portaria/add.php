<div class="row">
  <?= col_input([
    'cols'  => 'col-12',
    'label' => 'Nome',
    'input' => [
      'name'  => 'name',
      'value' => $fdata->name,
      'required' => true
    ]
  ])
    . col_input([
      'cols'  => 'col-md-6 col-lg-4',
      'label' => 'Matrícula',
      'input' => [
        'name'  => 'registration',
        'value' => $fdata->registration,
        'required' => true
      ]
    ])
    . col_input([
      'cols'  => 'col-md-6 col-lg-4',
      'label' => 'Tipo de Cliente',
      'input' => [
        'name'  => 'client_type',
        'value' => $fdata->client_type
      ]
    ])
    . col_input([
      'cols'  => 'col-md-6 col-lg-4',
      'label' => 'RG',
      'input' => [
        'name'  => 'rg',
        'value' => $fdata->rg
      ]
    ])
    . col_input([
      'cols'  => 'col-md-6 col-lg-4',
      'label' => 'Placa',
      'input' => [
        'name'  => 'vehicle_plate',
        'value' => $fdata->vehicle_plate
      ]
    ])
    . col_input([
      'cols'  => 'col-md-6 col-lg-8',
      'label' => 'Veículo',
      'input' => [
        'name'  => 'vehicle',
        'value' => $fdata->vehicle
      ]
    ])
  ?>
  <div class="col-md-6 col-lg-4">
    <label>Estado</label>
    <select name="" id="" class="form-select">
      <option value="">AC</option>
      <option value="">AL</option>
      <option value="">AP</option>
      <option value="">AM</option>
      <option value="">BA</option>
      <option value="">CE</option>
      <option value="">DF</option>
      <option value="">ES</option>
      <option value="">GO</option>
      <option value="">MA</option>
      <option value="">MT</option>
      <option value="">MS</option>
      <option value="">MG</option>
      <option value="">PA</option>
      <option value="">PB</option>
      <option value="">PR</option>
      <option value="">PE</option>
      <option value="">PI</option>
      <option value="">RJ</option>
      <option value="">RN</option>
      <option value="">RS</option>
      <option value="">RO</option>
      <option value="">RR</option>
      <option value="">SC</option>
      <option value="">SP</option>
      <option value="">SE</option>
      <option value="">TO</option>
    </select>
  </div>

  <?= col_input([
    'cols'  => 'col-md-6 col-lg-8',
    'label' => 'Cidade',
    'input' => [
      'name'  => 'city',
      'value' => $fdata->city
    ]
  ]) ?>
  <div class="col-3 col-sm-2">
    <label for='status'>Acesso Liberado</label>
    <div class="form-check form-switch">
      <input class="form-check-input" name="status" type="checkbox" role="switch" checked>
    </div>
  </div>
  <?= col_input([
    'cols'  => 'col-9 col-sm-10 col-md-12 col-lg-10',
    'label' => 'Empresa',
    'input' => [
      'name'  => 'company',
      'value' => $fdata->company
    ]
  ]) ?>
</div>
