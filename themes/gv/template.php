<?php


/**
 * Implements hook_preprocess_user_profile();
 */
/*
function gv_preprocess_user_profile(&$profile) {
  //dpm($profile);
}
*/


/**
 * Implements theme_link();
 * 
 * Add rel=nofollow to external links.
 */
function gv_link($variables) {
  //global $user;
  //if ($user->uid == 1 && $variables['path'] == 'http://click.websitegear.com/track/1883449' && strpos($variables['path'], 'ttp://') && !strpos($variables['path'], 'ttp://getvoip.com')) {
  if (strpos($variables['path'], '://') && !strpos($variables['path'], 'ttp://getvoip.com')) {
    //dpm($variables['path']);
    //dpm($variables);
    if (empty($variables['options']['attributes']['rel'])) {
      $variables['options']['attributes']['rel'] = 'nofollow';
    }
    else {
      
      if(is_array($variables['options']['attributes']['rel'])) {
        $rels = '';
        foreach($variables['options']['attributes']['rel'] as $rel) {
          $rels .= ($rels ? ' ' : '') . $rel;
        }
        $variables['options']['attributes']['rel'] = $rels;
      }

      if (strpos($variables['options']['attributes']['rel'], 'nofollow') === FALSE) {
        $variables['options']['attributes']['rel'] .= ' nofollow';
      }

    }
  }
  return '<a href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . '>' . ($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])) . '</a>';
}


/**
 * Implements hook_preprocess_user_picture();
 */
function gv_preprocess_user_picture(&$picture) {
  // Remove a link from a picture.
  if (!isset($picture['account']->picture->uri)) {
    return;
  }
  if (!empty($picture['account']->realname)) {
    $realname = $picture['account']->realname;
  }
  else {
    $userExtendedData = gv_misc_loadUserExtendedData($picture['account']->uid);
    $realname = $userExtendedData->realname;
  }
  $picture['user_picture'] = theme('image_style', array( 'path' =>  $picture['account']->picture->uri, 'style_name' => 'avatar_profile_page', 'alt' => $realname, 'title' => $realname, 'attributes' => array('rel' => 'v:photo')));
}


/**
 * Returns HTML for the "next page" link in a query pager.
 *
 * @param $variables
 *   An associative array containing:
 *   - text: The name (or image) of the link.
 *   - element: An optional integer to distinguish between multiple pagers on
 *     one page.
 *   - interval: The number of pages to move forward when the link is clicked.
 *   - parameters: An associative array of query string parameters to append to
 *     the pager links.
 *
 * @ingroup themeable
 */
function gv_pager_next($variables) {
  // Add a next rel metatag.
  $out = theme_pager_next($variables);
  if ($out) {
    $out_altered = str_replace('&amp;', '&', $out);
    if(preg_match('|.*href="([^"]*)" .*title="([^"]*)" .*|', $out_altered, $matches) && !empty($matches[1])) {
      
      //dpm('out in next = ' . $out_altered);
      //dpm($matches);

      if ($matches[2] == 'Go to next page') {
        gv_misc_addMetatag('next', NULL, $href = 'http://getvoip.com' . $matches[1]);
      }
    }
  }
  return $out;
}


/**
 * Returns HTML for the "previous page" link in a query pager.
 *
 * @param $variables
 *   An associative array containing:
 *   - text: The name (or image) of the link.
 *   - element: An optional integer to distinguish between multiple pagers on
 *     one page.
 *   - interval: The number of pages to move backward when the link is clicked.
 *   - parameters: An associative array of query string parameters to append to
 *     the pager links.
 *
 * @ingroup themeable
 */
function gv_pager_previous($variables) {
  // Add a prev rel metatag.
  $out = theme_pager_previous($variables);
  if ($out) {
    $out_altered = str_replace('&amp;', '&', $out);
    if(preg_match('|.*href="([^"]*)" .*title="([^"]*)" .*|', $out_altered, $matches) && !empty($matches[1])) {

      //dpm('out in prev = ' . $out_altered);
      //dpm($matches);
      
      if ($matches[2] == 'Go to previous page') {
        gv_misc_addMetatag('prev', NULL, $href = 'http://getvoip.com' . $matches[1]);
      }
      
    }
  }
  return $out;
}


/**
 * Returns HTML for a query pager.
 *
 * Menu callbacks that display paged query results should call theme('pager') to
 * retrieve a pager control so that users can view other results. Format a list
 * of nearby pages with additional query results.
 *
 * @param $variables
 *   An associative array containing:
 *   - tags: An array of labels for the controls in the pager.
 *   - element: An optional integer to distinguish between multiple pagers on
 *     one page.
 *   - parameters: An associative array of query string parameters to append to
 *     the pager links.
 *   - quantity: The number of pages in the list.
 *
 * @ingroup themeable
 */
