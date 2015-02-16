<div id="v2">
  
  <div id="gv-logo">
    <div class="logo"></div>
    <h3>Don't trust your phone system with just anyone!<br/>Get paired with a prescreened VoIP provider that best fits your needs!</h3>
  </div>

  <div class="partners">
    <div id="some-logo"></div>
    <a id="sitelock" href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=getvoip.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/getvoip.com"/></a> 
  </div>

  <div class="bottom-clear"></div> 


  <div class="content"<?php print $content_attributes; ?>>
  
    <?php echo render($content['field_q_image']); ?>

    
    <div class="heading">
      
      <h1<?php print /*$title_attributes*/preg_replace('/datatype=".*"/', '', $title_attributes); 
      ?>><?php //print $title; ?>Save Big</h1>

      <div class="sub_header1">- Switch to a Business VoIP System</div>
      <h2>Save Up To 80% on Your Business Telephone System With VoIP Services</h2>
    
    </div>
    
    <div class="left top<?php echo ($_SERVER['REDIRECT_URL'] == '/voip-provider-quotes-final' ? ' final' : ''); ?>">
      <?php 
        if ($_SERVER['REDIRECT_URL'] == '/voip-provider-quotes-final') {
          echo '<div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
          echo '<div class="right-final">',
                  '<a class="image" href="/"><div class="field field-name-field-q-image-2 field-type-image field-label-hidden"><div class="field-items"><div class="field-item even"><img width="476" height="262" alt="" src="http://getvoip.com/sites/default/files/get-access.png" typeof="foaf:Image"></div></div></div></a>',
                  '<h2>' , t('GET ACCESS TO THE LARGEST<br/> VOIP SERVICE GUIDE<br/> IN THE NATION!') , '</h2><div class="link">' , l(t('Learn more'), '<front>') , '</div>',
               '</div>';
        }
        else { 
          ?><div class="caption">Tell Us About Your VoIP Needs:</div><?php
          echo gv_blocks_get_requestQuoteForPage_v2(); 
          
        }
      ?>
      <div class="bottom-clear"></div> 
    </div>



    <div class="right top">
      
      <div class="caption">Analyze VoIP Providers from all directions.</div><ul><li>Compare top providers.</li><li>Get aggressive rates.</li><li>Get facts. Read Reviews.</li></ul>
      
      <div id="brands">
        <h2><?php echo t('All Major Award Winning Manufacturers Supported:'); ?></h2>
        <div id="cisco"></div><div id="polycom"></div><div id="att"></div><div id="comcast"></div>
        <div class="bottom-clear"></div> 
      </div>
      
    </div>

    
    
    <div class="bottom-clear"></div> 

    
    <div class="left bottom">

      <div>Complete our <strong>1-Step free and easy quick form</strong> and a VoIP expert will begin creating a <strong>personalized no-risk quote</strong> for your business phone system needs.</div>

      <div class="caption">Compare:</div>
      <div class="bottom-clear"></div> 
      <div class="options">
        <div class="option">Top Rated Providers</div>
        <div class="option">HD Quality Service</div>
        <div class="option">No Contracts</div>
        <div class="option">Robust VoIP Services</div>
        <div class="option">Accredited BBB Companies</div>
        <div class="option">Unlimited Calling</div>
        <div class="option">Designed For Business</div>
      </div>
      <div class="options second">
        <div class="option">Hosted VoIP PBX</div>
        <div class="option">Verifiable References</div>
        <div class="option">Unified Communications</div>
        <div class="option">Service Reliability</div>
        <div class="option">Customer Experience</div>
        <div class="option">Phone Exchange Options</div>
        <div class="option">Video Calling</div>
      </div>
      
      <div class="bottom-clear"></div> 
        
    </div>

    <div class="right bottom">
      <h3><?php echo $node->q_data['bottom_text']['left_title']; ?></h3>
      <div class="text"><?php echo $node->q_data['bottom_text']['left_text']; ?></div>
      
      <h3><?php echo $node->q_data['bottom_text']['center_title']; ?></h3>
      <div class="text"><?php echo $node->q_data['bottom_text']['center_text']; ?></div>
      
      <h3><?php echo $node->q_data['bottom_text']['right_title']; ?></h3>
      <div class="text"><?php echo $node->q_data['bottom_text']['right_text']; ?></div>
    
    </div>

    <div class="bottom-clear"></div> 

    <?php
      //print render($content);
      echo render($content['metatags']);
    ?>
    <div class="bottom-clear"></div> 

  </div>



  
  <footer>
    <div class="links"><a href="/about-us">About Us</a><span class="delim">|</span><a href="/privacy-policy">Privacy Policy</a></div>
    <div class="copy">© 2012 GetVoIP.com | All Rights Reserved</div>
    <div class="copy">BizMedia Central LLC | New York, NY</div>
  </footer>

</div>

<?php if ($_SERVER['REDIRECT_URL'] == '/voip-provider-quotes-final'): ?> 
  <?php if ($_SERVER['HTTP_REFERER'] == 'http://getvoip.com/voip-provider-quotes'): ?> 
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
    <script>top.location.href="http://getvoip.com/voip-provider-quotes";</script>
  <?php endif;?>
<?php endif;?>
  
