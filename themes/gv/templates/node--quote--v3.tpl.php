<?php 
  //dpm($node);
  //dpm($node->q_data);
  //dpm($content);
  // Hide comments, tags, and links now so that we can render them later.
  //hide($content['links']);
  //hide($content['field_topics']);
?>


<div id="gv-logo">
  <div class="logo"></div>
  <h3>Get Personalized Quotes & Compare Companies For Your VoIP Service Needs.</h3>
</div>

<?php 
/*
  <!--
  <div id="experian">
    <div class="text">All Vendors are<br>Prescreened by Experian</div><div class="logo"></div>
  </div>
  -->
*/
?>
<div class="partners">
  <div id="some-logo"></div>
  <a id="sitelock" href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=getvoip.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/getvoip.com"/></a> 
</div>

<div class="bottom-clear"></div> 


<div class="content"<?php print $content_attributes; ?>>

  <h2>Don't Trust Your Phone System With Just Anyone!</h2>
  <h1<?php 
  
  
  
  
  
  //http://www.lullabot.com/articles/how-does-rdf-work-drupal-7
  
  print /*$title_attributes*/preg_replace('/datatype=".*"/', '', $title_attributes); 
  
  
  
  
  
  
  ?>><?php //print $title; ?>Compare Companies. Compare Rates.</h1>
  <div class="left">
    <?php 
      if ($_SERVER['REDIRECT_URL'] == '/request-voip-phone-system-quote-final') {
        echo '<div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
      }
      else {
        echo gv_blocks_get_requestQuoteForPage(); 
      }
    ?>
  </div>
  
  <?php if ($_SERVER['REDIRECT_URL'] == '/request-voip-phone-system-quote-final'): ?>
    <div class="right-final">
      <?php 
        echo '<a href="/">' , render($content['field_q_image']) , '</a>'; 
        echo '<h2>' , t('GET ACCESS TO THE LARGEST<br/> VOIP SERVICE GUIDE<br/> IN THE NATION!') , '</h2><div class="link">' , l(t('Learn more'), '<front>') , '</div>';
      ?>
    </div>
  <?php else: ?>
  
    <div class="center">
      <?php echo render($content['field_q_image']); ?>
      <div class="quote">"We found a VoIP company that offers us more features at a much better price"</div>
      <div class="author">Rick Miller - Acme Inc</div>
    </div>
    <div class="right">
      <div class="options">
        <div class="option">Top Rated Providers</div>
        <div class="option">HD Quality Service</div>
        <div class="option">No Contracts</div>
        <div class="option">Robust VoIP Services</div>
        <div class="option">Accredited BBB Companies</div>
        <div class="option">Unlimited Calling</div>
        <div class="option">Designed For Business</div>
      </div>
      <div id="right-bottom">
        <div class="image"></div>
        <div class="links">Get smarter. Read reviews. <br/>Get facts. Save money!</div>
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
  <div id="cisco"></div><div id="polycom"></div><div id="microsoft"></div><div id="att"></div><div id="verizon"></div><div id="comcast"></div><div id="panasonic"></div>
  <div class="bottom-clear"></div> 
</div>

<div id="bottom">
  <div class="left">
    <h3><?php echo $node->q_data['bottom_text']['left_title']; ?></h3>
    <div class="text"><?php echo $node->q_data['bottom_text']['left_text']; ?></div>
  </div>
  <div class="center">
    <h3><?php echo $node->q_data['bottom_text']['center_title']; ?></h3>
    <div class="text"><?php echo $node->q_data['bottom_text']['center_text']; ?></div>
  </div>
  <div class="right">
    <h3><?php echo $node->q_data['bottom_text']['right_title']; ?></h3>
    <div class="text"><?php echo $node->q_data['bottom_text']['right_text']; ?></div>
  </div>
  <?php
    
  ?>
  
  <div class="bottom-clear"></div>
</div>

<footer>
  <div class="links"><a href="/about-us">About Us</a><span class="delim">|</span><a href="/privacy-policy">Privacy Policy</a></div>
  <div class="copy">© 2012 GetVoIP.com | All Rights Reserved</div>
  <div class="copy">BizMedia Central LLC | New York, NY</div>
</footer>

<?php if ($_SERVER['REDIRECT_URL'] == '/request-voip-phone-system-quote-final'): ?> 
  <?php if ($_SERVER['HTTP_REFERER'] == 'http://getvoip.com/request-voip-phone-system-quote'): ?> 
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
    <script>top.location.href="http://getvoip.com/request-voip-phone-system-quote";</script>
  <?php endif;?>
<?php endif;?>
  
