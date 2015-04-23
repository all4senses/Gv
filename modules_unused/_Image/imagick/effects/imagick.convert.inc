<?php

/**
 * Converts the format of an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $type
 *   The type of format.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_convert(stdClass $image, $type) {
  $image->resource->setCompressionQuality((int) $data['quality']);
  $image->resource->setImageFormat($image->info['extension']);

  return $image;
}
