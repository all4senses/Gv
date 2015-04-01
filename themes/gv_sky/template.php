<?php


function gv_sky_preprocess_html(&$vars) {
  
}

/**
 * Override or insert variables into the block templates.
 */
function gv_sky_preprocess_block(&$vars) {

 // add odd/even zebra classes into the array of classes
  $vars['classes_array'][] = $vars['block_zebra'];
  if ($vars['block_id'] == 1) {
    $vars['classes_array'][] = 'first';
  }
}

function gv_sky_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = gv_sky_l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function gv_sky_theme_links(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = gv_sky_l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function gv_sky_l($text, $path, array $options = array()) {
  global $language_url;
  static $use_theme = NULL;

  $options += array(
    'attributes' => array(),
    'html' => FALSE,
  );

  if (($path == $_GET ['q'] || ($path == '<front>' && drupal_is_front_page())) && 
    (empty($options ['language']) || $options ['language']->language == $language_url->language)) {
    $options ['attributes']['class'][] = 'active';
  }

  if (isset($options ['attributes']['title']) && strpos($options ['attributes']['title'], '<') !== FALSE) {
    $options ['attributes']['title'] = strip_tags($options ['attributes']['title']);
  }


  if (!isset($use_theme) && function_exists('theme')) {

    if (variable_get('theme_link', TRUE)) {
      drupal_theme_initialize();
      $registry = theme_get_registry(FALSE);

      $use_theme = !isset($registry ['link']['function']) || ($registry ['link']['function'] != 'theme_link');
      $use_theme = $use_theme || !empty($registry ['link']['preprocess functions']) || !empty($registry ['link']['process functions']) || !empty($registry ['link']['includes']);
    }
    else {
      $use_theme = FALSE;
    }
  }
  if ($use_theme) {
    // return theme('link', array('text' => $text, 'path' => $path, 'options' => $options));
  }
  return '<a class="main-menu-item-link" href="' . check_plain(url($path, $options)) . '"' . drupal_attributes($options ['attributes']) . '><span class="main-menu-item-link-text">' . ($options ['html'] ? $text : check_plain($text)) . '</span></a>';
}

  function dk_shorten_title($title){
    $temp = strlen($title);

    if ($temp > 60) {
      return substr($title, 0, 50) . '...';
    } else {
      return $title;
    }
  }

  function dk_shorten_body($text){
    $temp = strlen($text);

    if ($temp > 115) {
      return substr($text, 0, 115) . '...';
    } else {
      return $text;
    }
  }