function gv_pager($variables) {

  
  
  /*
  $altered_pager_reviews = array('/canada-voip', '/residential-voip-reviews', '/business-voip-reviews', '/providers/reviews');
  $altered_pager_posts = array('/about-voip-services', '/blog', '/news');
  
  if (@in_array($_SERVER['REDIRECT_URL'], $altered_pager_reviews)) {
    $newer_link_title = '‹ Newer Reviews';
    $older_link_title = 'Older Reviews ›';
  }
  elseif (arg(0) == 'user' || in_array(@$_SERVER['REDIRECT_URL'], $altered_pager_posts)) {
    $newer_link_title = '‹ Newer Posts';
    $older_link_title = 'Older Posts ›';
  }
  else {
    return theme_pager($variables);
  }
  */
  
  //dpm(arg());
  //dpm($_SERVER);
  
  $arg_0 = arg(0);
  $arg_1 = arg(1);
  $altered_pager_posts = array('user', 'news', 'blog', 'about-voip-services', 'taxonomy');
  $altered_pager_reviews = array(98, 429, 434, 581); // 581 - /canada-voip, 434 - /residential-voip-reviews, 429 - /business-voip-reviews, 98 - /providers/reviews
  
  if ((in_array($arg_0, $altered_pager_posts) && $arg_1 != 'tags-admin') || @$_SERVER['REDIRECT_URL'] == '/articles') {
    $newer_link_title = '‹ Newer Posts';
    $older_link_title = 'Older Posts ›';
  }
  elseif ( $arg_0 == 'node' && (in_array($arg_1, $altered_pager_reviews) || gv_misc_identifyNodeType($arg_1) == 'provider') ) {
    $newer_link_title = '‹ Newer Reviews';
    $older_link_title = 'Older Reviews ›';
  }
  else {
    return theme_pager($variables);
  }
  
  
  
  // Show only next/prev pager for user profile page.
//  $arg_0 = arg(0);
//  $altered_pager_pages = array('user', 'news', 'blog', 'about-voip-services');
//  //if ($arg_0 != 'user') {
//  if (!in_array($arg_0, $altered_pager_pages)) {
//    return theme_pager($variables);
//  }
  
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : $newer_link_title), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : $older_link_title), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  
  if ($li_previous) {
    $items[] = array(
      'class' => array('pager-previous'),
      'data' => $li_previous,
    );
    
//    if(preg_match('|.*href="(.*)"\s.*|', $li_previous, $matches) && !empty($matches[1])) {
//      gv_misc_addMetatag('prev', NULL, $href = 'http://getvoip.com' . $matches[1]);
//    }
    
  }
  if ($li_next) {
    
    $items[] = array(
      'class' => array('pager-next'),
      'data' => $li_next,
    );
    
//    if(preg_match('|.*href="(.*)"\s.*|', $li_next, $matches) && !empty($matches[1])) {
//      gv_misc_addMetatag('next', NULL, $href = 'http://getvoip.com' . $matches[1]);
//    }

  }
    
  
  if (empty($items)) {
    return NULL;
  }
  else {
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' 
          . theme('item_list', array(
            'items' => $items,
            'attributes' => array('class' => array('pager')),
          ));
  }
  
  
  
  
  
  // Original.
  /*
  
  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager')),
    ));
  }
  */
}


/**
 * Implements hook_preprocess_search_results().
 */
function gv_preprocess_search_results(&$variables) {
  
//  // a4s - fix - show lost pager from the results page on some pages.
//  // need prior actions (hack) in function node_search_execute() at node.module
//  // v1
//  //doesn't work correctly - it create bad links like http://getvoip.com/search/node/sip%20trunking?page=0%2C0%2C0%2C0%2C0%2C0%2C0%2C1
//  $variables['pager'] = theme('pager', array('tags' => NULL, 'element' => 7));

  
  
  // a4s - fix - show lost pager from the results page on some pages.
  // need prior actions (hack) in function node_search_execute() at node.module
  // v2
  global $gv_num_rows, $gv_limit_rows;
  
  if (!$gv_limit_rows) {
    $gv_limit_rows = 15;
  }
//  dpm('$gv_num_rows =' . $gv_num_rows, '$gv_limit_rows = ' . $gv_limit_rows);
//  dpm($_SESSION['gv_node_search_data']);
//  $page = pager_default_initialize($_SESSION['gv_node_search_data']['gv_num_rows'], $_SESSION['gv_node_search_data']['gv_limit_rows']);
  $page = pager_default_initialize($gv_num_rows, $gv_limit_rows);
  $variables['pager'] = theme('pager', array('tags' => NULL));
 
}


