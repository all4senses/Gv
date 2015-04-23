Resource Handling
=================

This module defines a ressource as "particular material accessible from a
particular URI". This URI, within the web are URL.

This module hacks into the menu system and create a global menu entry for
each StreamWrapper registered URI scheme which is considered by Drupal as
public and accessible from URL.

Behind the scene, it provide all the framework and expose two really simple
interfaces for resource dynamic on-demand lazy generation and static copy
storage for later faster access.

Current features
----------------

Right now this module carries two specific implementations:

 1. CSS and JS resource on-demand generation.

 2. Image Style derivatives generation.

For both of these it substitute the actual core API with its own and gracefully
derivate core and do the work itself, for sample purposes.
