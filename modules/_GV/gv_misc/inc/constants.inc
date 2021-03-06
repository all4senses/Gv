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
////define('SOUND', 'Call Quality');
define('SOUND', 'Quality');
//define('CUSTOMER', 'Customer Experience');
define('CUSTOMER', 'Support');
//define('RELY', 'Service Reliability');
define('RELY', 'Reliability');
////define('RECOMMEND', 'Would you recommend this VoIP provider?');
define('RECOMMEND', 'Would you recommend this service provider?');


// Phones only
define('USE_EASE', 'Ease of Use');
//define('VOICE', 'Voice Quality');
define('VOICE', 'Voice');
define('DURABILITY', 'Durability');
//define('PERFORMANCE', 'Value Performance');
define('PERFORMANCE', 'Performance');
define('RECOMMEND_PHONE', 'Would you recommend this VoIP phone?');



// Fields hints.
define('FNAME_HINT', 'First');
define('LNAME_HINT', 'Last');
define('EMAIL_HINT', 'Enter a valid email');
//define('PROS_HINT', 'Optional');
define('PROS_HINT', 'PROS (OPTIONAL)');
//define('CONS_HINT', 'Optional');
define('CONS_HINT', 'CONS (OPTIONAL)');

// Provider data

//$service_types = serialize(array('Residential' => 're', 'Business' => 'bu', 'Mobile' => 'mo', 'Internet Fax' => 'ifa', 'Hosted PBX' => 'pbx', 'SIP Trunking' => 'sip', 'Contact Center' => 'cc'));
//$service_descriptions = serialize(array('Preface title' => 'pti', 'Preface text' => 'pte', 'Basic info title' => 'biti', 'Basic info text' => 'bite', 'Special notes title' => 'snti', 'Special notes text' => 'snte', 'Money Back Guarentee' => 'mbg'));
//$fee_types = serialize(array('Monthly fees' => array('mon', '$'), 'Setup fees' => array('set', ''), 'Shipping fees' => array('shp', ''), 'Cancellation fees' => array('can', '$'), 'Long distance fees' => array('lng', ''), 'Other fees' => array('oth', '') ));
      

