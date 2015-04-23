<?php

/**
 * Solarizes an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $threshold
 *   The threshold of the solarize effect.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_solarize(stdClass $image, $threshold) {
  return $image->resource->solarizeImage($threshold);
}

/**
 * Implements the imagick solarize effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_solarize($image, $data = array()) {
  image_toolkit_invoke('solarize', $image, $data);
}

/**
 * Settings form for the imagick solarize effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_solarize_form($action) {
  $default = array(
    'threshold' => '30000',
  );
  $action = array_merge($default, (array) $action);
  $form = array();

  $form['threshold'] = array(
    '#type' => 'textfield',
    '#title' => t('Threshold'),
    '#description' => t('The number of threshold of the solarize effect.'),
    '#default_value' => $action['threshold'],
    '#size' => 6,
  );

  return $form;
}
