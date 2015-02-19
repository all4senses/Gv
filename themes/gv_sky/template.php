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

  // Merge in defaults.
  $options += array(
    'attributes' => array(),
    'html' => FALSE,
  );

  // Append active class.
  if (($path == $_GET ['q'] || ($path == '<front>' && drupal_is_front_page())) && 
    (empty($options ['language']) || $options ['language']->language == $language_url->language)) {
    $options ['attributes']['class'][] = 'active';
  }

  // Remove all HTML and PHP tags from a tooltip. For best performance, we act only
  // if a quick strpos() pre-check gave a suspicion (because strip_tags() is expensive).
  if (isset($options ['attributes']['title']) && strpos($options ['attributes']['title'], '<') !== FALSE) {
    $options ['attributes']['title'] = strip_tags($options ['attributes']['title']);
  }

  // Determine if rendering of the link is to be done with a theme function
  // or the inline default. Inline is faster, but if the theme system has been
  // loaded and a module or theme implements a preprocess or process function
  // or overrides the theme_link() function, then invoke theme(). Preliminary
  // benchmarks indicate that invoking theme() can slow down the l() function
  // by 20% or more, and that some of the link-heavy Drupal pages spend more
  // than 10% of the total page request time in the l() function.
  if (!isset($use_theme) && function_exists('theme')) {
    // Allow edge cases to prevent theme initialization and force inline link
    // rendering.
    if (variable_get('theme_link', TRUE)) {
      drupal_theme_initialize();
      $registry = theme_get_registry(FALSE);
      // We don't want to duplicate functionality that's in theme(), so any
      // hint of a module or theme doing anything at all special with the 'link'
      // theme hook should simply result in theme() being called. This includes
      // the overriding of theme_link() with an alternate function or template,
      // the presence of preprocess or process functions, or the presence of
      // include files.
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