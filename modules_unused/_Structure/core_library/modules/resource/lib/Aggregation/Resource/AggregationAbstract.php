<?php

namespace Aggregation\Resource;

use Resource\FileAbstract;

abstract class AggregationAbstract extends FileAbstract {

  /**
   * Array of file to aggregate.
   * 
   * @var array
   */
  protected $map;

  /**
   * Set files map.
   * 
   * @param array $map
   *   Ordered file list.
   */
  public function setMap(array $map) {
    $this->map = $map;
  }
}