$service_types = serialize(array(/*'smbv' => 'Small Business', */'re' => 'Residential', 'bu' => 'Business', 'mo' => 'Mobile', 'ifa' => 'Internet Fax', 'pbx' => 'Hosted PBX', 'sip' => 'SIP Trunking', 'cc' => 'Contact Center', 're_ca' => 'Residential Canada', 'bu_ca' => 'Business Canada', 'rsl' => 'Reseller', 'wc' => 'Web Conferencing', 'crm' => 'CRM', 'cb' => 'Cloud Backup'));
$service_descriptions = serialize(array('pti' => 'Preface title', 'pte' => 'Preface text', 'biti' => 'Basic info title', 'bite' => 'Basic info text', 'snti' => 'Special notes title', 'snte' => 'Special notes text', 'mbg' => 'Money Back Guarentee', 'vr-y' => 'Video Review (YouTube video ID)', 's-url' => 'Outbound Service Url', 'fl' => array('type' => 'checkbox', 'title' => 'Do Follow Outbound URL'), 'sps' => array('type' => 'checkbox', 'title' => 'Insert in Secondary Providers Section'), 'sts' => 'Startup Resources', 'comet' => 'Communication Methods', 'commis' => 'Commissions', 'frtr' => 'Free Trial', 'fxsmo' => 'Faxes/mo', 'pdis' => 'Prepay Discount', 'stor' => 'Storage'));
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
  'cc' => 'top_cc_providers',
  'wc' => 'top_wc_providers',
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
              'Business SMS' => 'checkbox', // New
              'Call Queuing' => 'checkbox',
              'Call Me Now' => 'checkbox',
              'Call Notifications' => 'checkbox',
              'Call Parking' => 'checkbox',
              'Call Recording' => 'checkbox',
              'Call Return' => 'checkbox',
              'Call Waiting' => 'checkbox',
              'Caller ID' => 'checkbox',
              'Conference Calls' => 'checkbox',
              'Desktop Integration Client' => 'checkbox',
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
              'Video Conferencing' => 'checkbox',
              'Virtual Extensions' => 'checkbox',
              //'Virtual Numbers' => 'checkbox',
              'Voicemail Transcriptions' => 'checkbox',
          ),
          
          'Integrations' => array(
              //'ACT!' => 'checkbox',
              //'Filemaker' => 'checkbox',
              'Outlook' => 'checkbox',
              'NetSuite' => 'checkbox',
              'SalesForce' => 'checkbox',
              'SugarCRM' => 'checkbox',
              'Box' => 'checkbox',
              'Dropbox' => 'checkbox',
              'Google Drive' => 'checkbox',
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


$provider_options_cc = array(
          
          'Provider Info' => array(
              'Year Founded' => 'textfield',
              'Headquarters Location' => 'textfield',
              'Service Location' => 'textfield',
              'Service Type Availability' => 'textfield',
              'Popular Service Plan' => 'textfield',
              'Money Back Guarantee' => 'textfield',
          ),
    
    
          'Available Features & Services' => array(
              
              'Advanced Call Routing Options' => 'checkbox',
              'Busy Lamp Field' => 'checkbox',
              'Call Parking' => 'checkbox',
              'Call Recording' => 'checkbox',
              'Conference Bridge' => 'checkbox',
              'Configurable Call Handling' => 'checkbox',
              'CTI (Computer Telephony Integration)' => 'checkbox',
              'DNC (do-not-call) Compliance' => 'checkbox',
              'Historical Call Reporting' => 'checkbox',
              'Intelligent ACD (Automated Call Distribution)' => 'checkbox',
              'IVR (Interactive Voice Responce)' => 'checkbox',
              'Multichannel Support' => 'checkbox',
              'One-Click Transfer' => 'checkbox',
              'Outbound Call Control' => 'checkbox',
              'Priority Queue Routing' => 'checkbox',
              'Professional Greeting' => 'checkbox', 
              'Real-Time Call Monitoring' => 'checkbox',
              'Receptionist Dashboard' => 'checkbox',
              'Supervisor Dashboard' => 'checkbox',
              'Text to Speech' => 'checkbox',
              'Virtual Queue' => 'checkbox',
              'Voice ACD (Automatic Call Distributor)' => 'checkbox',
              'Voicemail to Email' => 'checkbox',
              'Web Callback' => 'checkbox',
              'Workforce Management' => 'checkbox',
              'Workforce Management' => 'checkbox',
          ),
    
          'Integrations' => array(
              'Box' => 'checkbox',
              'Dropbox' => 'checkbox',
              'Microsoft Dynamics' => 'checkbox',
              'NetSuite' => 'checkbox',
              'Outlook' => 'checkbox',
              'SalesForce' => 'checkbox',
              'SugarCRM' => 'checkbox',
              'Zoho' => 'checkbox',
              'Zendesk' => 'checkbox',
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

define('PROVIDER_OPTIONS_CC', serialize($provider_options_cc));




$provider_options_wc = array(
          
          'Provider Info' => array(
              'Year Founded' => 'textfield',
              'Headquarters' => 'textfield',
              'Service Location' => 'textfield',
              'Service Type Availability' => 'textfield',
              'Most Popular Plan' => 'textfield',
              'Money Back Guarantee' => 'textfield',
              'Enterprise Solution' => 'textfield',
              'Free Trial' => 'textfield',
              'Prepay Discount' => 'textfield',
              'Price Range Min-Max' => 'textfield',
          ),
    
    
          'Available Features & Services' => array(
                
              'Breakout Participants' => 'checkbox',
              'Data Encryption' => 'checkbox',
              'Designate Presenter' => 'checkbox',
              'File Transfer' => 'checkbox',
              'Max Participants - Biggest Plan' => 'checkbox',
              'Max Participants - Smallest Plan' => 'checkbox',
              'Mobile App' => 'checkbox',
              'No Conference Codes' => 'checkbox',
              'Online Data Backup' => 'checkbox',
              'Participant Annotation' => 'checkbox',
              'Participant Download' => 'checkbox',
              'Post Call Reporting' => 'checkbox',
              'Preparation Mode' => 'checkbox',
              'Record Meetings' => 'checkbox',
              'Screenshots' => 'checkbox',
              'Social Media Integration' => 'checkbox',
              'Specific Window Sharing' => 'checkbox',
              'Survey/Polling' => 'checkbox',
              'Toll Free Number' => 'checkbox',
          ),
    
          'Integrations' => array(
              
              'Outlook' => 'checkbox',
              'NetSuite' => 'checkbox',
              'SalesForce' => 'checkbox',
              'SugarCRM' => 'checkbox',
              'Box' => 'checkbox',
              'Dropbox' => 'checkbox',
              'Microsoft Dynamics' => 'checkbox',
              'Zoho' => 'checkbox',
              'Zendesk' => 'checkbox',
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

define('PROVIDER_OPTIONS_WC', serialize($provider_options_wc));



$pages410 = array(/*'compare-residential-voip-providers',*/ /*'compare-business-voip-providers',*/ /*'providers/reviews',*/ /*'best-voip-service-providers'*/);
define('PAGES_410', serialize($pages410));



// Remote submissions data, functions, etc.
$remoteProvidersSubmissionsSettings = array(
  'Nextiva' => array('function' => 'gv_misc_SendRequestToNextiva', 'allowed_sources' => array(/*'page_4', */'page_7', 'page_8'/*, 'page_5-IScope'*/, 'page_9'/*, 'page_10'*/)),
  'Vocalocity' => array('function' => 'gv_misc_SendRequestToVocalocity', 'allowed_sources' => array(/*'page_4', */'page_7', 'page_8'/*, 'page_5-IScope'*/, 'page_9', 'page_10')),
  
  '8x8' => array('function' => 'gv_misc_SendRequestTo8x8', 'allowed_sources' => array(/*'page_4', */'page_7', 'page_8'/*, 'page_5-IScope'*/, 'page_9', 'page_10')),
  
    
  'RingCentral' => array('function' => 'gv_misc_SendRequestToRingCentral', 'allowed_sources' => array(/*'page_4', */'page_7', 'page_8'/*, 'page_5-IScope'*/, 'page_9', 'page_10')),
  
  'RingCentral-UK' => array('function' => 'gv_misc_SendRequestToRingCentral_UK', 'allowed_sources' => array('page_6-UK-LP', 'page_7_uk', 'page_8_uk', 'page_9_uk', 'page_10_uk')),
  'RingCentral-CA' => array('function' => 'gv_misc_SendRequestToRingCentral_CA', 'allowed_sources' => array('page_7_ca', 'page_8_ca', 'page_9_ca', 'page_10_ca')),
  
  'Mitel' => array('function' => 'gv_misc_SendRequestToMitel', 'allowed_sources' => array('page_10')),
    
    
  'Jive' => array('function' => 'gv_misc_SendRequestToJiveCommunications', 'allowed_sources' => array()),
    
  'Corvisa' => array('function' => 'gv_misc_SendRequestToCorvisa', 'allowed_sources' => array()),  
    
  '8x8_CallCenter' => array('function' => 'gv_misc_SendRequestTo8x8_callCenter', 'allowed_sources' => array()),  
);

define('REMOTE_PROVIDERS_SUBMISSIONS_SETTINGS', serialize($remoteProvidersSubmissionsSettings));