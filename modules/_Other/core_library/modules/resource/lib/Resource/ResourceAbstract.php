<?php

namespace Resource;

abstract class ResourceAbstract implements ResourceInterface {
  /**
   * @var string
   */
  protected $resourcePath;

  /**
   * @var string
   */
  protected $uri;

  public function getUri() {
    return $this->uri;
  }

  /**
   * This default implementation will give the most basic headers you can
   * imagine. You are strongly advised to override it to ensure browsers
   * best behavior.
   * 
   * @see ResourceInterface::getHttpHeaders()
   */
  public function getHttpHeaders() {
    return array(
      'Content-Type' => 'application/octet-stream',
      'Content-Transfer-Encoding' => 'binary',
    );
  }

  public function __construct($resourcePath, $uri) {
    $this->resourcePath = $resourcePath;
    $this->uri = $uri;
  }
}
