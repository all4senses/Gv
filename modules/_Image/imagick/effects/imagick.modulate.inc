<?php

/**
 * Modulates the image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $type
 *   The type of noise.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_modulate(stdClass $image, $brightness, $saturation, $hue) {
  return $image->resource->modulateImage($brightness, $saturation, $hue);
}

/**
 * Implements the imagick modulate effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_modulate($image, $data = array()) {
  image_toolkit_invoke('modulate', $image, $data);
}

/**
 * Settings form for the imagick modulate effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_modulate_form($action) {
  $default = array(
    'brightness' => 100,
    'saturation' => 100,
    'hue' => 100,
  );
  $action = array_merge($default, (array) $action);
  $form = array();
  $form['brightness'] = array(
    '#type' => 'textfield',
    '#title' => t('Brightness in percentage'),
    '#default_value' => $action['brightness'],
  );
  $form['saturation'] = array(
    '#type' => 'textfield',
    '#title' => t('Saturation in percentage'),
    '#default_value' => $action['saturation'],
  );
  $form['hue'] = array(
    '#type' => 'textfield',
    '#title' => t('Hue in percentage'),
    '#default_value' => $action['hue'],
  );

  return $form;
}
