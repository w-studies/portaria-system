<?php

function stringify_attributes($attributes, bool $js = false): string
{
  $atts = '';

  if (empty($attributes)) {
    return $atts;
  }

  if (is_string($attributes)) {
    return ' ' . $attributes;
  }

  $attributes = (array) $attributes;

  foreach ($attributes as $key => $val) {
    $atts .= ($js) ? $key . '=' . $val . ',' : ' ' . $key . '="' . $val . '"';
  }

  return rtrim($atts, ',');
}

function parse_form_attributes($attributes, array $default): string
{
  if (is_array($attributes)) {
    foreach ($default as $key => $val) {
      if (isset($attributes[$key])) {
        $default[$key] = $attributes[$key];
        unset($attributes[$key]);
      }
    }
    if (!empty($attributes)) {
      $default = array_merge($default, $attributes);
    }
  }

  $att = '';

  foreach ($default as $key => $val) {
    if (!is_bool($val)) {
      if ($key === 'name' && !strlen($default['name'])) {
        continue;
      }
      $att .= $key . '="' . $val . '" ';
    } else {
      $att .= $key . ' ';
    }
  }

  return $att;
}

function form_input($data = '', string $value = '', $extra = '', string $type = 'text'): string
{
  $defaults = [
    'type'  => $type,
    'name'  => is_array($data) ? '' : $data,
    'value' => $value,
  ];

  return '<input ' . parse_form_attributes($data, $defaults) . stringify_attributes($extra) . " />\n";
}

function form_label(string $label_text = '', string $id = '', array $attributes = []): string
{
  $label = '<label';

  if ($id !== '') {
    $label .= ' for="' . $id . '"';
  }

  if (is_array($attributes) && $attributes) {
    foreach ($attributes as $key => $val) {
      $label .= ' ' . $key . '="' . $val . '"';
    }
  }

  return $label . '>' . $label_text . '</label>';
}

function col_input($args)
{
  // define classes padrão para os col inputs
  $args['input']['class'] = implode(' ', ['form-control', $args['input']['class'] ?? null]);

  // define classe padrão para a col div
  $args['cols'] = $args['cols'] ?? 'col-12';

  $display = "<div class='$args[cols]'>"
    . form_label($args['label'])
    . form_input($args['input'])
    . '</div>';
  return $display; // . '</div>';
}
