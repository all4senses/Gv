<?php

namespace Resource\Provider;

use Resource\ResourceInterface;
use Resource\Exception\NotFound;

use \DrupalLocalStreamWrapper;

use \Exception;

/**
 * Entry point for this API.
 * 
 * This class registers all enabled provider and allow menu callback to fetch
 * them magically based on path.
 * 
 * This class is implemented as a singleton, while this could be changed, it
 * fits well for a Drupal 7 usage.
 */
class Registry {
  /**
   * Get supported schemes.
   * 
   * @return array
   *   Array of schemes.
   */
  public static function getSupportedSchemes() {
    //return array_keys(file_get_stream_wrappers(STREAM_WRAPPERS_LOCAL));

    // FIXME: For security, and before finding out a better algorithm, return
    // an hardcoded array. The commented line upper works fine, it also exports
    // temporary stream wrapper (potential security issue here).
    return array('resource', 'public');
  }

  /**
   * Find scheme by path.
   * 
   * @param string $path
   * 
   * @return string
   *   Scheme.
   * 
   * @throws Exception
   *   If scheme is not found.
   */
  public static function findSchemeByPath($path) {
    foreach (self::getSupportedSchemes() as $scheme) {
      $streamWrapper = file_stream_wrapper_get_instance_by_scheme($scheme);
      if (0 === strpos($path, $streamWrapper->getDirectoryPath())) {
        return $scheme;
      }
    }
  }

  /**
   * Singleton pattern implementation.
   * 
   * @var array
   */
  private static $instances = array();

  /**
   * Get singleton instance using the given scheme.
   * 
   * @param string $scheme
   *   Get the instance associated to the given scheme.
   * 
   * @return Registry
   * 
   * @throws Exception
   *   If scheme does not exists as a stream wrapper.
   */
  public static function getInstance($scheme) {
    if (!isset(self::$instances[$scheme])) {
      self::$instances[$scheme] = new self($scheme);
    }
    return self::$instances[$scheme];
  }

  /**
   * Get singleton instance using the given full path. This will attempt to
   * guess the scheme by testing the registered stream wrappers.
   *
   * This is a helper function that uses getInstance().
   * 
   * @param string $path
   *   Full query path.
   * 
   * @return Registry
   * 
   * @throws Exception
   *   If scheme does not exists as a stream wrapper or if the given path is not
   *   a scheme registered path.
   */
  public static function getInstanceByPath($path) {
    return self::getInstance(self::findSchemeByPath($path));
  }

  /**
   * Associated scheme.
   * 
   * @var string
   */
  protected $scheme;

  /**
   * Default constructor.
   * Singleton pattern implementation.
   * 
   * @param string $scheme
   *   Set the stream wrapper scheme to associate.
   * 
   * @throws Exception
   *   If scheme does not exists as a stream wrapper.
   */
  private function __construct($scheme) {
    $this->scheme = $scheme;
    // Enfore the stream wrapper validity check.
    $this->getWorkingPath();
  }

  /**
   * Internal cache.
   * 
   * FIXME: Uses any other existing registry implementation as base instead of
   * this custom code as soon as better helpers in core appears.
   * 
   * @var array
   */
  protected $cache;

  /**
   * Build internal cache.
   * 
   * FIXME: See $_cache attribute note.
   */
  protected function buildCache() {
    if (!isset($this->cache)) {
      $this->cache = array();
      foreach (module_invoke_all('resource_provider_info') as $path => $class) {
        if (class_exists($class)) {
          $this->cache[$path] = $class;
        } else {
          watchdog('resource', "Defined resource provider class '@class' does not exist, ignoring.", array('@class' => $class), WATCHDOG_ERROR);
        }
      }
      // Hopefully, we are defining a really simple ruleset, for now. This
      // ruleset conflict can be resolved with a simple reverse alphabetical
      // order.
      krsort($this->cache);
    }
  }

  /**
   * Registry working path. Should probably be relative to files path in most
   * use cases.
   * 
   * @var string
   */
  protected $workingPath;

  /**
   * Get working path.
   * 
   * @return string
   */
  public function getWorkingPath() {
    if (!isset($this->workingPath)) {
      $streamWrapper = file_stream_wrapper_get_instance_by_scheme($this->scheme);
      if ($streamWrapper instanceof DrupalLocalStreamWrapper) {
        $this->workingPath = $streamWrapper->getDirectoryPath();
      } else {
        throw new Exception("Scheme '" . $this->scheme . "' does not exists or does not register a local public stream wrapper class.");
      }
    }
    return $this->workingPath;
  }

  /**
   * Get resource provider from the given path.
   * 
   * @param string $path
   *   Path including full file name relative to working path.
   * 
   * @return ProviderInterface
   * 
   * @throws NotFound
   *   If no provider found.
   */
  public function getProvider($path) {
    $this->buildCache();

    foreach ($this->cache as $rule => $class) {
      if (0 === strpos($providerPath, $rule)) {
        return new $class($rule);
      }
    }

    throw new NotFound("Provider for path '" . $path . "' not found.");
  }

  /**
   * Get resource from the given path.
   * 
   * @param string $path
   *   Full path including working path or partial working path relative path.
   * 
   * @return ResourceInterface
   * 
   * @throws NotFound
   *   If no provider found.
   */
  public function getResource($path) {
    $this->buildCache();

    // Remove the current working path from the path.
    if (0 === strpos($path, $this->workingPath)) {
      $path = substr($path, strlen($this->workingPath) + 1);
    }

    // Find the right provider to use.
    foreach ($this->cache as $rule => $class) {
      if (0 === strpos($path, $rule)) {
        $provider = new $class($rule);
        if ($provider instanceof ProviderInterface) {
          // And use it in order to get the resource if exists.
          return $provider->getResource(substr($path, strlen($rule) + 1), $this->scheme . '://' . $path);
        } else {
          throw new Exception("Object of class '" . get_class($provider) . "' is not a valid provider");
        }
      }
    }

    throw new NotFound("Provider for path '" . $path . "' not found.");
  }
}
