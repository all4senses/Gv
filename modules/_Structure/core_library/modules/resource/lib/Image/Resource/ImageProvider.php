<?php

namespace Image\Resource;

use Resource\Exception\NotFound,
    Resource\Provider\ProviderAbstract;

/**
 * Image styles resource provider.
 */
class ImageProvider extends ProviderAbstract {

  public function getResource($resourcePath, $uri) {

    list($styleName, $scheme, $filePath) = explode('/', $resourcePath, 3);

    // Do some consistency checks.
    if (!$style = image_style_load($styleName)) {
      throw new NotFound("Unknown file style: '" . $styleName . "'.");
    }
    if (!isset($scheme)) {
      throw new NotFound("Unable to find scheme for asked file: '" . $uri . "'.");
    }

    // Fetch original image URI thanks to given URI.
    $imageUri = $scheme . '://' . $filePath;

    switch ($scheme) {
      case 'private':
        $resource = new PrivateImage($resourcePath, $uri);
        break;

      default:
        $resource = new Image($resourcePath, $uri);
        break;
    }

    $resource
      ->setStyle($style)
      ->setReturnScheme($scheme)
      ->setOriginalImageUri($imageUri);

    return $resource;
  }
}
