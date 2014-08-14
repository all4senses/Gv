<?php

namespace Fortune\Resource;

use Resource\FileAbstract;

/**
 * Sample of file resource (stores a static file).
 * 
 * For our usage here, a public file seems to be more than enough.
 */
class FortuneFile extends FileAbstract {

  /**
   * @var string
   */
  protected $text;

  public function buildFileContent() {
    return $this->text;
  }

  public function getHttpContentType() {
    return "text/plain";
  }

  public function setText($text) {
    $this->text = $text;
  }
}
