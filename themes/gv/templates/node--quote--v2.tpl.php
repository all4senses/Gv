<div id="v2">
  
  <div id="gv-logo">
    <div class="logo"></div>
    <h3>Get Personalized Quotes & Compare Companies For Your VoIP Service Needs.</h3>
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

      <div class="sub_header1">By Switching to a Business</div>
      <div class="sub_header2">VoIP Phone System That's Right For You</div>
      <h2>Save Up To 65% Off a Traditional Phone System</h2>
    
    </div>
    
    <div class="left top">
      <?php 
        if ($_SERVER['REDIRECT_URL'] == '/voip-provider-quotes-final') {
          echo '<div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
        }
        else { 
          //echo gv_blocks_get_requestQuoteForPage_v2(); 
          
        }
      ?>
      <div class="bottom-clear"></div> 
    </div>



    <div class="right top">Let Us Pair You With A VoIP Service Provider<br/>That Best Fit Your Business Needs,<br/>At The Lowest Possible Price</div>

    <div class="left bottom">

      <div>Complete our <strong>2-Step FAST, FREE & EASY</strong> form and a VoIP expert will begin creating a custom quote for your business phone system needs.</div>

      <div class="options">
        <div class="option">Unlimited Calling</div>
        <div class="option">Free Long Distance</div>
        <div class="option">Leading Industry Reliability</div>
        <div class="option">Quality VoIP Technology</div>
        <div class="option">24/7 U.S. Customer Support</div>
        <div class="option">and much more..</div>
      </div>

      <div>Want to Save Money On Your Business VoIP Phone System?</div>
      <input type="button" value="Request a Quote" />
      <div>We'll Take Care Of The Rest!</div>

    </div>

    <div id="right bottom">
      <a href="#">What is a VoIP Phone System?</a>
      <a class="bottom" href="#">Advantages of VoIP</a>
    </div>



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
  
