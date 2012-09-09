<?php
/**
 * Implements hook_html_head_alter().
 * We are overwriting the default meta character type tag with HTML5 version.
 */
function gv_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

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
    return '<nav class="breadcrumb">' . $heading . implode(' » ', $breadcrumb) . '</nav>';
  }
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

/**
 * Override or insert variables into the page template.
 */
function gv_process_page(&$variables) {
  if(isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
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
//dpm($variables);
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
    $rss_teaser =   preg_replace('|\[video:.*(http://.*)\]|', '<a href="$1"> [Watch a video] </a>', $rss_teaser);
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


function gv_process_html(&$vars) {
  
  global $user;
  
  if ($user->uid == 1) {
    
      //dpm($vars);

      $before = array(
        "/>\s\s+/",
        "/\s\s+</",
        "/>\t+</",
        "/\s\s+(?=\w)/",
        "/(?<=\w)\s\s+/"
      );

      $after = array('> ', ' <', '> <', ' ', ' ');

      
      $test = '<div id="bshadow">       <div id="skip-link">          <a href="#main-content" class="element-invisible element-focusable">Skip    to 
        main content</a> 
        
<a href="#navigation" class="element-invisible element-focusable">Skip to navigation</a>       </div> <header id="header" role="banner" class="clearfix"> <nav id="navigation" role="navigation" class="clearfix"> <div id="header-menu-back"></div> <div id="logo-block"> <a href="/" title="GetVoIP Home" id="logo"> <img src="http://getvoip.com/sites/all/themes/gv_orange/css/images/getvoip-logo.png" alt="GetVoIP logo" title="GetVoIP Home" /> </a> <div class="descr"> <div class="title">2012 VOIP GUIDE</div> <div class="subtitle">SERVICE PROVIDER REVIEWS</div><div class="stars"><img src="/sites/all/themes/gv_orange/css/images/sprite-0.png" alt="VoIP Reviews" title="VoIP Reviews"/></div> </div> </div> <div id="block-gv-blocks-header-links"><div class="follow-us">Follow Us</div><ul class="header-links"><li><a href="https://twitter.com/#!/getvoipreviews" class="Twitter" title="Follow GetVoIP on Twitter" target="_blank">Twitter</a></li><li><a href="http://www.facebook.com/GetVoip" class="Facebook" title="Like GetVoIP on FaceBook" target="_blank">Facebook</a></li><li><a href="https://plus.google.com/102678795633763007140" class="GooglePlus" title="+1 GetVoIP on Google+" target="_blank">GooglePlus</a></li><li><a href="http://www.linkedin.com/groups/GetVoIPcom-4458404" class="LinkedIn" title="Join GetVoIP on LinkedIn" target="_blank">LinkedIn</a></li></ul></div><div class="region region-header"> <section id="block-om-maximenu-om-maximenu-1" class="block block-om-maximenu contextual-links-region odd first"> <div class="contextual-links-wrapper"><ul class="contextual-links"><li class="block-configure first last"><a href="/admin/structure/block/manage/om_maximenu/om-maximenu-1/configure?destination=node/38">Configure block</a></li> </ul></div> <div class="content"> <div id="om-maximenu-main-om-menu" class="om-maximenu om-maximenu-simple om-maximenu-block om-maximenu-row om-maximenu-block-down code-om-u1-939494773"> <div id="om-menu-main-om-menu-ul-wrapper" class="om-menu-ul-wrapper"> <ul id="om-menu-main-om-menu" class="om-menu"> <li id="om-leaf-om-u1-939494773-3" class="om-leaf first leaf-business-voip"> <a class="om-link link-business-voip" href="/compare-business-voip-providers">Business VoIP</a> <div class="om-maximenu-content om-maximenu-content-nofade closed"> <!-- <div class="om-maximenu-top"> <div class="om-maximenu-top-left"></div> <div class="om-maximenu-top-right"></div> </div> --> <!-- /.om-maximenu-top --> <div class="om-maximenu-middle"> <!-- <div class="om-maximenu-middle-left"> <div class="om-maximenu-middle-right"> --> <div class="block block-gv_blocks block-gv_blocks-id-main_menu_om_bus_voip first last"> <div class="content"><ul class="gv block lvl-0"><li><a href="/compare-business-voip-providers">Business VoIP Providers</a></li><li><a href="/sip-trunking-providers">SIP Trunking</a></li><li><a href="/business-voip-reviews">Business VoIP Reviews</a></li></ul></div> <div class="edit-block"><a href="/admin/structure/block/manage/gv_blocks/main_menu_om_bus_voip/configure?destination=node/38" title="Configure " class="block-config">configure</a></div></div><!-- /.block --> <div class="om-clearfix"></div>';
      dpm($test);
      //$test = preg_replace($before, $after, $test);
    
      
      $test = preg_replace(
          array(
              '/ {2,}/',
              '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s',
              
          ),
          array(
              ' ',
              '',
              
          ),
          $test
      );
      
      
      /*
      $search = array(
        '/\>[^\S ]+/s', //strip whitespaces after tags, except space
        '/[^\S ]+\</s', //strip whitespaces before tags, except space
        '/(\s)+/s'  // shorten multiple whitespace sequences
        );
      $replace = array(
          '>',
          '<',
          '\\1'
          );
      $test = preg_replace($search, $replace, $test);
      */
    
    
    
      dpm($test);
      
      
      // Page top.
      ////$page_top = $vars['page_top'];
      ////$page_top = preg_replace($before, $after, $page_top);
      //$vars['page_top'] = $page_top;

      // Page content.
      //if (!preg_match('/<pre|<textarea/', $vars['page'])) {
        //$page = $vars['page'];
        //dpr($page);
        //$page = preg_replace($before, $after, $page);
        //$vars['page'] = $page;
      //}

      // Page bottom.
      ////$page_bottom = $vars['page_bottom'];
      ////$page_bottom = preg_replace($before, $after, $page_bottom);
      //$vars['page_bottom'] = $page_bottom . drupal_get_js('footer');


      //dpm($page_top);
      //dpm($vars);
      //die;
      //dpm($page_bottom);

  }
  
}


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