/**
 * Implements hook_html_head_alter().
 * We are overwriting the default meta character type tag with HTML5 version.
 */
function gv_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  
  // Set right order for main metatags.
  
  
  $head_elements['system_meta_content_type']['#weight'] = -8;
  
  
  if (isset($head_elements['metatag_description'])) {
    $head_elements['metatag_description']['#weight'] = -15;
  }
  if (isset($head_elements['description'])) {
    $head_elements['description']['#weight'] = -15;
  }
  if (isset($head_elements['metatag_keywords'])) {
    $head_elements['metatag_keywords']['#weight'] = -14;
  }
  if (isset($head_elements['keywords'])) {
    $head_elements['keywords']['#weight'] = -14;
  }
  if (isset($head_elements['news_keywords'])) {
    $head_elements['news_keywords']['#weight'] = -13;
  }

  
  
  // Quick fix for Metatag, where the local node metatag title for some reason doesnt apply to the page metatag title.
  // Hope it will be solved with the newer version of the Metatag module.
  if (!empty($head_elements['name']['#attributes']['content'])) {
    // Will be used in html.tpl.php
    global $altered_head_title;
    $altered_head_title = $head_elements['name']['#attributes']['content'];
  }
  
  
  
  
  
  $current_page = NULL;
  
  // Remove a canonical tag if there next or prev tags are present.
  if (!empty($head_elements['next']) || !empty($head_elements['prev'])) {
    unset($head_elements['metatag_canonical']);
    
    
    // Define the number of a current page.
    if (!empty($head_elements['next'])) {
      $next = explode('?', $head_elements['next']['#attributes']['href']);
      //dpm($next);
      foreach (explode('&', $next[1]) as $param) {
        $param = explode('=', $param);
        if ($param[0] == 'page') {
          $current_page = ($param[1] - 1) + 1;
          break;
        }
      }
    }
    else {
      $prev = explode('?', $head_elements['prev']['#attributes']['href']);
      if (isset($prev[1])) {
        foreach (explode('&', $prev[1]) as $param) {
          $param = explode('=', $param);
          if ($param[0] == 'page') {
            $current_page = ($param[1] + 1) + 1;
            break;
          }
        }
      }
      else {
        $current_page = 2;
      }
      
      
    }

    if ($current_page > 1) {
      
      // Define a current page title
      if (!empty($head_elements['name']['#attributes']['content'])) {
        $current_title = $head_elements['name']['#attributes']['content'];
      }
      else {
        $current_title = drupal_get_title();
      }

      $current_title = str_replace(' - GetVoIP', '', $current_title);

      // Will be used in html.tpl.php
      global $altered_head_title;
      
      $altered_head_title = $current_title . ' - Page ' . $current_page . ' - GetVoIP';
      
      if (isset($head_elements['metatag_description'])) {
        $head_elements['metatag_description']['#value'] = 'Page ' . $current_page . ' - ' . $head_elements['metatag_description']['#value'];
      }
      if (isset($head_elements['description'])) {
        $head_elements['description']['#attributes']['content'] = 'Page ' . $current_page . ' - ' . $head_elements['description']['#attributes']['content'];
      }
      //dpm('$altered_head_title = ' . $altered_head_title);
//      global $user;
//      if ($user->uid == 1) {
//        gv_misc_addMetatag('title', $altered_head_title);
//      }
    }
  }
  
  
  // Hide keywords metatag from all the site.
  if (isset($head_elements['metatag_keywords'])) {
    unset($head_elements['metatag_keywords']);
  }
  if (isset($head_elements['keywords'])) {
    unset($head_elements['keywords']);
  }
  if (isset($head_elements['news_keywords'])) {
    unset($head_elements['news_keywords']);
  }
  
  // Add a OG:Description metatag
  if (!empty($head_elements['metatag_description']['#value'])) {
    $head_elements['metatag_og_description'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
          'property' => 'og:description',
          'content' => $head_elements['metatag_description']['#value'],
      ),
    );
  }
  
 // <meta name="verify-a" value="5c21728cee5f71b74ae4"> 
