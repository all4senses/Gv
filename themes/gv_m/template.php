<?php


  
function gv_m_preprocess_html(&$vars) {
 
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


}

function gv_m_preprocess_block(&$vars) {
 // add odd/even zebra classes into the array of classes
  $vars['classes_array'][] = $vars['block_zebra'];
  if ($vars['block_id'] == 1) {
    $vars['classes_array'][] = 'first';
  }
}
