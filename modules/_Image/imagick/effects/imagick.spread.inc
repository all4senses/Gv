<?php

/**
 * Adds spread to an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $radius
 *   The radius of spread effect.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_spread(stdClass $image, $radius) {
  return $image->resource->spreadImage($radius);
}

/**
 * Implements the imagick spread effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_spread($image, $data = array()) {
  image_toolkit_invoke('spread', $image, $data);
}

/**
 * Settings form for the imagick spread effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_spread_form($action) {
  $default = array(
    'radius' => 10,
  );
  $action = array_merge($default, (array) $action);
  $form = array();
  $form['help'] = array('#value' => t('Special effects method that randomly displaces each pixel in a block defined by the radius parameter.'));
  $form['radius'] = array(
    '#type' => 'textfield',
    '#title' => t('Radius'),
    '#description' => t('The spread radius, in pixels.'),
    '#default_value' => $action['radius'],
  );
  return $form;
}
