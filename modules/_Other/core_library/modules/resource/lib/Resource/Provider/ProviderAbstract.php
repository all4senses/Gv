<?php

namespace Resource\Provider;

abstract class ProviderAbstract implements ProviderInterface {
  /**
   * @var string
   */
  protected $basePath;

  public function getBasePath() {
    return $this->basePath;
  }

  public function __construct($uri) {
    $this->basePath = $uri;
  }
}
