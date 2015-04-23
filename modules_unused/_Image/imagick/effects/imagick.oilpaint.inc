<?php

/**
 * Creates an oil painted image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $radius
 *   The threshold of the oilpaint effect.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_oilpaint(stdClass $image, $radius) {
  return $image->resource->oilPaintImage($radius);
}

/**
 * Implements the imagick oilpaint effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_oilpaint($image, $data = array()) {
  image_toolkit_invoke('oilpaint', $image, $data);
}

/**
 * Settings form for the imagick oilpaint effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_oilpaint_form($action) {
  $default = array(
    'radius' => '5',
  );
  $action = array_merge($default, (array) $action);
  $form = array();

  $form['radius'] = array(
    '#type' => 'textfield',
    '#title' => t('Radius'),
    '#description' => t('The radius of the oilpaint effect.'),
    '#default_value' => $action['radius'],
    '#size' => 3,
  );

  return $form;
}
