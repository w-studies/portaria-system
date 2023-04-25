<div class="row">
  <div class="col">
    <h1 class="fw-light">Cadastros</h1>
  </div>
  <div class="col col-md-auto ms-md-auto">
    <a href="portaria/add" role="modal" data-modal-size="lg" class="btn btn-primary">
      <i class="fa-solid fa-plus"></i> Cadastrar</a>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <?php
      $tHead = ['Foto', 'Matricula', 'Tipo', 'Nome', 'Placa', 'Veiculo', 'Cidade', 'Empresa', 'Data Cadastro'];
      $display = '<thead><tr>';
      foreach ($tHead as $v) {
        $display .= '<th>' . $v . '</th>';
      }
      echo $display . '</tr></thead>'
      ?>
    </table>
  </div>
</div>