//  $head_elements['verify-a'] = array(
//    '#type' => 'html_tag',
//    '#tag' => 'meta',
//    '#attributes' => array(
//        'name' => 'verify-a',
//        'value' => '5c21728cee5f71b74ae4',
//    ),
//  );
  
  // Remove tags 'dc:title' and 'sioc:num_replies' from pages
  if (isset($head_elements['rdf_node_title'])) {
    unset($head_elements['rdf_node_title']);
  }
  if (isset($head_elements['rdf_node_comment_count'])) {
    unset($head_elements['rdf_node_comment_count']);
  }
  
  // Add og:url by recomendation of Facebook's developer tool
  if (isset($head_elements['metatag_canonical'])) {
    $head_elements['og:url'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
          'property' => 'og:url',
          'content' => $head_elements['metatag_canonical']['#value'],
      ),
    );
  }
  
    //dpm($head_elements);  
}


/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function gv_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h3 class="element-invisible">' . t('Primary tabs') . '</h3>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h3 class="element-invisible">' . t('Secondary tabs') . '</h3>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}


/*
function gv_preprocess_breadcrumb(&$variables) {
  dpm($variables);
}
*/


/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function gv_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $heading = '<h3 class="element-invisible">' . t('You are here') . '</h3>';
    // Uncomment to add current page to breadcrumb
	// $breadcrumb[] = drupal_get_title();
    return '<nav itemprop="breadcrumb" class="breadcrumb">' . $heading . implode(' » ', $breadcrumb) . '</nav>';
  }
}


/**
 * Override or insert variables into the page template.
 */
