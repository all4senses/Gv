<?php

/**
 * Scale an image to the specified size using Imagick.
 *
 * @param $image
 *   An image object. The $image->resource, $image->info['width'], and
 *   $image->info['height'] values will be modified by this call.
 * @param $width
 *   The new width of the resized image, in pixels.
 * @param $height
 *   The new height of the resized image, in pixels.
 * @return
 *   TRUE or FALSE, based on success.
 *
 * @see image_resize()
 */
function image_imagick_resize(stdClass $image, $width, $height) {
  $res = $image->resource;
  if (!$res->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1)) {
    return FALSE;
  }
  $image->info['width'] = $width;
  $image->info['height'] = $height;
  return TRUE;
}
