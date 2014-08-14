<?php

namespace Fortune\Resource;

use Resource\Exception\NotFound;
use Resource\Provider\ProviderAbstract;

/**
 * Sample registry for our fortunes.
 */
class FortuneProvider extends ProviderAbstract {

  /**
   * Static array of foo file contents for demonstration purpose.
   * 
   * @var array
   */
  protected static $fortunes = array(
    '1.txt' => "A drop of water shall be returned with a burst of spring.",
    '2.txt' => "Fortune does not come twice. Misfortune does not come alone.",
    '3.txt' => "A single day of sub-zero temperature is not enough to create three feet of ice.",
    '4.txt' => "If the wind comes from an empty cave, it's not without a reason.",
    '5.txt' => "Over a long distance, you learn about the strength of your horse; over a long period of time, you get to know what's in a person's heart.",
    '6.txt' => "To hit a dog with a meat-bun.",
    '7.txt' => "You must persevere to accomplish seemingly impossible tasks.",
  );

  public function getResource($resourcePath, $uri) {
    // Find the file name. This is basically where we would implement a real
    // business logic. For example using CSS or JS aggregation we could fetch
    // a fixed hash that we stored into database in a previous run.
    $parts = explode('/', $resourcePath);
    $name = $parts[1];

    if (2 !== count($parts) || !isset(self::$fortunes[$name])) {
      throw new NotFound("Fortune file '" . $name . "' does not exists.");
    }

    switch ($parts[0]) {
      case 'static':
        $resource = new FortuneFile($resourcePath, $uri);
        break;

      case 'volatile':
        $resource = new FortuneImaterial($resourcePath, $uri);
        break;

      default:
        throw new NotFound("Fortune file '" . $name . "' does not exists.");
    }

    // We normally have an instance here, set some business options and return it.
    $resource->setText($fortunes[$name]);

    return $resource;
  }
}
