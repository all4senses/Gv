<div id="v3">

  <div id="gv-logo">
    <a href="<?php echo '/compare-voip-solutions'; /*$_SERVER['REDIRECT_URL']*/ ?>"><div class="logo"></div></a>
    <h3>Leading Authority on VoIP Providers</h3>
  </div>


  <div class="partners">
    <div id="some-logo"></div>
    <a id="sitelock" href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=getvoip.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/getvoip.com"/></a> 
  </div>

  <div class="bottom-clear"></div> 


  <div id="upper-block">
    <h1><?php echo 'We identify and rank the best business VoIP providers and phone systems.'; ?></h1>
    <div class="quotes">
      <div><span class="text">"Great Source."</span><span class="source">Inc.</span></div>
      <div><span class="text">"Rigorous Evaluation Process."</span><span class="source">Smart Money</span></div>
      <div><span class="text">"Over 500 VoIP Providers analyzed."</span><span class="source">Enterpreneur</span></div>
    </div>

    <div class="bottom-clear"></div> 
  </div>

  
  
  
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
  
  
  <div class="content<?php echo ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final' ? ' final' : '')?>"<?php print $content_attributes; ?>>


    <div class="left">
      <?php 
        if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final') {
          echo '<a class="guide" href="/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank">' . t("Download Your Free VoIP Buyer's Guide Here") . '</a><div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
          //echo '<a href="/"><div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</div></a>';
        }
        else {
          ?>
            <h2>Compare Leading VoIP Providers</h2>
            <!--<div class="text">Take advantage of our VoIP research and experience. Don't trust your phone system with just any company. Ensure that your business telecommunications system meet your objectives. Have a leading VoIP provider fight for your business, receive top-notch VoIP services, while saving money!</div>-->
            <div class="text bullet">Highly Accredited BBB Companies</div>
            <div class="text bullet">Hosted Technology & PBX Services</div>
            <div class="text bullet">Unlimited Anytime Calling & Faxing, US & Canada</div>
            <div class="text bullet">Sleek, Reliable, HD IP Phone Systems</div>
          <?php
          //echo '<a href="/">', render($content['field_q_image']), '</a>';
          //echo '<a href="/">', theme('image_style', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</a>';
          echo '<div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</div>',
               '<div class="text-2">Over 20,000+ Monthly Visitors</div>
                <div class="text-3">A Leading Online VoIP Authority</div>';
        }
      ?>
    </div>

    <?php if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final'): ?>
      <div class="right-final">
        
        <?php 
          echo '<div class="right-final">',
                  '<a class="image" href="/"><div class="field field-name-field-q-image-2 field-type-image field-label-hidden"><div class="field-items"><div class="field-item even"><img width="476" height="262" alt="" src="http://getvoip.com/sites/default/files/get-access.png" typeof="foaf:Image"></div></div></div></a>',
                  '<h2>' , t('GET ACCESS TO THE LARGEST<br/> VOIP SERVICE GUIDE<br/> IN THE NATION!') , '</h2><div class="link">' , l(t('Learn more'), '<front>') , '</div>',
               '</div>';        
        ?>
      </div>
    <?php else: ?>

      <div class="right">
        <div id="right-up">
          <h2>Save Up To 70% On Your Business Phone System</h2>
          <div class="explain p1"><div class="number">1</div><span class="text">Tell us about your VoIP needs below</span></div>
          <div class="explain p2"><div class="number">2</div><span class="text">Your request will be reviewed by our expert team of VoIP researchers</span></div>
          <div class="explain p3"><div class="number">3</div><span class="text">We will connect you with three providers that best suit your needs</span></div>
          <div class="bottom-clear"></div> 
        </div>
        <div id="right-up-image"></div>
        
        <div id="right-bottom">
          <?php echo gv_blocks_get_requestQuoteForPage_v32(); ?>
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

  </div>

  
  <div id="brands">
    <h2><?php echo t('Supported by major companies across the country'); ?></h2>
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
        /*
        if ($brand_keys = element_children($content['field_q_image2']))
        {
          
          echo '<ul id="mycarousel" class="jcarousel-skin-tango">';
          foreach ($brand_keys as $brand_key) {
            echo '<li>', '<table><tbody><tr><td>', render($content['field_q_image2'][$brand_key]), '</td></tr></tbody></table>', '</li>'; 
          }
          echo '</ul>';
        }
        */
        
    ?>
    
    <div class="bottom-clear"></div> 
  </div>
  
  <?php 
  ?>
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

  <footer>
    <div class="links"><a href="/about-us" target="_blank">About Us</a><span class="delim">|</span><a href="/privacy-policy" target="_blank">Privacy Policy</a></div>
    <div class="copy">© 2012 GetVoIP.com | All Rights Reserved | BizMedia Central LLC | New York, NY</div>
  </footer>

</div>

<?php if ($_SERVER['REDIRECT_URL'] == '/compare-voip-solutions-final'): ?> 

  <?php if ($_SERVER['HTTP_REFERER'] == 'http://getvoip.com/compare-voip-solutions'): ?> 
    <!-- Google Code for Landing Page Conversion Page -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 944838791;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "HO_ZCOH81gMQh7HEwgM";
    var google_conversion_value = 0;
    /* ]]> */
    </script>
    <script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/944838791/?value=0&amp;label=HO_ZCOH81gMQh7HEwgM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>
  <?php global $user; elseif ($user->uid != 1):?>
    <script>top.location.href="http://getvoip.com/compare-voip-solutions";</script>
  <?php endif;?>
    
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
  
