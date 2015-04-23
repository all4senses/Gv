<?php

/**
 * Crop an image using the Imagick toolkit.
 *
 * @param $image
 *   An image object. The $image->resource, $image->info['width'], and
 *   $image->info['height'] values will be modified by this call.
 * @param $x
 *   The starting x offset at which to start the crop, in pixels.
 * @param $y
 *   The starting y offset at which to start the crop, in pixels.
 * @param $width
 *   The width of the cropped area, in pixels.
 * @param $height
 *   The height of the cropped area, in pixels.
 * @return
 *   TRUE or FALSE, based on success.
 *
 * @see image_crop()
 */
function image_imagick_crop(stdClass $image, $x, $y, $width, $height) {
  $res = $image->resource;
  if (!$res->cropImage($width, $height, $x, $y)) {
    return FALSE;
  }
  $image->info['width'] = $width;
  $image->info['height'] = $height;
  return TRUE;
}
