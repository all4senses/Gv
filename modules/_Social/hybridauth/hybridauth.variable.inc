<?php
/**
 * @file
 * Variable module integration for the HybridAuth module.
 */

/**
 * Implements hook_variable_info().
 */
function hybridauth_variable_info($options = array()) {
  $variables['hybridauth_widget_title'] = array(
    'title' => t('HybridAuth widget title', array(), $options),
    'description' => t('This is the text title placed above the icons list', array(), $options),
    'type' => 'string',
    'default' => 'Or log in with...',
    'localize' => TRUE,
  );
  return $variables;
}
