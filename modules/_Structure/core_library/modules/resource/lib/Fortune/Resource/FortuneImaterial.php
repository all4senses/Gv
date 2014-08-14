<?php

namespace Fortune\Resource;

use Resource\ResourceAbstract,
    Resource\ResourceInterface;

/**
 * Sample of volatile resource (always being generated).
 * 
 * @package Fortune
 */
class FortuneImaterial extends ResourceAbstract {

  /**
   * @var string
   */
  protected $text;

  /**
   * This dummy implementation does need a build.
   * 
   * @see Resource\ResourceInterface::build()
   */
  public function build() {}

  /**
   * Pure business stuff.
   * 
   * @see ResourceInterface::display()
   */
  public function display() {
    echo $this->text;
  }

  public function getHttpContentType() {
    return "text/plain";
  }

  public function getLifetime() {
    return ResourceInterface::LIFETIME_INFINITE;
  }

  /**
   * Most implementations of imaterial files probably won't need a lock.
   * 
   * @see ResourceInterface::needsLock()
   */
  public function needsLock() {
    return false;
  }

  public function setText($text) {
    $this->text = $text;
  }
}