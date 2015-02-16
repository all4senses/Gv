<div id="v33">
  <div id="quote-content">

    
  <?php
    if ($node->title == 'Request a Quote page v3 Final') {
      $path_to_custom_js = drupal_get_path('module', 'gv_blocks') . '/js/';
      drupal_add_js($path_to_custom_js . 'gv_brandsCarousel.js');
      drupal_add_js('sites/all/libraries/jquery.plugins/jcarousel/jquery.jcarousel.min.js');
      drupal_add_css('sites/all/libraries/jquery.plugins/jcarousel/skins/tango/skin.css');
  
      $initialQuotePage_node = gv_misc_getInitialQuotePageNode($node->title);
      $initialQuotePage_node->q_data = unserialize($initialQuotePage_node->field_q_data['und'][0]['value']);
    }
    else {
      $initialQuotePage_node = $node;
    }
  ?>
    
  <?php echo '<div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][1]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][1]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][1]['title'])), '</div>'; ?>
  <div id="gv-logo">
    <?php 
      echo '<div class="logo"><img src="http://getvoip.com/sites/all/themes/gv_orange/css/images/getvoip-logo3.png" alt="GetVoIP" title="GetVoIP" /></div>'; 
    ?>
    <h3>The Authority on VoIP Service Selection</h3>
  </div>


  
  <div class="partners">
    <div id="trusted-logos"></div>
    <a id="sitelock" href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=getvoip.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock"  src="http://shield.sitelock.com/shield/getvoip.com"/></a> 
  </div>

  <div class="bottom-clear"></div> 

  
 
  
  
  <div class="content<?php echo ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final' ? ' final' : '')?>"<?php print $content_attributes; ?>>


    <div class="left">
      <?php 
//        if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final') {
//          echo '<a class="guide" href="/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank">' . t("Download Your Free VoIP Buyer's Guide Here") . '</a><div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
          //echo '<a href="/"><div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</div></a>';
//        }
//        else {
          ?> 
            <!-- <h2>Your Business Deserves a <br/>Real Phone System!</h2> -->
            <h2>Save Up To 80% On Your<br/> Business Phone System!</h2>
            <!--
            <div class="text bullet"><strong>Lowest Rates & Exclusive Discounts:</strong> Best Providers in the Industry compete for your business.</div>
            <div class="text bullet"><strong>Unlimited Calling:</strong> All plans include unlimited calling and faxing in USA/Canada.</div>
            <div class="text bullet"><strong>Personalized Plans:</strong> Get custom tailored packages, and pay only for services you need.</div>
            -->
            <div class="caption">Compare:</div>
            <div class="text bullet"><strong>Personalized Quotes From Top Providers</strong></div>
            <div class="text bullet"><strong>Flexible & Intuitive VoIP Phone Systems</strong></div>
            <div class="text bullet"><strong>Lowest Rates & Exclusive Discounts</strong></div>
            <!--<div class="text bullet"><strong>Unlimited Calling & Faxing USA/Canada</strong></div> -->
            
            <div class="ps"><span>6000+ Submissions -</span> Average saving of $180 per month</div>

            
            <?php
//            if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final') {
//              echo '<a href="/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank"><div class="guide"><span>Free guide with submission</span> Ditch Your Landline & <br/>Advance Your Business with VoIP</div></a>';
//            }
//            else {
//              echo '<div class="guide"><span>Free guide with submission</span> Ditch Your Landline & <br/>Advance Your Business with VoIP</div>';
//            }
            ?>
          <?php
          //echo '<a href="/">', render($content['field_q_image']), '</a>';
          //echo '<a href="/">', theme('image_style', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</a>';
          //echo '<div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][1]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][1]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][1]['title'])), '</div>';
               //'<div class="text-2">Over 20,000+ Monthly Visitors</div>
               // <div class="text-3">A Leading Online VoIP Authority</div>'
               // ;
//        }
      ?>
    </div>

    </div>
  
    <?php if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final'): ?>
      <!--<div class="right-final"> -->
        
        <div class="right final">
           <?php  
           //echo '<a class="guide" href="/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank">' . t("Download Your Free VoIP Buyer's Guide Here") . '</a><div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>'; 
           echo '<a class="guide" href="/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank">Download Your Free VoIP Buyer\'s Guide<img src="/sites/all/themes/gv_orange/css/images/click-here-button.png" /></a><div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
           ?>
        </div>
        <?php 
