<?php

/**
 * Makes a sketch from an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $radius
 *   The radius of the sketch.
 * @param $sigma
 *   The sigma of the sketch.
 * @param $angle
 *   The angle of the sketch.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_sketch(stdClass $image, $radius, $sigma, $angle) {
  return $image->resource->sketchImage($radius, $sigma, $angle);
}

/**
 * Implements the imagick bur effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_sketch($image, $data = array()) {
  image_toolkit_invoke('sketch', $image, $data);
}

/**
 * @param $action
 *   The saved action form parameters.
 */
function imagick_sketch_form($action) {
  $default = array(
    'radius' => '8',
    'sigma' => '8',
    'angle' => '0',
  );
  $action = array_merge($default, (array) $action);
  $form = array();
  $form['radius'] = array(
    '#type' => 'textfield',
    '#title' => t('Radius'),
    '#description' => t('The radius of the Gaussian, in pixels, not counting the center pixel.'),
    '#default_value' => $action['radius'],
    '#size' => 3,
  );
  $form['sigma'] = array(
    '#type' => 'textfield',
    '#title' => t('Sigma'),
    '#description' => t('The standard deviation of the Gaussian, in pixels'),
    '#default_value' => $action['sigma'],
    '#size' => 3,
  );
  $form['angle'] = array(
    '#type' => 'textfield',
    '#title' => t('Angle'),
    '#description' => t('Apply the effect along this angle.'),
    '#default_value' => $action['angle'],
    '#size' => 3,
  );
  return $form;
}
