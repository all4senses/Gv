<?php

/**
 * @file
 * Module constants list.
 */

// Topics vocabulary name.
define('TOPICS', 'topics');

// Ratings titles.

//define('INSTALL', 'Installation Process');
define('INSTALL', 'Installation');
define('FEATURES', 'Features');
define('PRICE', 'Price');
define('OVERALL', 'Overall Average Rating');

//define('SOUND', 'Sound/Call Quality');
define('SOUND', 'Call Quality');
//define('CUSTOMER', 'Customer Experience');
define('CUSTOMER', 'Support');
//define('RELY', 'Service Reliability');
define('RELY', 'Reliability');
define('RECOMMEND', 'Would you recommend this VoIP provider?');


// Phones only
define('USE_EASE', 'Ease of Use');
define('VOICE', 'Voice Quality');
define('DURABILITY', 'Durability');
define('PERFORMANCE', 'Value Performance');
define('RECOMMEND_PHONE', 'Would you recommend this VoIP phone?');



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
      

$service_types = serialize(array(/*'smbv' => 'Small Business', */'re' => 'Residential', 'bu' => 'Business', 'mo' => 'Mobile', 'ifa' => 'Internet Fax', 'pbx' => 'Hosted PBX', 'sip' => 'SIP Trunking', 'cc' => 'Call Center', 're_ca' => 'Residential Canada', 'bu_ca' => 'Business Canada'));
$service_descriptions = serialize(array('pti' => 'Preface title', 'pte' => 'Preface text', 'biti' => 'Basic info title', 'bite' => 'Basic info text', 'snti' => 'Special notes title', 'snte' => 'Special notes text', 'mbg' => 'Money Back Guarentee', 'vr-y' => 'Video Review (YouTube video ID)', 'fl' => array('type' => 'checkbox', 'title' => 'Do Follow Outbound URL'), 'sps' => array('type' => 'checkbox', 'title' => 'Insert in Secondary Providers Section')));
$fee_types = serialize(array('mon' => array('Monthly fees', '$'), 'set' => array('Setup fees', ''), 'shp' => array('Shipping fees', ''), 'can' => array('Cancellation fees', '$'), 'lng' => array('Long distance fees', ''), 'oth' => array('Other fees', '') ));

define('SERVICE_TYPES', $service_types);
define('SERVICE_DESCRIPTIONS', $service_descriptions);
define('FEE_TYPES', $fee_types);


$sprite_names = serialize(array(
  'business' => 'top_bu_providers',
  'residential' => 'top_re_providers',
  'sip' => 'top_sip_providers',
  'ifa' => 'top_ifa_providers',
  'pbx' => 'top_pbx_providers',
  'bu_ca' => 'top_ca_providers',
  're_ca' => 'top_ca_providers',
  //'smbv' => '',  
));

define('SPRITE_NAMES', $sprite_names);








// Provider options

$provider_options_titles_aliases = array(
  'Number Porting Fee' => 'Number Port Fee',
  'Headquarters Location' => 'Headquarters',
  'Popular Service Plan' => 'Popular Plan',
  'Month to Month Option' => 'No Contracts',
);

define('PROVIDER_OPTIONS_TITLES_ALIASES', serialize($provider_options_titles_aliases));

$provider_options_to_quick_save = array(
  'bu' => array('Number Porting Fee', 'Toll Free Numbers', 'Money Back Guarantee'),
);
define('PROVIDER_OPTIONS_TO_QUICK_SAVE', serialize($provider_options_to_quick_save));