//          echo '<div class="right-final">',
//                  '<a class="image" href="/"><div class="field field-name-field-q-image-2 field-type-image field-label-hidden"><div class="field-items"><div class="field-item even"><img width="476" height="262" alt="" src="http://getvoip.com/sites/default/files/get-access.png" typeof="foaf:Image"></div></div></div></a>',
//                  '<h2>' , t('GET ACCESS TO THE LARGEST<br/> VOIP SERVICE GUIDE<br/> IN THE NATION!') , '</h2><div class="link">' , l(t('Learn more'), '<front>') , '</div>',
//               '</div>';        
        ?>
      <!--</div>-->
    <?php else: ?>

      <div class="right">
        
        <!--<div id="right-up-image"></div> -->
        
        <div id="right-bottom">
          <?php echo gv_blocks_get_requestQuoteForPage_v33(); ?>
          <div class="bottom-clear"></div> 
        </div>
      </div>
    
    <form action="http://ww3.vocalocity.com/l/7772/2012-09-28/36c856" method="post"></form>
      

    <?php endif; ?>

    <?php
      //print render($content);
      echo render($content['metatags']);
    ?>
    <div class="bottom-clear"></div> 

  

  
  
  

  <div id="upper-block">
    <h1>We identify and rank the best business VoIP providers and phone systems.</h1>
    
    <div class="quotes one">
      <div class="text">"GetVoIP.com stands out in the online VoIP implementation space by providing expert analysis and unparalleled information along with hands-on reviews and feature explanations, which ultimately translates into quality prospects and high conversion rates."</div>
      <div class="source">- Chris Rabbu, VP of Marketing at Vocalocity, Inc.</div>
    </div>
    
    <!--
    <div class="quotes">
      <div class="group"><div class="text">"Great Source."</div><div class="source">Inc.</div></div>
      <div class="group"><div class="text">"Rigorous Evaluation Process."</div><div class="source">Smart Money</div></div>
      <div class="group"><div class="text">"Over 500 VoIP Providers analyzed."</div><div class="source">Enterpreneur</div></div>
    </div>
    -->
    
    <div class="bottom-clear"></div> 
  </div>

 <!--  
  <div id="upper-block">
    
    <h1>We identify and rank the best business VoIP providers and phone systems.</h1>
    <div class="quotes"><span>"Great Source."</span><span>"Rigorous Evaluation Process."</span><span>"Over 500 VoIP Providers analyzed."</span></div>
    <div class="source"><span>Inc.</span><span>Smart Money</span><span>Enterpreneur</span></div>

  </div>
  -->
  
  <!--
  <div id="right-up">
    <h2>Save Up To 70% On Your Business Phone System</h2>
    <div class="explain p1"><div class="number">1.</div><span class="text">Tell us about your calling needs</span></div>
    <div class="explain p2"><div class="number">2.</div><span class="text">Your request will be reviewed by our expert team of VoIP researchers</span></div>
    <div class="explain p3"><div class="number">3.</div><span class="text">We will connect you with three providers that best suit your needs</span></div>
    <div class="bottom-clear"></div> 
  </div>
  -->
  
  
  <?php /*
  <div id="chart-and-bottom">
    
    <div id="brands">
      <h2><?php echo 'Supported by all major VoIP Companies in the country:'; ?></h2>
      <?php 
        //$block_data = array('module' => 'views', 'delta' => 'providers-block_top_business_cmp', 'shadow' => FALSE, 'subject' => '');
        $block_data = array('module' => 'views', 'delta' => 'providers-block_top_business_nograde', 'shadow' => FALSE, 'subject' => '');
        echo gv_blocks_getBlockThemed($block_data);
        gv_misc_loadColorboxForVideoLinks();
      ?>
      <div class="bottom-clear"></div> 
    </div>
  
    <div id="bottom">
      <div class="text">
        <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['left_title']; ?></h3>
        <div><?php echo $initialQuotePage_node->q_data['bottom_text']['left_text']; ?></div>
      </div>
      <div class="text">
        <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['center_title']; ?></h3>
        <div><?php echo $initialQuotePage_node->q_data['bottom_text']['center_text']; ?></div>
      </div>
      <div class="text last">
        <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['right_title']; ?></h3>
        <div><?php echo $initialQuotePage_node->q_data['bottom_text']['right_text']; ?></div>
      </div>
      <div class="bottom-clear"></div>
    </div>
    
    <div class="copy">© 2014 GetVoIP.com All Rights Reserved <br/> BizMedia Central LLC | New York, NY</div>
    
  </div>
  
  */
  ?>
  
  
  <?php ?>
  
  <div id="brands">
    <h2><?php echo 'Supported by all major VoIP Companies in the country:'; ?></h2>
    <?php
        if (isset($initialQuotePage_node->field_q_image2['und'][0])) {
          echo '<ul id="mycarousel" class="jcarousel-skin-tango">';
          foreach ($initialQuotePage_node->field_q_image2['und'] as $brand) {
            echo '<li>', '<table><tbody><tr><td>', 
                    theme('image_style', array( 'path' =>  $brand['uri'], 'style_name' => 'thumbnail', 'alt' => $brand['alt'], 'title' => $brand['title'])),
                 '</td></tr></tbody></table>', '</li>'; 
          }
          echo '</ul>';
        }
        
