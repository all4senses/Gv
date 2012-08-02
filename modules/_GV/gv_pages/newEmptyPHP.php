<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



function alter() {
  
  
  
      $service_types = unserialize(SERVICE_TYPES);
      $service_descriptions = unserialize(SERVICE_DESCRIPTIONS);
      $fee_types = unserialize(FEE_TYPES);
      
      
      
      $form['s'] = array(
        '#type' => 'fieldset',
        '#title' => t('Provider services'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
        '#tree' => TRUE,
        '#weight' => 12,
      );
            foreach ($service_types as $service_type => $service_type_short) {
              
              $form['s'][$service_type_short] = array(
                '#type' => 'fieldset',
                '#title' => t("$service_type serviсes"),
                '#collapsible' => TRUE,
                '#collapsed' => TRUE,
              );
                  
              
                  // Descriptions fields
                  foreach ($service_descriptions as $service_description_title => $service_description_short) {
                    
                    $form['s'][$service_type_short][$service_description_short] = array(
                      '#type' => 'textfield',
                      '#title' => t($service_description_title),
                      '#default_value' => isset($p_data['s'][$service_type_short][$service_description_short]) ? $p_data['s'][$service_type_short][$service_description_short] : '',
                    );
                    
                  }
                  
                  // Fees
                  $form['s'][$service_type_short]['fees'] = array(
                    '#type' => 'fieldset',
                    '#collapsible' => TRUE,
                    '#collapsed' => FALSE,
                    '#title' => t("$service_type services fees"),
                    '#tree' => TRUE,
                  );
                      foreach ($fee_types as $fee_type => $fee_type_data) {
                        
                        $form['s'][$service_type_short]['fees'][$fee_type_data[0]] = array(
                          '#type' => 'textfield',
                          '#title' => t($fee_type),
                          '#field_prefix' => $fee_type_data[1],
                          '#default_value' => isset($p_data['s'][$service_type_short]['fees'][$fee_type_data[0]]) ? $p_data['s'][$service_type_short]['fees'][$fee_type_data[0]] : '',
                        );
                        
                      }
                      
                  
                  // Move defined via admin panel fields with a taxonomy autocomplete for corresponding Features tags to the corresponding fieldset.
                  $form['s'][$service_type_short]['field_p_' . $service_type_short . '_features'] = $form['field_p_' . $service_type_short . '_features'];
                  unset($form['field_p_' . $service_type_short . '_features']);
                  
                  // Add tags weights editing window for corresponding features.
                  if(isset($p_data['s'][$service_type_short]['weights_' . $service_type_short . '_features']) && !empty($p_data['s'][$service_type_short]['weights_' . $service_type_short . '_features'])) {
                    
                      $form['s'][$service_type_short]['weights_' . $service_type_short . '_features'] = array(
                        '#type' => 'fieldset',
                        '#title' => t("$service_type Features tags weights"),
                        '#collapsible' => TRUE,
                        '#collapsed' => TRUE,
                        '#tree' => TRUE,
                        '#weight' => $form['s'][$service_type_short]['field_p_' . $service_type_short . '_features']['#weight'] + 1,
                      );

                            foreach($p_data['s'][$service_type_short]['weights_' . $service_type_short . '_features'] as $tid => $term) {
                              $form['s'][$service_type_short]['weights_' . $service_type_short . '_features'][$tid] = array(
                                '#type' => 'textfield',
                                '#size' => 3,
                                '#title' => t($term['name']),
                                '#default_value' => $term['weight'],
                              );
                            }
                            
                  } // End of if(isset($p_data['s'][$service_type_short]['weights_' . $service_type_short . '_features']) && !empty($p_data['s'][$service_type_short]['weights_' . $service_type_short . '_features'])) {
                  
              
            } // End of foreach ($service_types as $service_type => $service_type_short) {
      
            
}




function validate() {
  
  $p_data = array();
  
  foreach ($form_state['values'] as $field => $value) {
    $prefix = explode('_', $field);
    switch ($prefix[0]) {
//      case 'i':
//          $p_data['info'][$field] = $value;
//        break;
//      case 'q':
//          $p_data['quote'][$field] = $value;
//        break;
      case 're':
          $p_data['services']['s_residential'][$field] = $value;
        break;
      case 'bu':
          $p_data['services']['s_business'][$field] = $value;
        break;
    }
  }
  
  foreach ($form_state['values']['data_info'] as $key => $value) {
    $p_data['info'][$key] = $value;
  }
  foreach ($form_state['values']['data_quote'] as $key => $value) {
    $p_data['info'][$key] = $value;
  }
  
  
  // Save weights for Re Features (on the next editing).
  foreach ($form_state['values']['field_p_re_features']['und'] as $term) {
    // Choose every selected (with autoselect) tag.
    $p_data['services']['s_residential']['weights_re_features'][$term['tid']] = array('name' => $term['name'], 'weight' => 0);
    // Save weight if it set at the weights editing fieldset
    if(isset($form_state['values']['weights_re_features'][$term['tid']])) {
      $p_data['services']['s_residential']['weights_re_features'][$term['tid']]['weight'] = $form_state['values']['weights_re_features'][$term['tid']];
    }
  }
  // Sort tags by weights.
  if (isset($p_data['services']['s_residential']['weights_re_features'])) {
    uasort($p_data['services']['s_residential']['weights_re_features'], 'wdg_misc_sortArrayByWeight');
  }
  
  // Save weights for Bu Features (on the next editing).
  foreach ($form_state['values']['field_p_bu_features']['und'] as $term) {
    // Choose every selected (with autoselect) tag.
    $p_data['services']['s_business']['weights_bu_features'][$term['tid']] = array('name' => $term['name'], 'weight' => 0);
    // Save weight if it set at the weights editing fieldset
    if(isset($form_state['values']['weights_bu_features'][$term['tid']])) {
      $p_data['services']['s_business']['weights_bu_features'][$term['tid']]['weight'] = $form_state['values']['weights_bu_features'][$term['tid']];
    }
  }
  // Sort tags by weights.
  if (isset($p_data['services']['s_business']['weights_bu_features'])) {
    uasort($p_data['services']['s_business']['weights_bu_features'], 'wdg_misc_sortArrayByWeight');
  }
  
  // Save weights for Bu PBX Features (on the next editing).
  foreach ($form_state['values']['field_p_bu_features_pbx']['und'] as $term) {
    // Choose every selected (with autoselect) tag.
    $p_data['services']['s_business']['weights_bu_features_pbx'][$term['tid']] = array('name' => $term['name'], 'weight' => 0);
    // Save weight if it set at the weights editing fieldset
    if(isset($form_state['values']['weights_bu_features_pbx'][$term['tid']])) {
      $p_data['services']['s_business']['weights_bu_features_pbx'][$term['tid']]['weight'] = $form_state['values']['weights_bu_features_pbx'][$term['tid']];
    }
  }
  // Sort tags by weights.
  if (isset($p_data['services']['s_business']['weights_bu_features_pbx'])) {
    uasort($p_data['services']['s_business']['weights_bu_features_pbx'], 'wdg_misc_sortArrayByWeight');
  }
  
  // Save weights for Bu SIP Features (on the next editing).
  foreach ($form_state['values']['field_p_bu_features_sip']['und'] as $term) {
    // Choose every selected (with autoselect) tag.
    $p_data['services']['s_business']['weights_bu_features_sip'][$term['tid']] = array('name' => $term['name'], 'weight' => 0);
    // Save weight if it set at the weights editing fieldset
    if(isset($form_state['values']['weights_bu_features_sip'][$term['tid']])) {
      $p_data['services']['s_business']['weights_bu_features_sip'][$term['tid']]['weight'] = $form_state['values']['weights_bu_features_sip'][$term['tid']];
    }
  }
  // Sort tags by weights.
  if (isset($p_data['services']['s_business']['weights_bu_features_sip'])) {
    uasort($p_data['services']['s_business']['weights_bu_features_sip'], 'wdg_misc_sortArrayByWeight');
  }
  

  if ($logo = file_load($form_state['values']['field_p_logo']['und'][0]['fid'])) {
    // Define share pic.
    $image_size = getimagesize(ltrim(gv_misc_getPathFromStreamUri($logo->uri), '/'));
    // Image for sharing.
    if ($image_size[0] / $image_size[1] > 1) {
      // Too wide. will not be cutted.
      $p_data['logo_share_src_themed'] = image_style_url('share_wide', $logo->uri);
    }
    elseif ($image_size[1] / $image_size[0] < 1) {
      // Too tall. will not be cutted.
      $p_data['logo_share_src_themed'] = image_style_url('share_tall', $logo->uri);
    }
    else {
      //Normal image, will not be cutted.
      $p_data['logo_share_src_themed'] = image_style_url('share', $logo->uri);
    }
  }
  
  // Save collected data from temporary fields and weights to a real placeholder field field_p_data as a serialized data.
  form_set_value($form['field_p_data'], array('und' => array(0 => array('value' => serialize($p_data)))), $form_state);
  

  


// Save collected FEES data from temporary fields to a excessive field for using it from views
  if (isset($p_data['services']['s_residential']['re_basicinfo_fees'])) {
    $p_fees_save['re'] = $p_data['services']['s_residential']['re_basicinfo_fees'];
  }
  if (isset($p_data['services']['s_business']['bu_basicinfo_fees'])) {
    $p_fees_save['bu'] = $p_data['services']['s_business']['bu_basicinfo_fees'];
  }
  if(isset($p_fees_save)) {
    form_set_value($form['field_p_fees_save'], array('und' => array(0 => array('value' => serialize($p_fees_save)))), $form_state);
    // Reset a helper session var with all fees.
    if (isset($_SESSION['all_fees'])) {
      unset($_SESSION['all_fees']);
    }
  }
  
  
  
  
  // Second trial... 
  // Save some more aggregated data to other field
  
  $p_data_quick['name'] = $form_state['values']['field_p_name']['und'][0]['value'];
  // Save collected Features and FEES data from temporary fields to a excessive field for using it from views
  $p_data_quick['re']['plan'] = isset($p_data['services']['s_residential']['re_preface_title']) ? $p_data['services']['s_residential']['re_preface_title'] : '';
  if (isset($p_data['services']['s_residential']['weights_re_features'])) {
    $count = 0;
    foreach ($p_data['services']['s_residential']['weights_re_features'] as $term_id => $term_data) {
      $p_data_quick['re']['feat'][$term_id] = $term_data['name'];
      if ($count++ > 1) {
        break;
      }
    }
  }
  $p_data_quick['bu']['plan'] = isset($p_data['services']['s_business']['bu_preface_title']) ? $p_data['services']['s_business']['bu_preface_title'] : '';
  if (isset($p_data['services']['s_business']['weights_bu_features'])) {
    $count = 0;
    foreach ($p_data['services']['s_business']['weights_bu_features'] as $term_id => $term_data) {
      $p_data_quick['bu']['feat'][$term_id] = $term_data['name'];
      if ($count++ > 1) {
        break;
      }
    }
  }
  $p_data_quick['re']['fees'] = array(
    'back' => isset($p_data['services']['s_residential']['re_money_back_guarantee']) ? $p_data['services']['s_residential']['re_money_back_guarantee'] : '',
    'monthly' => isset($p_data['services']['s_residential']['re_basicinfo_fees']['monthly_fees']) ? $p_data['services']['s_residential']['re_basicinfo_fees']['monthly_fees'] : '',
    'setup' => isset($p_data['services']['s_residential']['re_basicinfo_fees']['setup_fees']) ? $p_data['services']['s_residential']['re_basicinfo_fees']['setup_fees'] : '',
  );
  $p_data_quick['bu']['fees'] = array(
    'back' => isset($p_data['services']['s_business']['bu_money_back_guarantee']) ? $p_data['services']['s_business']['bu_money_back_guarantee'] : '',
    'monthly' => isset($p_data['services']['s_business']['bu_basicinfo_fees']['monthly_fees']) ? $p_data['services']['s_business']['bu_basicinfo_fees']['monthly_fees'] : '',
    'setup' => isset($p_data['services']['s_business']['bu_basicinfo_fees']['setup_fees']) ? $p_data['services']['s_business']['bu_basicinfo_fees']['setup_fees'] : '',
  );
  $p_data_quick['i_web'] = isset($p_data['info']['i_web']) ? $p_data['info']['i_web'] : '';
  
  // Logo has been defined above.
  if ($logo) {
    $p_data_quick['i_logo_uri'] = $logo->uri;
    $p_data_quick['i_logo_alt'] = $form_state['values']['field_p_logo']['und'][0]['alt'];
    $p_data_quick['i_logo_title'] = $form_state['values']['field_p_logo']['und'][0]['title'];
  }
  

  
  form_set_value($form['field_p_data_quick'], array('und' => array(0 => array('value' => serialize($p_data_quick)))), $form_state);

}

