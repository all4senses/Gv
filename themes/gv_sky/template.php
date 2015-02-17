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

