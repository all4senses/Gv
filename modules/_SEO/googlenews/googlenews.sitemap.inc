<?php
/**
 * @file
 * Functionality for generating the actual sitemap file.
 */

/**
 * Generate the news feed.
 */
function googlenews_getgooglenews() {
  $cid = 'googlenews';
  $content = '';

  // Try loading the data from the cache.
  if ($cache = cache_get($cid, 'cache')) {
    // Verify the data hasn't expired.
    if (time() < $cache->expire) {
      $content = $cache->data;
    }
  }

  // If nothing loaded from the cache, build it now.
  if (empty($content)) {
    // Get a list of all nodes to be output.
    $nodes = googlenews_list_nodes();

    $content = '<?xml version="1.0" encoding="UTF-8"?>';
    $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
    $content .= '  xmlns:n="http://www.google.com/schemas/sitemap-news/0.9">';

    // Load the publication name.
    $publication_name = variable_get('googlenews_publication_name', '');
    if (empty($publication_name)) {
      $publication_name = variable_get('site_name', 'Drupal');
    }
    $publication_name = check_plain($publication_name);

    // Optionally add tags.
    $tags = array();
    foreach (googlenews_tag_list() as $tag => $description) {
      if ($add = variable_get('googlenews_tag_' . $tag, '')) {
        $tags[$tag] = $add;
      }
    }

    // Loop through each node.
    foreach ($nodes as $node) {
      $content .= '<url>';
      $content .= '<loc>' . url('node/' . $node->nid, array('absolute' => TRUE)) . '</loc>';
      $content .= '<news:news>';
      $content .= '<news:publication>';
      $content .= '<news:name>' . $publication_name . '</news:name>';
      $content .= '<news:language>' . check_plain(entity_language('node', $node)) . '</news:language>';

      // Insert any added tags if they have values; processing tokens first.
      if (!empty($tags)) {
        $node = node_load($node->nid);
        foreach ($tags as $tag => $value) {
          // Some items can be output as a comma-separated list.
          if (is_array($value)) {
            $value = implode(', ', $value);
          }
          $value = token_replace($value, array('node' => $node), array('clear' => TRUE));
          $content .= '<news:' . $tag . '>' . check_plain($value) . '</news:' . $tag . '>';
        }
      }

      $content .= '</news:publication>';
      $content .= '<news:title>' . check_plain($node->title) . '</news:title>';
      $content .= '<news:publication_date>' . gmdate(DATE_W3C, $node->created) . '</news:publication_date>';
      $content .= '</news:news>';
      $content .= '</url>';
    }

    $content .= '</urlset>';

    // Cache the output for later.
    $timeout = time() + (intval(variable_get('googlenews_cache_timeout', 15)) * 60);
    cache_set($cid, $content, $timeout);
  }

  drupal_add_http_header('Content-Type', 'text/xml; charset=utf-8');
  print $content;
}
