<?php

/**
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 2. Uncomment the required function to use.
 * 3. Read carefully, especially within gv_blue_preprocess_html(), there
 *    are extra goodies you might want to leverage such as a very simple way of adding
 *    stylesheets for Internet Explorer and a browser detection script to add body classes.
 */


function gv_blue_preprocess_html(&$vars) {
  // Load the media queries styles
  // Remember to rename these files to match the names used here - they are
  // in the CSS directory of your subtheme.
//  $media_queries_css = array(
//    'gv_blue.responsive.style.css',
//    'gv_blue.responsive.gpanels.css'
//  );
//  load_subtheme_media_queries($media_queries_css, 'gv_blue');


//  * Load IE Stylesheets
//  *
//  * AT automates adding IE stylesheets, simply add to the array using
//  * the conditional comment as the key and the stylesheet name as the value.
//  *
//  * See our online help: http://adaptivethemes.com/documentation/working-with-internet-explorer
//  *
//  * For example to add a stylesheet for IE8 only use:
//  *
//  *  'IE 8' => 'ie-8.css',
//  *
//  * Your IE CSS file must be in the /css/ directory in your subtheme.
  
//  Uncomment to add a conditional stylesheet for IE 7 or less.
//  $ie_files = array(
//    'lte IE 7' => 'ie-lte-7.css',
//  );
//  load_subtheme_ie_styles($ie_files, 'gv_blue');

  
  // Add class for the active theme name
  // Uncomment to add a class for the active theme name.
  //$vars['classes_array'][] = drupal_html_class($theme_key);
  
  // Works!
  global $user;
  if ($user->uid == 1 || ($user->uid && in_array('administrator', $user->roles)) ) {
    $vars['classes_array'][] = 'admin';
  }
  elseif ($user->uid && in_array('writer', $user->roles) ) {
    $vars['classes_array'][] = 'writer';
  }
  else {
    $vars['classes_array'][] = 'not-admin';
  }
  
  global $body_classes_add;
  if (!empty($body_classes_add)) {
    $vars['classes_array'] += $body_classes_add;
  }

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  //Uncomment to add a classes for the browser and platform.
  //$vars['classes_array'][] = css_browser_selector();

}
// */


/* -- Delete this line if you want to use this function
function gv_blue_process_html(&$vars) {
}
// */

/**
 * Override or insert variables into the page templates.
 */
/* -- Delete this line if you want to use this function
function gv_blue_preprocess_page(&$vars) {
}

function gv_blue_process_page(&$vars) {
}
// */

/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function gv_blue_preprocess_node(&$vars) {
}

function gv_blue_process_node(&$vars) {
}
// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function gv_blue_preprocess_comment(&$vars) {
}

function gv_blue_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
function gv_blue_preprocess_block(&$vars) {
 // add odd/even zebra classes into the array of classes
  $vars['classes_array'][] = $vars['block_zebra'];
  if ($vars['block_id'] == 1) {
    $vars['classes_array'][] = 'first';
  }
}

/* -- Delete this line if you want to use these function
function gv_blue_process_block(&$vars) {
}
// */

