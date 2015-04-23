<?php

namespace Resource;

use \DrupalPublicStreamWrapper;

/**
 * Custom stream wrapper for resource files.
 */
class StreamWrapper extends DrupalPublicStreamWrapper {

  public function getDirectoryPath() {
    if (!$path = variable_get('file_resource_path')) {
      return parent::getDirectoryPath() . '/resources';
    }
    return $path;
  }

  function getExternalUrl() {
    $path = str_replace('\\', '/', $this->getTarget());
    return $GLOBALS['base_url'] . '/' . $this->getDirectoryPath() . '/' . drupal_encode_path($path);
  }
}