function gv_process_page(&$variables) {
  
  //$variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => drupal_get_breadcrumb()));
  //array(l(t('Home'), NULL), l(t('Blogs'), 'blog'), l(t("!name's blog", array('!name' => format_username($node))), 'blog/' . $node->uid))
  
  if(isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
    
    if ($variables['node']->type == 'preface') {
      $pages_with_separate_tpl = array('page-compare-business-voip-providers', 'page-compare-pbx-voip-providers', 'page-compare-residential-voip-providers', 'page-compare-sip-voip-providers', 'page-compare-cc-voip-providers', 'view-reviews-page_all_reviews');
      if (in_array(@$variables['node']->field_preface_key['und'][0]['value'], $pages_with_separate_tpl) && arg(2) != 'edit') {
        $variables['theme_hook_suggestions'][] = 'page__compare_providers';
      }
    }
            
    if ($variables['node']->type == 'quote') {
      drupal_add_css(path_to_theme() . '/css/iframes-n-quotes.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
    }
    
  }
  elseif (arg(0) == 'get' && @arg(1) == 'iframe') {
    module_invoke('admin_menu', 'suppress');
    $variables['theme_hook_suggestions'][] = 'page__url__iframe';
    drupal_add_css(path_to_theme() . '/css/iframes-n-quotes.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
  }
  
  
  // Set breadcrumb
  gv_misc_setBreadcrumbs($variables);
  
  
  
  // Add js to pages.
  
  // set a user referer on every page.
  $module_path_misc = drupal_get_path('module', 'gv_misc');
  drupal_add_js( $module_path_misc . '/js/gv_setReferer.js'); 
  
  //drupal_add_js( $module_path_misc . '/js/gv_add_adroll.js'); 
  //drupal_add_js( $module_path_misc . '/js/gv_add_fb.js'); 
  
  
  // JS for comparing providers functionality on pages ehere appropriate views are cached and therefore have not loaded js itselves within views.
  $pages_with_compare_provider_functionality = array('/providers/reviews');
  if ($_SERVER['REQUEST_URI'] == '/' || in_array(@$_SERVER['REDIRECT_URL'], $pages_with_compare_provider_functionality)) {
    $module_path_pages = drupal_get_path('module', 'gv_misc');
    drupal_add_js( $module_path_pages . '/js/gv_compareProviders.js'); 
  }
  
  
  /* Add Google's fonts */
  //gv_misc_addMetatag('stylesheet', NULL, 'http://fonts.googleapis.com/css?family=Open+Sans', 'NA', 'text/css');
  //gv_misc_addMetatag('stylesheet', NULL, 'http://fonts.googleapis.com/css?family=Open+Sans|Ubuntu:500italic', 'NA', 'text/css');
  // Cufon's, via font-face
  //drupal_add_css(path_to_theme() . '/css/remote-fonts.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE));
  
  
  //gv_misc_addMetatag('stylesheet', NULL, 'http://fonts.googleapis.com/css?family=Open+Sans|Ubuntu:500', 'NA', 'text/css');
  gv_misc_addMetatag('stylesheet', NULL, 'http://fonts.googleapis.com/css?family=Open+Sans:normal,bold|Ubuntu:500', 'NA', 'text/css');
  
  
  // Add the font-awesome icons font.
  drupal_add_css('sites/all/libraries/fonts/font-awesome/css/font-awesome.min.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE)); // array('group' => CSS_THEME, 'preprocess' => FALSE)

  // Adding this css will break a little bit a styling on the page!
//  global $user;
//  if ($user->uid == 1) {
//    // Add a twitter-bootstrap styles.
//    //gv_misc_addMetatag('stylesheet', NULL, '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css', 'NA', 'text/css');
//    drupal_add_css('sites/all/libraries/twitter-bootstrap/css/bootstrap-combined.no-icons.min.css', array('group' => CSS_DEFAULT, 'every_page' => TRUE)); // array('group' => CSS_THEME, 'preprocess' => FALSE)
//  }
  
  
  
    // Set NoIndex tag for some paginated main articles and user pages.
    $pages_to_noindex = array('blog', 'news', 'library');
    if ( (in_array($_GET['q'], $pages_to_noindex) || strpos($_SERVER['REQUEST_URI'], 'staff/')) && !empty($_GET['page']) ) {
      gv_misc_addMetatag('robots', 'noindex');
    }
    
  
}


/**
 * Override or insert variables into the node template.
 */
function gv_preprocess_node(&$variables) {
  $variables['submitted'] = t('Published by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  if(isset($variables['node'])) {
    
    if($variables['node']->type == 'blog_post' || $variables['node']->type == 'news_post') {
      $variables['theme_hook_suggestions'][] = 'node__article';
    }
    elseif($variables['node']->type == 'webform') {
      $variables['theme_hook_suggestions'][] = 'node__admin_page';
    }
    elseif($variables['node']->type == 'quote' && ($variables['node']->title == 'Request a Quote page v2' || $variables['node']->title == 'Request a Quote page v2 Final') ) {
      $variables['theme_hook_suggestions'][] = 'node__quote__v2';
    }
    elseif($variables['node']->type == 'quote' && ($variables['node']->title == 'Request a Quote page v3' || $variables['node']->title == 'Request a Quote page v3 Final') ) {
        
//        global $user;
//        if ($user->uid != 1) {
        global $body_classes_add;
        $body_classes_add['quote_page'] = 'quote-page v33';
        $variables['theme_hook_suggestions'][] = 'node__quote__v33';
//        }
//        else {
//        $variables['theme_hook_suggestions'][] = 'node__quote__v3';
//        }

    }
    elseif($variables['node']->type == 'quote' && ($variables['node']->title == 'Request a Quote page v4' || $variables['node']->title == 'Request a Quote page v4 Final') ) {
        global $body_classes_add;
        $body_classes_add['quote_page'] = 'quote-page v4';
        $variables['theme_hook_suggestions'][] = 'node__quote__v4';
    }
    // Speed test page have its own template
    elseif($variables['node']->type == 'preface' && @$variables['node']->field_preface_key['und'][0]['value'] == 'voip-speed-test') {
      $variables['theme_hook_suggestions'][] = 'node__preface__voip_speed_test';
    }
    // Custom 404 page.
    elseif($variables['node']->type == 'preface' && @$variables['node']->field_preface_key['und'][0]['value'] == 'page-not-found') {
      $variables['theme_hook_suggestions'][] = 'node__preface__page404';
    }
    
  }
  
}


/**
 * Preprocess variables for region.tpl.php
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
function gv_preprocess_region(&$variables, $hook) {
  // Use a bare template for the content region.
  if ($variables['region'] == 'content') {
    $variables['theme_hook_suggestions'][] = 'region__bare';
  }
}


/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function gv_preprocess_block(&$variables, $hook) {
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__bare';
  }

  $variables['title_attributes_array']['class'][] = 'block-title';
}


/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function gv_process_block(&$variables, $hook) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;
}

/**
 * Changes the search form to use the "search" input element of HTML5.
 */
function gv_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}

/**
 * Changes the search button label. Here... because it doesn't work via module hook.
 */
function gv_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    
    $form['actions']['submit']['#value'] = '';
    
    // Autohiding hint.
    $default_search_text = t('Search Site Here');
    $form['search_block_form']['#default_value'] = $default_search_text;
    $form['default_text']['#default_value'] = $default_search_text;
    // Cause a fatal error without it for anonymous.
    $form['default_text']['#type'] = 'hidden';
    
    
    // Example! Does NOT work!!! The above one works!
    //$form['search_block_form']['#value'] = t($default_search_text); // Set a default value for the textfield
    
    // Add extra attributes to the text box
    // Without this a hint autohiding will not work for anonymous.
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '$default_search_text';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '$default_search_text') {this.value = '';}";
  }
}


function gv_username($object) {
  return str_replace(' ('. t('not verified') .')', '', theme_username($object));
}


