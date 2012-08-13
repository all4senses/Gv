<?php

namespace Image\Resource;

/**
 * Private files are the only special case because we should definitely not
 * save the thumbnail into a public folder.
 * 
 * FIXME: TODO.
 */
class PrivateImage extends Image {}
