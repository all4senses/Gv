<?php

/**
 * Converts the format of an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $data
 *   Array of data passed through by the form.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_convert_image(stdClass $image, $data = array()) {
  $formats = coloractions_file_formats();
  $image->info['mime_type'] = $data['format'];
  $image->info['extension'] = $formats[$data['format']];

  $image->resource->setCompressionQuality((int) $data['quality']);
  $image->resource->setImageFormat($formats[$data['format']]);

  return $image;
}