/**
* Default theme function for all RSS rows.
*/
function gv_preprocess_views_view_rss(&$vars) {
  $namespaces = $vars['view']->style_plugin->namespaces;
  
  // Clear doubled xmlns
  foreach ($namespaces as $key => $value) {
    if (strpos($key, 'xmlns:xmlns') !== FALSE) {
      unset($namespaces[$key]);
      $namespaces[str_replace('xmlns:xmlns', 'xmlns', $key)] = $value;
    }
  }
  
  $disabled_namespaces = array('content', 'dc', 'foaf', 'og', 'rdfs', 'sioc', 'sioct', 'skos', 'xsd', 'xmlns:addthis');
  foreach ($disabled_namespaces as $disabled_namespace) {
    if (isset($namespaces[$disabled_namespace])) {
      unset($namespaces[$disabled_namespace]);
    }
  }
  
  $vars['namespaces'] = '';
  foreach ($namespaces as $key => $value) {
    $vars['namespaces'] .= ' ' . $key . '="' . $value . '"';
  }
  
}


/**
* Default theme function for all RSS rows.
*/
function gv_preprocess_views_view_row_rss(&$vars) {
  
  $node = $vars['view']->style_plugin->row_plugin->nodes[$vars['row']->nid];
  //$vars['description'] = check_plain(htmlspecialchars_decode($node->field_a_teaser['und'][0]['value']));
  if (isset($node->body['und'][0]['value'])) {
    $rss_teaser = gv_misc_getArticleTeaserData('all', $node->body['und'][0]['value'], $vars['row']->nid, 400, TRUE);
    // Clear attribute typeof="foaf:Image" from the img tag (which iss added by the core rdf module via hook_preprocess_image).
    $rss_teaser = preg_replace('|typeof="foaf:Image" |', '', $rss_teaser);
    // Convert relative links to absolute.
    $rss_teaser = preg_replace('|href="/|', 'href="http://getvoip.com/', $rss_teaser);
    // Restore a normal state of a YouTube url from a token.
    // [video: http://www.youtube.com/watch?v=SoMS77zE7iE]
    $rss_teaser =   preg_replace('|\[video:.*(http.*)\]|', '<a href="$1"> [Watch a video] </a>', $rss_teaser);
    $vars['description'] = check_plain(htmlspecialchars_decode($rss_teaser));
  }
  
  // Replace username with real user name for <dc:creator>
  $vars['item_elements'] = preg_replace('|<dc:creator>.*</dc:creator>|', '<dc:creator>' . gv_misc_getUserRealName($node->uid) . '</dc:creator>', $vars['item_elements']);
}


/**
 * Display the simple view of rows one after another
 */
/*
function gv_preprocess_views_view_unformatted(&$vars) {
  
  if( ($vars['view']->name == 'blog' || $vars['view']->name == 'news') && $vars['view']->current_display == 'page') {
    $vars['theme_hook_suggestions'][] = 'views-view-unformatted__blog__page';
    $vars['theme_hook_suggestion'] = 'views-view-unformatted__blog__page';
    dpm($vars);
  }
  
  
}
*/


/**
 * Theme function for a CAPTCHA element.
 * 
 * a4s rename CAPTCHA to Captcha
 *
 * Render it in a fieldset if a description of the CAPTCHA
 * is available. Render it as is otherwise.
 */
/*
function gv_captcha($variables) {
  $element = $variables['element'];
  if (!empty($element['#description']) && isset($element['captcha_widgets'])) {
    $fieldset = array(
      '#type' => 'fieldset',
      '#title' => t('Captcha'),
      '#description' => $element['#description'],
      '#children' => drupal_render_children($element),
      '#attributes' => array('class' => array('captcha')),
    );
    return theme('fieldset', array('element' => $fieldset));
  }
  else {
    return '<div class="captcha">' . drupal_render_children($element) . '</div>';
  }
}
*/


/**
 * Preprocess the primary theme implementation for a view.
 */
/*
function gv_preprocess_views_view(&$vars) {
  
  // I set title for preface (at gv_misc_views_pre_render(&$view)) instead of a view itself.
//  if ($vars['view']->current_display == 'page_by_tag') {
//    if (!$vars['title']) {
//      $vars['title'] = '<h1>' . $vars['view']->get_title() . '</h1>'; //str_replace('%1', $vars['view']->build_info['substitutions']['%1'], $vars['view']->build_info['title']); 
//    }  
//  }

  // hasn't worked out to make use one temlate for different views unformatted
  
  if (isset($vars['view']->name) && ($vars['view']->name == 'blog' || $vars['view']->name == 'news') ) {
    $function = 'gv_preprocess_views_view_unformatted'; 
    if (function_exists($function)) {
     $function($vars);
    }
  }
  
}
*/



