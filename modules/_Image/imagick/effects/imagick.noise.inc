<?php

/**
 * Adds noise to an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $type
 *   The type of noise.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_noise(stdClass $image, $type) {
  return $image->resource->addNoiseImage($type);
}

/**
 * Implements the imagick noise effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_noise($image, $data = array()) {
  image_toolkit_invoke('noise', $image, $data);
}

/**
 * Settings form for the imagick noise effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_noise_form($action) {
  $default = array(
    'type' => imagick::NOISE_UNIFORM,
  );
  $action = array_merge($default, (array) $action);
  $form = array();
  $form['type'] = array(
    '#type' => 'select',
    '#title' => t('Noise type'),
    '#options' => array(
      imagick::NOISE_UNIFORM => t('Uniform'),
      imagick::NOISE_GAUSSIAN => t('Gaussian'),
      imagick::NOISE_MULTIPLICATIVEGAUSSIAN => t('Multiplicative gaussian'),
      imagick::NOISE_IMPULSE => t('Impulse'),
      imagick::NOISE_LAPLACIAN => t('Laplacian'),
      imagick::NOISE_POISSON => t('Poisson'),
      imagick::NOISE_RANDOM => t('Random'),
    ),
    '#default_value' => $action['type'],
  );
  return $form;
}
