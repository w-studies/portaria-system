<?php
// carrega as configurações
require 'app/config.php';
// carrega helpers
require 'app/helpers/functions_helper.php';
// conecta o sistema ao banco de dados
require 'app/connection.php';
// carrega o gerenciador de rotas
require 'app/router.php';
// carrega o layout definido nas configurações
require 'app/views/layouts/' . $Layout . '.php';
