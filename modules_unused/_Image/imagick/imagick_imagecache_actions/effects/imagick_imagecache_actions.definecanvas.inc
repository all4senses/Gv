<?php

/**
 * Define the canvas of an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $data
 *   Array of data passed through by the form.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_definecanvas(stdClass $image, $data = array()) {
  $targetsize = $data['targetsize'];
  $RGB = $data['RGB'];

  $canvas = new Imagick();
  if ($RGB['HEX']) {
    $canvas->newImage($targetsize['width'], $targetsize['height'], new ImagickPixel($RGB['HEX']));
  }
  else {
    $canvas->newImage($targetsize['width'], $targetsize['height'], "none");
  }

  if ($data['under']) {
    $canvas->compositeImage($image->resource, imagick::COMPOSITE_DEFAULT, $targetsize['left'], $targetsize['top']);
  }
  else {
    $canvas->compositeImage($image->resource, imagick::COMPOSITE_OVERLAY, $targetsize['left'], $targetsize['top']);
  }
  $image->resource = $canvas;
  return $image;
}
