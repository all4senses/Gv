<?php

namespace Resource;

/**
 * Base implementation for statically cached files.
 * 
 * This implementation will fit for small or medium files, but for largest
 * files, you should probably implement yourself a buffered version of it
 * in order to avoid memory capacity exhausted errors.
 * 
 * It handles GZIP compression. While this is not part of the original design,
 * it only will store a gziped copy of the file suffixed with '.gz', such as
 * actual core CSS and JS handling. For this gzip files to be used, you will
 * need your VirtualHost configuration to carry the needed rewrite rules, as
 * you can see for CSS and JS in default core .htaccess file.
 */
abstract class FileAbstract extends ResourceAbstract {

  /**
   * @var bool
   */
  protected $gzip = false;

  /**
   * Toggle compression.
   * 
   * @param bool $toggle = TRUE
   *   (optional) Set to FALSE will disable compression.
   * 
   * @return bool
   *   TRUE if Gzip can be enabled (depending on the zlib extension presence).
   */
  public function setGzip($toggle = true) {
    $this->gzip = $toggle && variable_get('clean_url', 0) && extension_loaded('zlib');
  }

  /**
   * Does this resource uses gzip?
   * 
   * @return bool
   */
  public function useGzip() {
    return $this->gzip;
  }

  /**
   * Simple helper that, using the internal registered URI will create the
   * target directory if not exists.
   * 
   * @throws Exception
   *   If the directory could not have been created.
   */
  protected function checkPath() {
    $path = dirname($this->uri);
    if (!is_dir($path)) {
      if (mkdir($path, 0777, true) === false) {
        throw new Exception("Unable to create path '" . $path . "'");
      }
    }
  }

  /**
   * Build the actual file content.
   * 
   * @return string
   */
  protected abstract function buildFileContent();

  /**
   * Basic implementation that should work for the rest of the world. This
   * implementation triggers a lazzy file build if file does not exist,
   * depending on the this instance URI.
   * 
   * @see ResourceInterface::build()
   */
  public function build() {
    $buffer = null;

    if (!file_exists($this->uri)) {
      $this->checkPath();
      $buffer = $this->buildFileContent();
      file_put_contents($this->uri, $buffer);
    }

    if ($this->gzip) {
      $gzipedUri = $this->uri . '.gz';

      if (!file_exists($gzipedUri)) {
        if (!isset($buffer)) {
          $buffer = file_get_contents($this->uri);
        }

        // We don't care about this operation success. Gzip is only a bonus
        // feature but is not an essential component.
        // FIXME: Does zlib is able to directly encode an existing file?
        file_unmanaged_save_data(gzencode($buffer, 9, FORCE_GZIP), $gzipedUri, FILE_EXISTS_REPLACE);
      }
    }
  }

  /**
   * This default implementation will introspect the current file using the
   * PHP helpers we have. If you can override it easily, do it at least for
   * performances reasons.
   * 
   * @see ResourceInterface::getHttpHeaders()
   */
  public function getHttpHeaders() {
    if (file_exists($this->uri)) {
      return array(
        'Content-Type' => file_get_mimetype($this->uri),
        'Content-Length' => filesize($this->uri),
        'Content-Transfer-Encoding' => 'binary',
      );
    }
    else {
      return array(
        'Content-Type' => 'application/octet-stream',
        'Content-Transfer-Encoding' => 'binary',
      );
    }
  }

  /**
   * This should fit for a lot of implementation. We are generating static
   * files here, they are probably not volatile.
   * 
   * @see ResourceInterface::getLifetime()
   */
  public function getLifetime() {
    return ResourceInterface::LIFETIME_INFINITE;
  }

  /**
   * Because we are actually building this over a static file, this method is
   * not business logic anymore, but pure file handling.
   * 
   * @see ResourceInterface::display()
   */
  public function display() {
    echo file_get_contents($this->uri);
    // FIXME: Is this valuable for common use cases? CSS are really small files
    // and probably doesn't need chunking, for example, while images would
    // probably highly benefit from it.
    //file_transfer($this->_uri, array());
  }

  /**
   * Most implementations of physical static files needs a lock.
   * 
   * @see ResourceInterface::needsLock()
   */
  public function needsLock() {
    return true;
  }

  public function __construct($resourcePath, $uri) {
    parent::__construct($resourcePath, $uri);
    $this->setGzip(true);
  }
}
