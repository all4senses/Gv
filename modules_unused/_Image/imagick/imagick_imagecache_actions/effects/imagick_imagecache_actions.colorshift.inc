<?php

/**
 * Colorshifts an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $data
 *   Array of data passed through by the form.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_colorshift(stdClass $image, $data = array()) {
  $color = new ImagickPixel($data['RGB']['HEX']);
  return $image->resource->colorizeImage($color, 1);
}