function gv_preprocess_html(&$variables) {

  // Add sidebar-second class to a body in case of sidebar-second under the chart.
  // And remove no-sidebars class.
  if (!empty($variables['page']['sidebar_second_below_chart']) && ($key = array_search('no-sidebars', $variables['classes_array'])) !== FALSE) {
    unset($variables['classes_array'][$key]);
    $variables['classes_array'][] = 'one-sidebar sidebar-second no-top-sidebar-second';
  }
 
  
  //dpm($variables);
  //global $user;
  //if ($user->uid == 1) {
//    foreach ($variables['page']['content']['system_main']['nodes'] as $key => $html) {
//      //dpr($html['body']['#object']->rdf_mapping);
//      if (isset($variables['page']['content']['system_main']['nodes'][$key]['body']['#object']->rdf_mapping['comment_count']['datatype'])) {
//        unset($variables['page']['content']['system_main']['nodes'][$key]['body']['#object']->rdf_mapping['comment_count']['datatype']);
//      }
//      //dpr($variables['page']['content']['system_main']['nodes'][$key]['body']['#object']->rdf_mapping);
//    }
    //die;
  //}

}
 



/**
 *  a4s fix. Allow html in labels.
 * 
 *  Original in views/theme/theme.inc
 * 
 * Display a view as a table style.
 */
