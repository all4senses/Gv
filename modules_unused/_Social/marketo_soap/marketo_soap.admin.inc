<?php

/**
 * @file
 * Administration pages for configuring Marketo SOAP module.
 */

/**
 * Admin page callback
 */
function marketo_soap_settings() {

  $form['general'] = array(
    '#type' => 'fieldset',
  );
  
  $form['general']['marketo_soap_endpoint'] = array(
    '#type' => 'textfield',
    '#title' => t("SOAP Endpoint"),
    '#description' => t("SOAP endpoint url from your Marketo account"),
    '#default_value' => variable_get('marketo_soap_endpoint', 'https://na-o.marketo.com/soap/mktows/1_7'),
  );
  
  $form['general']['marketo_soap_user_id'] = array(
    '#type' => 'textfield',
    '#title' => t("User Id"),
    '#description' => t("User Id from your Marketo account"),
    '#default_value' => variable_get('marketo_soap_user_id', NULL),
  );
  
  $form['general']['marketo_soap_secret_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Secret Key'),
    '#description' => t("Secret Key from your Marketo account"),
    '#default_value' => variable_get('marketo_soap_secret_key', NULL),
  );

  $form['processing'] = array(
    '#type' => 'fieldset',
  );

  $form['processing']['marketo_soap_use_queue'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use processing queue'),
    '#description' => t('Put items to queue instead of immediate syncing with Marketo.'),
    '#default_value' => variable_get('marketo_soap_use_queue', FALSE),
  );

  $form['processing']['marketo_soap_queue_cron'] = array(
    '#type' => 'checkbox',
    '#title' => t('Process queue in cron'),
    '#description' => t('Use cron runs to push users to Marketo. Alternative to cron is running own drush jobs.'),
    '#default_value' => variable_get('marketo_soap_queue_cron', FALSE),
  );
  
  $form['campaign'] = array(
    '#type' => 'fieldset',
  );
  
  $form['campaign']['marketo_soap_reg_campaign'] = array(
    '#type' => 'textfield',
    '#title' => t("User Registration Campaign"),
    '#description' => t("The name of the campaign used to place new registrations"),
    '#default_value' => variable_get('marketo_soap_reg_campaign', NULL),
  );
  
  $form['campaign']['marketo_soap_upd_campaign'] = array(
    '#type' => 'textfield',
    '#title' => t("User Update Campaign"),
    '#description' => t("The name of the campaign used to place updated users"),
    '#default_value' => variable_get('marketo_soap_upd_campaign', NULL),
  );
  
  // @TODO: build a format validation function to avoid bad values?
  $form['campaign']['marketo_soap_field_mapping'] = array(
    '#type' => 'textarea',
    '#title' => t('Fields Mapping'),
    '#description' => t("Map your site's fields to Marketo's. You machine name
                        fields should be on the left, followed by a pipe (|),
                        followed by Marketo's on the right. One field map per
                        line. Example: my_site_field|marketo_field"),
    '#default_value' => variable_get('marketo_soap_field_mapping', NULL),
  );
  
  return system_settings_form($form);
}
