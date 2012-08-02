<?php

/**
 * @file
 * Module constants list.
 */

// Ratings titles.
define('SOUND', 'Sound/Call Quality');
define('INSTALL', 'Installation Process');
define('CUSTOMER', 'Customer Experience');
define('RELY', 'Service Reliability');
define('FEATURES', 'Features');
define('PRICE', 'Price');
define('OVERALL', 'Overall Average Rating');
define('RECOMMEND', 'Would you recommend this VoIP provider?');

// Fields hints.
define('FNAME_HINT', 'First');
define('LNAME_HINT', 'Last');
define('EMAIL_HINT', 'Enter a valid email');
define('PROS_HINT', 'Optional');
define('CONS_HINT', 'Optional');

// Provider data

//$service_types = serialize(array('Residential' => 're', 'Business' => 'bu', 'Mobile' => 'mo', 'Internet Fax' => 'ifa', 'Hosted PBX' => 'pbx', 'SIP Trunking' => 'sip', 'Call Center' => 'cc'));
//$service_descriptions = serialize(array('Preface title' => 'pti', 'Preface text' => 'pte', 'Basic info title' => 'biti', 'Basic info text' => 'bite', 'Special notes title' => 'snti', 'Special notes text' => 'snte', 'Money Back Guarentee' => 'mbg'));
//$fee_types = serialize(array('Monthly fees' => array('mon', '$'), 'Setup fees' => array('set', ''), 'Shipping fees' => array('shp', ''), 'Cancellation fees' => array('can', '$'), 'Long distance fees' => array('lng', ''), 'Other fees' => array('oth', '') ));
      

$service_types = serialize(array('re' => 'Residential', 'bu' => 'Business', 'mo' => 'Mobile', 'ifa' => 'Internet Fax', 'pbx' => 'Hosted PBX', 'sip' => 'SIP Trunking', 'cc' => 'Call Center'));
$service_descriptions = serialize(array('pti' => 'Preface title', 'pte' => 'Preface text', 'biti' => 'Basic info title', 'bite' => 'Basic info text', 'snti' => 'Special notes title', 'snte' => 'Special notes text', 'mbg' => 'Money Back Guarentee'));
$fee_types = serialize(array('mon' => array('Monthly fees', '$'), 'set' => array('Setup fees', ''), 'shp' => array('Shipping fees', ''), 'can' => array('Cancellation fees', '$'), 'lng' => array('Long distance fees', ''), 'oth' => array('Other fees', '') ));



define('SERVICE_TYPES', $service_types);
define('SERVICE_DESCRIPTIONS', $service_descriptions);
define('FEE_TYPES', $fee_types);