function gv_preprocess_views_view_table(&$vars) {
  $view     = $vars['view'];

  // We need the raw data for this grouping, which is passed in as $vars['rows'].
  // However, the template also needs to use for the rendered fields.  We
  // therefore swap the raw data out to a new variable and reset $vars['rows']
  // so that it can get rebuilt.
  // Store rows so that they may be used by further preprocess functions.
  $result   = $vars['result'] = $vars['rows'];
  $vars['rows'] = array();
  $vars['field_classes'] = array();
  $vars['header'] = array();

  $options  = $view->style_plugin->options;
  $handler  = $view->style_plugin;

  $default_row_class = isset($options['default_row_class']) ? $options['default_row_class'] : TRUE;
  $row_class_special = isset($options['row_class_special']) ? $options['row_class_special'] : TRUE;

  $fields   = &$view->field;
  $columns  = $handler->sanitize_columns($options['columns'], $fields);

  $active   = !empty($handler->active) ? $handler->active : '';
  $order    = !empty($handler->order) ? $handler->order : 'asc';

  $query    = tablesort_get_query_parameters();
  if (isset($view->exposed_raw_input)) {
    $query += $view->exposed_raw_input;
  }

  // Fields must be rendered in order as of Views 2.3, so we will pre-render
  // everything.
  $renders = $handler->render_fields($result);

  foreach ($columns as $field => $column) {
    // Create a second variable so we can easily find what fields we have and what the
    // CSS classes should be.
    $vars['fields'][$field] = drupal_clean_css_identifier($field);
    if ($active == $field) {
      $vars['fields'][$field] .= ' active';
    }

    // render the header labels
    if ($field == $column && empty($fields[$field]->options['exclude'])) {
      
      // a4s fix. Allow html in labels.
      //$label = check_plain(!empty($fields[$field]) ? $fields[$field]->label() : '');
      $label = !empty($fields[$field]) ? $fields[$field]->label() : '';

      
      if (empty($options['info'][$field]['sortable']) || !$fields[$field]->click_sortable()) {
        $vars['header'][$field] = $label;
      }
      else {
        $initial = !empty($options['info'][$field]['default_sort_order']) ? $options['info'][$field]['default_sort_order'] : 'asc';

        if ($active == $field) {
          $initial = ($order == 'asc') ? 'desc' : 'asc';
        }

        $title = t('sort by @s', array('@s' => $label));
        if ($active == $field) {
          $label .= theme('tablesort_indicator', array('style' => $initial));
        }

        $query['order'] = $field;
        $query['sort'] = $initial;
        $link_options = array(
          'html' => TRUE,
          'attributes' => array('title' => $title),
          'query' => $query,
        );
        $vars['header'][$field] = l($label, $_GET['q'], $link_options);
      }

      $vars['header_classes'][$field] = '';
      // Set up the header label class.
      if ($fields[$field]->options['element_default_classes']) {
        $vars['header_classes'][$field] .= "views-field views-field-" . $vars['fields'][$field];
      }
      $class = $fields[$field]->element_label_classes(0);
      if ($class) {
        if ($vars['header_classes'][$field]) {
          $vars['header_classes'][$field] .= ' ';
        }
        $vars['header_classes'][$field] .= $class;
      }
      // Add a CSS align class to each field if one was set
      if (!empty($options['info'][$field]['align'])) {
        $vars['header_classes'][$field] .= ' ' . drupal_clean_css_identifier($options['info'][$field]['align']);
      }

      // Add a header label wrapper if one was selected.
      if ($vars['header'][$field]) {
        $element_label_type = $fields[$field]->element_label_type(TRUE, TRUE);
        if ($element_label_type) {
          $vars['header'][$field] = '<' . $element_label_type . '>' . $vars['header'][$field] . '</' . $element_label_type . '>';
        }
      }

    }

    // Add a CSS align class to each field if one was set
    if (!empty($options['info'][$field]['align'])) {
      $vars['fields'][$field] .= ' ' . drupal_clean_css_identifier($options['info'][$field]['align']);
    }

    // Render each field into its appropriate column.
    foreach ($result as $num => $row) {
      // Add field classes
      $vars['field_classes'][$field][$num] = '';
      if ($fields[$field]->options['element_default_classes']) {
        $vars['field_classes'][$field][$num] = "views-field views-field-" . $vars['fields'][$field];
      }
      if ($classes = $fields[$field]->element_classes($num)) {
        if ($vars['field_classes'][$field][$num]) {
          $vars['field_classes'][$field][$num] .= ' ';
        }

        $vars['field_classes'][$field][$num] .= $classes;
      }
      $vars['field_attributes'][$field][$num] = array();

      if (!empty($fields[$field]) && empty($fields[$field]->options['exclude'])) {
        $field_output = $renders[$num][$field];
        $element_type = $fields[$field]->element_type(TRUE, TRUE);
        if ($element_type) {
          $field_output = '<' . $element_type . '>' . $field_output . '</' . $element_type . '>';
        }

        // Don't bother with separators and stuff if the field does not show up.
        if (empty($field_output) && !empty($vars['rows'][$num][$column])) {
          continue;
        }

        // Place the field into the column, along with an optional separator.
        if (!empty($vars['rows'][$num][$column])) {
          if (!empty($options['info'][$column]['separator'])) {
            $vars['rows'][$num][$column] .= filter_xss_admin($options['info'][$column]['separator']);
          }
        }
        else {
          $vars['rows'][$num][$column] = '';
        }

        $vars['rows'][$num][$column] .= $field_output;
      }
    }

    // Remove columns if the option is hide empty column is checked and the field is not empty.
    if (!empty($options['info'][$field]['empty_column'])) {
      $empty = TRUE;
      foreach ($vars['rows'] as $num => $columns) {
        $empty &= empty($columns[$column]);
      }
      if ($empty) {
        foreach ($vars['rows'] as $num => &$column_items) {
          unset($column_items[$column]);
          unset($vars['header'][$column]);
        }
      }
    }
  }

  // Hide table header if all labels are empty.
  if (!array_filter($vars['header'])) {
    $vars['header'] = array();
  }

  $count = 0;
  foreach ($vars['rows'] as $num => $row) {
    $vars['row_classes'][$num] = array();
    if ($row_class_special) {
      $vars['row_classes'][$num][] = ($count++ % 2 == 0) ? 'odd' : 'even';
    }
    if ($row_class = $handler->get_row_class($num)) {
      $vars['row_classes'][$num][] = $row_class;
    }
  }

  if ($row_class_special) {
    $vars['row_classes'][0][] = 'views-row-first';
    $vars['row_classes'][count($vars['row_classes']) - 1][] = 'views-row-last';
  }

  $vars['classes_array'] = array('views-table');
  if (empty($vars['rows']) && !empty($options['empty_table'])) {
    $vars['rows'][0][0] = $view->display_handler->render_area('empty');
    // Calculate the amounts of rows with output.
    $vars['field_attributes'][0][0]['colspan'] = count($vars['header']);
    $vars['field_classes'][0][0] = 'views-empty';
  }


  if (!empty($options['sticky'])) {
    drupal_add_js('misc/tableheader.js');
    $vars['classes_array'][] = "sticky-enabled";
  }
  $vars['classes_array'][] = 'cols-'. count($vars['header']);

  // Add the summary to the list if set.
  if (!empty($handler->options['summary'])) {
    $vars['attributes_array'] = array('summary' => filter_xss_admin($handler->options['summary']));
  }

  // Add the caption to the list if set.
  if (!empty($handler->options['caption'])) {
    $vars['caption'] = filter_xss_admin($handler->options['caption']);
  }
  else {
    $vars['caption'] = '';
  }
}

