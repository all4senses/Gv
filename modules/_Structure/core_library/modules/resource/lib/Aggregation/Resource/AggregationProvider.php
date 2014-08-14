<?php

namespace Aggregation\Resource;

use Resource\Exception\NotFound;
use Resource\Provider\ProviderAbstract;

class AggregationProvider extends ProviderAbstract {

  public function getResource($resourcePath, $uri) {

    if (FALSE === strpos($resourcePath, '/')) {
      throw new NotFound;
    }

    list($version, $hash) = explode('/', $resourcePath, 2);

    if (FALSE === strpos($hash, '.')) {
      throw new NotFound;
    }

    list($hash, $type) = explode('.', $hash, 2);

    // Attempt to find existing map.
    $map = db_select('resource_aggregation', 'a')
      ->fields('a', array('map'))
      ->condition('a.hash', $hash)
      ->execute()
      ->fetchField();

    if (!isset($map)) {
      throw new NotFound;
    }

    $map = unserialize($map);

    if (!isset($map) || empty($map)) {
      throw new NotFound;
    }

    switch ($type) {
      case 'js':
        $resource = new Js($resourcePath, $uri);
        $resource->setMap($map);
        break;

      case 'css':
        $resource = new Css($resourcePath, $uri);
        $resource->setMap($map);
        break;

      default:
        throw new NotFound;
    }

    return $resource;
  }
}