$provider_options_bu = array(
          'Provider Info' => array(
              'Year Founded' => 'textfield',
              'Headquarters Location' => 'textfield',
              'Service Location' => 'textfield',
              'Service Type Availability' => 'textfield',
              'Popular Service Plan' => 'textfield',
              'Money Back Guarantee' => 'textfield',
          ),
          
          'Services & Pricing' => array(
              'Monthly Cost of Cheapest Service' => 'textfield',
              'Amount of Lines Per Price Tier' => 'textarea',
              //'Amount of Features Included' => 'textarea',
              'Month to Month Option' => 'checkbox',
              'Metered Plans' => 'textfield',
              //'Requires Contract' => 'checkbox',
              //'Contract Length (in yrs)' => 'textfield',
              'Customizable Plans' => 'checkbox',
              'Activation Fee' => 'textfield',
              'Setup Fee' => 'textfield',
              'Number Porting Fee' => 'textfield',
              //'Shipping' => 'textfield',
              //'Equipment Leasing' => 'checkbox',
              'Mobile App' => 'checkbox',
              'Own Softphone' => 'checkbox',
              'Works with 3rd party Softphones' => 'checkbox',
              'Fax Options' => 'checkbox',
              'Fax Pricing' => 'textarea',
              'Desktop Integration Client' => 'checkbox',
              //'IP Phones Supported' => 'textfield',
              //'IP Phones Non Supported' => 'textfield',
              'Toll Free Numbers' => 'checkbox',
              'Local Numbers' => 'checkbox',
              //'Vanity Numbers' => 'checkbox',
              'BYOD Option' => 'checkbox',
          ),
          
          
          'Available Features (some features cost extra, as per provider rates)' => array(
              'Advanced Call Forwarding' => 'checkbox',
              'Anonymous Call Rejection' => 'checkbox',
              'Auto Attendant' => 'checkbox',
              'Busy Lamp Field' => 'checkbox',
              'Call Queuing' => 'checkbox',
              'Call Me Now' => 'checkbox',
              'Call Notifications' => 'checkbox',
              'Call Parking' => 'checkbox',
              'Call Recording' => 'checkbox',
              'Call Return' => 'checkbox',
              'Call Waiting' => 'checkbox',
              'Caller ID' => 'checkbox',
              'Conference Calls' => 'checkbox',
              'Dial-by-name Directory' => 'checkbox',
              //'Directed Call Pickup' => 'checkbox',
              'Do Not Disturb' => 'checkbox',
              'E911' => 'checkbox',
              'Find Me/Follow Me' => 'checkbox',
              'Group Paging' => 'checkbox',
              //'Hoteling Guest' => 'checkbox',
              'Hunt Group' => 'checkbox',
              'IVR' => 'checkbox',
              //'Line Mirroring' => 'checkbox', 
              'Mobile/Deskphone Sync' => 'checkbox', 
              'On-Hold Music' => 'checkbox',
              'Privacy Options' => 'checkbox',
              'Push To Talk' => 'checkbox',
              'Selective Call Acceptance' => 'checkbox',
              'Selective Call Rejection' => 'checkbox',
              'Shared Call Appearance' => 'checkbox',
              'Simultaneous Ring' => 'checkbox',
              'Switchboard Software for Live Receptionist' => 'checkbox',
              'Three-way Calling' => 'checkbox',
              'Unlimited Extensions' => 'checkbox',
              'Voicemail Transcriptions' => 'checkbox',
              'Virtual Extensions' => 'checkbox',
              //'Virtual Numbers' => 'checkbox',
          ),
          
          'Integrations' => array(
              //'ACT!' => 'checkbox',
              //'Filemaker' => 'checkbox',
              'Outlook' => 'checkbox',
              'NetSuite' => 'checkbox',
              'SalesForce' => 'checkbox',
              'SugarCRM' => 'checkbox',
          ),
          
          'Support' => array(
              'Hours' => 'textfield',
              'Telephone Support' => 'checkbox',
              'Email Support' => 'checkbox',
              'Instant Chat' => 'checkbox',
              '24/7 Call-in Support' => 'checkbox',
              'FAQs Section' => 'checkbox',
              'Video Tutorials' => 'checkbox',
              'E-Guides' => 'checkbox',
              'Online Ticket Submissions' => 'checkbox',
        ),
          
      );
      
