<?php

namespace Aggregation\Resource;

use \Exception;

class Css extends AggregationAbstract {

  /**
   * This is a really specific case, because core already builds the file for
   * us we have to use its own function for this.
   * 
   * @see FileAbstract::build()
   */
  public function build() {
    if (!file_exists($this->uri)) {
      $this->checkPath();

      $css = array();

      // Build some array for core to find out files.
      foreach ($this->map as $path) {
        $css[] = array('data' => $path, 'type' => 'file');
      }

      if ($coreUri = drupal_build_css_cache($css)) {
        if (!file_unmanaged_copy($coreUri, $this->uri, FILE_EXISTS_REPLACE)) {
          // Internal server error.
          throw new Exception;
        }

        if ($this->useGzip()) {
          $gzipedCoreUri = $coreUri . '.gz';
          $gzipedUri = $this->uri . '.gz';

          if (file_exists($gzipedCoreUri)) {
            file_unmanaged_copy($gzipedCoreUri, $gzipedUri, FILE_EXISTS_REPLACE);
          }
          else {
            // Core rely on a performance settings that does not really need to
            // exist. Let's just create the file. We don't really care for it
            // to be used or not.
            file_unmanaged_save_data(gzencode(file_get_contents($this->uri), 9, FORCE_GZIP), $gzipedUri, FILE_EXISTS_REPLACE);
          }
        }
      }
      else {
        // Core was unable to aggregate the files.
        throw new Exception;
      }
    }
  }

  public function getHttpHeaders() {
    return array(
      'Content-Type' => 'text/css',
      'Content-Length' => filesize($this->uri),
      'Content-Transfer-Encoding' => 'binary',
    );
  }

  /**
   * Void implementation because we are not going to use it.
   * 
   * @see FileAbstract::buildFileContent()
   */
  public function buildFileContent() {}
}