//        if ($brand_keys = element_children($content['field_q_image2']))
//        {
//          
//          echo '<ul id="mycarousel" class="jcarousel-skin-tango">';
//          foreach ($brand_keys as $brand_key) {
//            echo '<li>', '<table><tbody><tr><td>', render($content['field_q_image2'][$brand_key]), '</td></tr></tbody></table>', '</li>'; 
//          }
//          echo '</ul>';
//        }
     ?>
    
    <div class="bottom-clear"></div> 
  </div>


<?php ?>
  
  
  <?php ?>
  <div id="bottom">
    <div class="text">
      <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['left_title']; ?></h3>
      <div><?php echo $initialQuotePage_node->q_data['bottom_text']['left_text']; ?></div>
    </div>
    <div class="text">
      <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['center_title']; ?></h3>
      <div><?php echo $initialQuotePage_node->q_data['bottom_text']['center_text']; ?></div>
    </div>
    <div class="text last">
      <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['right_title']; ?></h3>
      <div><?php echo $initialQuotePage_node->q_data['bottom_text']['right_text']; ?></div>
    </div>


    <div class="bottom-clear"></div>
  </div>

<?php ?>

  <?php ?>
  
  <footer>
    <!--<div class="links"><a href="/about-us" target="_blank">About Us</a><span class="delim">|</span><a href="/privacy-policy" target="_blank">Privacy Policy</a></div>-->
    <div class="copy">© 2014 GetVoIP.com All Rights Reserved <br/> BizMedia Central LLC | New York, NY</div>
  </footer>
          
<?php ?>
  </div>
</div>

<?php if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final'): /* If we are on the final page, after the submission */ ?> 

          <?php /*if ($_SERVER['HTTP_REFERER'] == 'http://getvoip.com/compare-voip-solutions'):*/  /* If we get the final page from the main quote page, what is correct.*/ ?> 
            <!-- Google Code for GV Lead - LP Conversion Page -->
            <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 944838791;
            var google_conversion_language = "en";
            var google_conversion_format = "2";
            var google_conversion_color = "ffffff";
            var google_conversion_label = "cXd0CMHGnAYQh7HEwgM";
            var google_conversion_value = 0;
            var google_remarketing_only = false;
            /* ]]> */
            </script>
            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
            </script>
            <noscript>
            <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/944838791/?value=0&amp;label=cXd0CMHGnAYQh7HEwgM&amp;guid=ON&amp;script=0"/>
            </div>
            </noscript>
          <?php /*global $user; elseif ($user->uid != 1): // If we get the final page from an other page, what is INCORRECT, we just redirect a user to the main quote page.?>
            <script>top.location.href="http://getvoip.com/compare-voip-solutions";</script>
          <?php endif;*/?>
    
<?php else: // Else of if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final'):
// So we are on the lending page '/compare-voip-solutions' 
?>
    
  <!-- Google Code for Remarketing tag -->
  <!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
  <script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 944838791;
  var google_conversion_label = "cYn0CNGWnwQQh7HEwgM";
  var google_custom_params = window.google_tag_params;
  var google_remarketing_only = true;
  /* ]]> */
  </script>
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
  </script>
  <noscript>
  <div style="display:inline;">
  <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/944838791/?value=0&amp;label=cYn0CNGWnwQQh7HEwgM&amp;guid=ON&amp;script=0"/>
  </div>
  </noscript>
  
<?php endif; // End of Else of if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final'):?>
  
