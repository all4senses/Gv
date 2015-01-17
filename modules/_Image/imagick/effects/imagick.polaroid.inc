<?php

/**
 * Creates a polaroid image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $angle
 *   The angle of the polaroid effect.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_polaroid(stdClass $image, $angle) {
  if (empty($angle)) {
    $angle = mt_rand(-30, 30);
  }

  return $image->resource->polaroidImage(new ImagickDraw(), $angle);
}

/**
 * Implements the imagick polaroid effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_polaroid($image, $data = array()) {
  image_toolkit_invoke('polaroid', $image, $data);
}

/**
 * Settings form for the imagick polaroid effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_polaroid_form($action) {
  $default = array(
    'angle' => '10',
  );
  $action = array_merge($default, (array) $action);
  $form = array();

  $form['angle'] = array(
    '#type' => 'textfield',
    '#title' => t('angle'),
    '#description' => t('The angle of the polaroid image. Leave this field empty to generate a random angle between -30 and 30 degrees.'),
    '#default_value' => $action['angle'],
    '#size' => 3,
  );

  return $form;
}
