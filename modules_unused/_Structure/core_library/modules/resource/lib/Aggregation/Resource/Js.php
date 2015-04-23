<?php

namespace Aggregation\Resource;

/**
 * FIXME: Implement it. Right now we don't use it at all because core doesn't
 * allow JS aggregation process modification the way he does for CSS. This
 * means that in order to achieve this, we are need to use the hook_js_alter().
 * Using this hook is dangerous because it will force us to give a really high
 * module weight in order to ensure that any other module gets it before us.
 */
class Js extends AggregationAbstract {

  public function buildFileContent() {
    // FIXME: This where we'd want it to be pluggable.
    throw new Exception("Not implemented yet.");
  }

  public function getHttpContentType() {
    return "text/javascript";
  }
}
