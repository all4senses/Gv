<?php

/**
 * Deciphers the image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $password
 *   The password to decrypt the image with.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_decipher(stdClass $image, $password) {
  $image->resource->decipherImage($password);

  return $image;
}

/**
 * Implements the imagick decipher effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_decipher($image, $data = array()) {
  image_toolkit_invoke('encipher', $image, $data);
}

/**
 * Settings form for the imagick decipher effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_decipher_form($action) {
  $default = array(
    'password' => '',
  );
  $action = array_merge($default, (array) $action);
  $form = array();
  $form['password'] = array(
    '#type' => 'textfield',
    '#title' => t('Password to decrypt the image'),
    '#default_value' => $action['password'],
  );

  return $form;
}
