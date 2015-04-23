<?php

namespace Resource;

/**
 * Dynamic resource generator.
 */
interface ResourceInterface {

  /**
   * Unlimited lifetime.
   */
  const LIFETIME_INFINITE = 0;

  /**
   * Get resource raw content.
   * 
   * @return string
   */
  public function build();

  /**
   * Display the content on the output buffer. This should implemented a
   * buffered method if files are big enough.
   */
  public function display();

  /**
   * Get HTTP headers to set for this particular resource.
   * 
   * @return array
   *   Key/value pairs. Key must be valid HTTP headers, and value the full.
   *   You should at least send the Content-Type header to avoid browsers
   *   to attempt displaying your raw data as plain text.
   */
  public function getHttpHeaders();

  /**
   * Get lifetime of this resource, in seconds.
   * 
   * @return int
   */
  public function getLifetime();

  /**
   * Tells if this resource need a mutex for generation.
   * 
   * @return bool
   */
  public function needsLock();

  /**
   * Get URI for this resource.
   */
  public function getUri();

  /**
   * Default constructor.
   * 
   * Provider will give this file its own URI at construct time, once set, this
   * URI remains immutable for this object lifetime.
   * 
   * @param string $resourcePath
   *   Relative to provider resource path.
   * @param string $uri
   *   Full resource URI.
   */
  public function __construct($resourcePath, $uri);
}