define('PROVIDER_OPTIONS_BU', serialize($provider_options_bu));





$provider_options_re = array(
    
          'Provider Info' => array(
              'Year Founded' => 'textfield',
              'Headquarters Location' => 'textfield',
              'Service Location' => 'textfield',
              'Service Type Availability' => 'textfield',
              'Popular Service Plan' => 'textfield',
              'Money Back Guarantee' => 'textfield',
          ),
    
          'Services & Pricing' => array(
              'Monthly Cost of Cheapest Service' => 'textfield',
              //'Requires Contract' => 'checkbox',
              'Month to Month Option' => 'checkbox',
              'Bundle Package' => 'checkbox',
              'Activation Fee' => 'checkbox',
              'Setup Fee' => 'checkbox',
              'Number Porting Fee' => 'checkbox',
              'Free ATA' => 'checkbox',
              'Unlimited Calling US/Canada'  => 'checkbox',
              'International Calling' => 'checkbox',
              'Mobile App' => 'checkbox',
          ),
    
          'Available Features (some features cost extra, as per provider rates)' => array(
              'Advanced Call Forwarding' => 'checkbox',
              'Call Blocking' => 'checkbox',
              'Call Forwarding' => 'checkbox',
              'Call History/Logs' => 'checkbox',
              'Call Hunt' => 'checkbox',
              'Call Record' => 'checkbox',
              'Call Waiting' => 'checkbox',
              'Caller ID' => 'checkbox',
              'Directory Assistance (411)' => 'checkbox',
              'Do Not Disturb' => 'checkbox',
              'E911' => 'checkbox',
              'Enhanced Voicemail' => 'checkbox',
              'Failsafe/Failover' => 'checkbox',
              'Selective Call Acceptance' => 'checkbox',
              'Selective Call Rejection' => 'checkbox',
              'Softphone' => 'checkbox',
              'Telemarketer Block' => 'checkbox',
              'Three-way Calling' => 'checkbox',
              'Virtual Phone Number' => 'checkbox',
          ),
          
          'Support' => array(
              'Hours' => 'textfield',
              'Telephone Support' => 'checkbox',
              'Email Support' => 'checkbox',
              'Instant Chat' => 'checkbox',
              '24/7 Call-in Support' => 'checkbox',
              'FAQs Section' => 'checkbox',
              'Video Tutorials' => 'checkbox',
              'E-Guides' => 'checkbox',
              'Online Ticket Submissions' => 'checkbox',
        ),
          
      );
      
define('PROVIDER_OPTIONS_RE', serialize($provider_options_re));

$pages410 = array('compare-residential-voip-providers', 'compare-business-voip-providers', 'providers/reviews', 'best-voip-service-providers');
define('PAGES_410', serialize($pages410));



// Remote submissions data, functions, etc.
$remoteProvidersSubmissionsSettings = array(
  'Nextiva' => array('function' => 'gv_misc_SendRequestToNextiva', 'allowed_sources' => array('page_4'/*, 'page_5-IScope'*/)),
  'Vocalocity' => array('function' => 'gv_misc_SendRequestToVocalocity', 'allowed_sources' => array('page_4'/*, 'page_5-IScope'*/)),
  '8x8' => array('function' => 'gv_misc_SendRequestTo8x8', 'allowed_sources' => array('page_4'/*, 'page_5-IScope'*/)),
  'RingCentral' => array('function' => 'gv_misc_SendRequestToRingCentral', 'allowed_sources' => array('page_4'/*, 'page_5-IScope'*/)),
  
  'RingCentral-UK' => array('function' => 'gv_misc_SendRequestToRingCentral_UK', 'allowed_sources' => array('page_6-UK-LP')),
);

define('REMOTE_PROVIDERS_SUBMISSIONS_SETTINGS', serialize($remoteProvidersSubmissionsSettings));