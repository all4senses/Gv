<?php

namespace Resource\Exception;

use \Exception;

/**
 * Exception thrown when a resource is already locked.
 */
class LockConflict extends Exception {}
