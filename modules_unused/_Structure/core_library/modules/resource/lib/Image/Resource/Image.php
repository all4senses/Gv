<?php

namespace Image\Resource;

use Resource\FileAbstract;

use \Exception;

class Image extends FileAbstract {

  /**
   * @var string
   */
  protected $returnScheme;

  /**
   * @var string
   */
  protected $originalImageUri;

  /**
   * @var array
   */
  protected $style;

  /**
   * Set return scheme.
   * 
   * @param string $scheme
   * 
   * @return ResourceImage
   *   Self reference for chaining.
   */
  public function setReturnScheme($scheme) {
    $this->returnScheme = $scheme;
    return $this;
  }

  /**
   * Set original image URI.
   * 
   * @param string $uri
   * 
   * @return ResourceImage
   *   Self reference for chaining.
   */
  public function setOriginalImageUri($uri) {
    $this->originalImageUri = $uri;
    return $this;
  }

  /**
   * Set derivative style.
   * 
   * @param array $style
   * 
   * @return ResourceImage
   *   Self reference for chaining.
   */
  public function setStyle($style) {
    $this->style = $style;
    return $this;
  }

  /**
   * This is a specific use case because the image toolkit will generate the
   * image without giving us the chance to get the output buffer (which is
   * better anyway).
   * 
   * @see ResourceFile::build()
   */
  public function build() {
    if (!file_exists($this->uri)) {
      $this->checkPath();
      if (!image_style_create_derivative($this->style, $this->originalImageUri, $this->uri)) {
        throw new Exception("Unable to create derivative image.");
      }
    }
  }

  public function getHttpHeaders() {
    if ($image = image_load($this->uri)) {
      return array(
        'Content-Type' => $image->info['mime_type'],
        'Content-Length' => $image->info['file_size'],
        'Content-Transfer-Encoding' => 'binary',
      );
    }
    else {
      return parent::getHttpHeaders();
    }
  }

  /**
   * Void implementation because we are not going to use it.
   * 
   * @see ResourceFile::buildFileContent()
   */
  public function buildFileContent() {}
}
