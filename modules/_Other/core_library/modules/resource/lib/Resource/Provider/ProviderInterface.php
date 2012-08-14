<?php

namespace Resource\Provider;

use Resource;

interface ProviderInterface {
  /**
   * Get resource associated to the current partial path.
   * 
   * @param string $resourcePath
   *   Path relative to this provider base path.
   * @param string $uri
   *   Full resource URI provided by the upper layer.
   * 
   * @return ResourceInterface
   * 
   * @throws Resource\Exception\NotFound
   *   If no resource exists for this path.
   */
  public function getResource($resourcePath, $uri);

  /**
   * Get provider base path.
   * 
   * @return string
   */
  public function getBasePath();

  /**
   * Default constructor.
   * 
   * @param string $basePath
   *   This provider base path.
   */
  public function __construct($basePath);
}
