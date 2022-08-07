<?php

/**
 * @param string|array|null $data
 * @param int $code
 * @return void
 */
function jsonResponse(string|array $data = null, int $code = 200): void
{
  // clear the old headers
  header_remove();
  // set the actual code
  http_response_code($code);

  // treat this as json
  header('Content-Type: ' . (is_array($data) ? 'application/json' : 'text/html'));

  $status = [
    200 => '200 OK',
    400 => '400 Bad Request',
    404 => '400 Not Found',
    422 => 'Unprocessable Entity',
    500 => '500 Internal Server Error'
  ];

  // ok, validation error, or failure
  header('Status: ' . $status[$code]);

  if ($code !== 200) {
    // guarda os dados do backtrace
    $debug = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

    if (is_array($data)) {
      $data['debug'] = $debug;
    } else {
      $data .= "<small class='text-secondary'><b>FILE</b>: $debug[file], <b>LINE</b>: $debug[line]<small>";
    }
  }
  // return the encoded json
  die(is_array($data) ? json_encode($data) : $data);
}

/**
 * @param string $view
 * @param array $view
 * @return string
 */
function view($viewPath, $data = [])
{
  extract($data);
  ob_start();
  include('app/views/' . $viewPath . '.php');
  $output = ob_get_contents();
  @ob_end_clean();

  return $output;
}

function pr_treat_type($v, $i = ['text-info', 'darkmagenta'])
{
  if (gettype($v) == 'string') {
    return "<span class='$i[0]'>'$v'</span>";
  }

  return "<span style='color:$i[1]'>$v</span>";
}

function pr_parse_array($variable, $spaceSize = 1)
{
  //espaços
  $space = str_repeat('  ', $spaceSize);

  $display = null;

  if (preg_match('/(array|object)/', gettype($variable), $matches)) {

    $closeSymbol = ']';

    if ($matches[0] == 'object') {
      $display     .= '<b>' . get_class($variable) . ' Object</b> <i>(size: ' . sizeof((array)$variable) . ')</i>{<br>';
      $closeSymbol = '}';
    } else {
      $display .= '<b>' . ucfirst(gettype($variable)) . '</b> <i>(size: ' . sizeof((array)$variable) . ')</i>[<br>';
    }


    foreach ($variable as $i => $v) {
      $display .= $space
        // index
        . pr_treat_type($i)
        // attribution signal
        . ' <span class="text-muted">=&gt;</span> ';

      if (preg_match('/(array|object)/', gettype($v), $matches)) {
        if ($matches[0] == 'array') {
          $display .= pr_parse_array($v, $spaceSize + 3);
        } else {
          $display .= json_encode($v, JSON_PRETTY_PRINT);
        }
      } else {
        $display .=
          // type
          '<small>' . gettype($v) . '</small> '
          // value
          . pr_treat_type($v, ['text-danger', 'darkred'])

          // length
          . (gettype($v) == 'string' ? ' <small><i>(length: ' . strlen($v) . ')</i></small>' : null) . '<br>';
      }
    }

    $display .= str_repeat('  ', $spaceSize - 1) . $closeSymbol . '<br>';
  } else {
    $display .=
      // type
      '<small>' . gettype($variable) . '</small> '
      // value
      . pr_treat_type($variable, ['text-danger', 'darkred'])

      // length
      . (gettype($variable) == 'string' ? ' <small><i>(length: ' . strlen($variable) . ')</i></small>' : null) . '<br>';
  }
  return $display;
}


function pr($data, $index = null)
{

  if (is_object($data) && get_class($data) != 'stdClass') {
    $_SESSION['print_r'][$index] = $data;
    return;
  }

  // guarda os dados do backtrace
  $debug = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

  // inicia a variável $display
  $display = '<small>' . $debug['file'] . ':</small><b class="text-primary">' . $debug['line'] . '</b><br>'
    . ($index ? "<span class='text-muted'>[<span class='text-danger'>$index</span>]" . ' =&gt;</span> ' : null)
    . pr_parse_array($data);

  // guarda $display na sessão
  $_SESSION['print_r'][$index] = $display;
}


function get_pr()
{
  if (isset($_SESSION['print_r'])) {

    $session = $_SESSION['print_r'];
    ob_start();
    echo '<pre class="pre text-start"><code>';
    echo '<i>{size: ' . sizeof($session) . '}</i><br>';
    foreach ($session as $i => $row) {
      // se tiver mais de um, adiciona quebra de linha
      $i < 1 || print("\n\n");

      print_r($row);
    }
    echo '</code></pre>';
    unset($_SESSION['print_r']);
    //session_write_close();

    $output = ob_get_contents();
    @ob_end_clean();

    return $output;
  }
}
