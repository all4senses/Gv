<?php

/**
 * Rotate an image the given number of degrees.
 *
 * @param $image
 *   An image object. The $image->resource, $image->info['width'], and
 *   $image->info['height'] values will be modified by this call.
 * @param $degrees
 *   The number of (clockwise) degrees to rotate the image.
 * @param $background
 *   An hexadecimal integer specifying the background color to use for the
 *   uncovered area of the image after the rotation. E.g. 0x000000 for black,
 *   0xff00ff for magenta, and 0xffffff for white. For images that support
 *   transparency, this will default to transparent. Otherwise it will
 *   be white.
 * @return
 *   TRUE or FALSE, based on success.
 *
 * @see image_rotate()
 */
function image_imagick_rotate(stdClass $image, $degrees, $background = NULL) {
  $res = $image->resource;
  $background = '#' . dechex($background);
  if (!$res->rotateImage($background, $degrees)) {
    return FALSE;
  }
  $image->info['width'] = $res->width;
  $image->info['height'] = $res->height;
  return TRUE;
}
