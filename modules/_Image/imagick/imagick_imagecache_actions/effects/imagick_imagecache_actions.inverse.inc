<?php

/**
 * Converts the image to a negative form
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $data
 *   Array of data passed through by the form.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_inverse(stdClass $image, $data = array()) {
  return $image->resource->negateImage(FALSE);
}
