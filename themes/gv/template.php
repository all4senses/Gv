<?php

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

  //dpm(arg());
  //dpm($_SERVER);
  
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
  
  $arg_0 = arg(0);
  $arg_1 = arg(1);
  $altered_pager_posts = array('user', 'news', 'blog', 'about-voip-services');
  $altered_pager_reviews = array(98, 429, 434, 581); // 581 - /canada-voip, 434 - /residential-voip-reviews, 429 - /business-voip-reviews, 98 - /providers/reviews
  
  if (in_array($arg_0, $altered_pager_posts)) {
    $newer_link_title = '‹ Newer Posts';
    $older_link_title = 'Older Posts ›';
  }
  elseif ($arg_0 == 'node' && in_array($arg_1, $altered_pager_reviews)) {
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
  }
  if ($li_next) {
    $items[] = array(
      'class' => array('pager-next'),
      'data' => $li_next,
    );
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
    return '<nav class="breadcrumb">' . $heading . implode(' » ', $breadcrumb) . ' » </nav>';
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
  }
  elseif (@arg(0) == 'get' && @arg(1) == 'iframe') {
    module_invoke('admin_menu', 'suppress');
    $variables['theme_hook_suggestions'][] = 'page__url__iframe';
  }
  
  
  // Set breadcrumb
  $tags_cloud_pages = array('/articles/tags', '/blog/tags', '/news/tags');
  $not_teasers_types = array('preface', 'admin_page', 'page', 'quote', 'webform');
  
  if(@$_SERVER['REQUEST_URI'] == '/') {
    ; // Home page has no bredcrumb.
  }
  elseif(isset($variables['node']) && !in_array($variables['node']->type, $not_teasers_types) ) {
    //dpm($variables['node']);
    //dpm('teasers node------------');
    switch ($variables['node']->type) {
      case 'provider':
        break;
      case 'review':
        break;
      case 'phone_review':
        break;
      
      case 'article':
        $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('VoIP Library', 'about-voip-services'), $variables['node']->title )));
        break;
      case 'news_post':
        $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('News', 'news'), $variables['node']->title )));
        break;
      case 'blog_post':
        $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('Blog', 'blog'), $variables['node']->title )));
        break;
    }
  }
  /*
  elseif(in_array(@$_SERVER['REQUEST_URI'], $tags_cloud_pages)) {
    //dpm('Tags cloud page ------------');
    switch ($_SERVER['REQUEST_URI']) {
      case '/articles/tags':
        $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('VoIP Library articles', 'about-voip-services') )));
        break;
      case '/blog/tags':
        $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('Blog', 'blog') )));
        break;
      case '/news/tags':
        $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('News', 'news') )));
        break;
    }
  }
  elseif(strpos(@$_SERVER['REQUEST_URI'], '/tags/') != FALSE) {
    //dpm('Tag page ------------');
    if(strpos($_SERVER['REQUEST_URI'], 'articles/tags/') != FALSE) {
      $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('VoIP Library articles', 'about-voip-services'), l('Articles tags', 'articles/tags') )));
    }
    elseif (strpos($_SERVER['REQUEST_URI'], 'blog/tags/') != FALSE) {
      $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('Blog', 'blog'), l('Blog tags', 'blog/tags') )));
    }
    else {
      $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), l('News', 'news'), l('News tags', 'news/tags') )));
    }
  }
  */
  elseif ($menu_trail = gv_misc_getMenuTrail(@$_SERVER['REQUEST_URI'])) {
    //dpm('Page VIA MENU------------');
    $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL) )));
  }
  elseif (isset($variables['node'])) {
    //dpm('Any other page------------');
    $variables['breadcrumb'] = theme('breadcrumb', array('breadcrumb' => array(l('Home', NULL), $variables['node']->title )));
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
      $variables['theme_hook_suggestions'][] = 'node__quote__v3';
    }
    // Speed test page have its own template
    elseif($variables['node']->type == 'preface' && @$variables['node']->field_preface_key['und'][0]['value'] == 'voip-speed-test') {
      $variables['theme_hook_suggestions'][] = 'node__preface__voip_speed_test';
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


/*
function gv_preprocess_html(&$variables) {
  //dpm($variables);
  //global $user;
  //if ($user->uid == 1) {
    foreach ($variables['page']['content']['system_main']['nodes'] as $key => $html) {
      //dpr($html['body']['#object']->rdf_mapping);
      if (isset($variables['page']['content']['system_main']['nodes'][$key]['body']['#object']->rdf_mapping['comment_count']['datatype'])) {
        unset($variables['page']['content']['system_main']['nodes'][$key]['body']['#object']->rdf_mapping['comment_count']['datatype']);
      }
      //dpr($variables['page']['content']['system_main']['nodes'][$key]['body']['#object']->rdf_mapping);
    }
    //die;
  //}

}
 
*/