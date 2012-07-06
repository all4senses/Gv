<div id="v3">

  <div id="gv-logo">
    <div class="logo"></div>
    <h3>Independent Authority on VoIP Providers</h3>
  </div>


  <div class="partners">
    <div id="some-logo"></div>
    <a id="sitelock" href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=getvoip.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/getvoip.com"/></a> 
  </div>

  <div class="bottom-clear"></div> 


  <div id="upper-block">
    <h1><?php echo t('We identify and rank the best VoIP Providers, services, and phone systems.'); ?></h1>
    <div class="quotes">
      <div><span class="text">"Great Source."</span><span class="source">CNN</span></div>
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
          echo '<div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
          //echo '<a href="/"><div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</div></a>';
        }
        else {
          ?>
            <h2>Have the leading firms work for you</h2>
            <div class="text">Take advantage of our 8 years of research in ensuring that your online online marketing projects meet their objectives. You can set high expectations and these firms consystently achieve them.</div>
          <?php
          //echo '<a href="/">', render($content['field_q_image']), '</a>';
          //echo '<a href="/">', theme('image_style', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</a>';
          echo '<a href="/"><div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</div></a>';
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
          <h2>Compare Top VoIP Services Tailored to Your Needs</h2>
          <div class="explain"><div class="number">1</div><span class="text">Tell us about your VoIP needs below</span></div>
          <div class="explain"><div class="number">2</div><span class="text">Your request will be reviewed by our expert team of VoIP researchers</span></div>
          <div class="explain"><div class="number">3</div><span class="text">We will connect you with three providers that best suit your needs</span></div>
          <div class="bottom-clear"></div> 
        </div>
        <div id="right-up-image"></div>
        <div id="right-bottom">
          <?php echo gv_blocks_get_requestQuoteForPage_v3(); ?>
          <div class="bottom-clear"></div> 
        </div>
      </div>

    <?php endif; ?>

    <?php
      //print render($content);
      echo render($content['metatags']);
    ?>
    <div class="bottom-clear"></div> 

  </div>

  
  <div id="brands">
    <h2><?php echo t('All Major Manufacturers Supported:'); ?></h2>
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
    <div class="links"><a href="/about-us">About Us</a><span class="delim">|</span><a href="/privacy-policy">Privacy Policy</a></div>
    <div class="copy">© 2012 GetVoIP.com | All Rights Reserved | BizMedia Central LLC | New York, NY</div>
  </footer>

</div>

<?php 

  
  return; 

?>

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
  <?php else:?>
    <script>top.location.href="http://getvoip.com/compare-voip-solutions";</script>
  <?php endif;?>
<?php endif;?>
  
