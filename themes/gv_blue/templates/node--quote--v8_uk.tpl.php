  <?php
    if ($node->title == 'Request a Quote page v8_uk Final') {
//      $path_to_custom_js = drupal_get_path('module', 'gv_blocks') . '/js/';
//      drupal_add_js($path_to_custom_js . 'gv_brandsCarousel.js');
//      drupal_add_js('sites/all/libraries/jquery.plugins/jcarousel/jquery.jcarousel.min.js');
//      drupal_add_css('sites/all/libraries/jquery.plugins/jcarousel/skins/tango/skin.css');
  
      $initialQuotePage_node = gv_misc_getInitialQuotePageNode($node->title);
      $initialQuotePage_node->q_data = unserialize($initialQuotePage_node->field_q_data['und'][0]['value']);
    }
    else {
      $initialQuotePage_node = $node;
    }
  ?>




<div id="v8">
  <div id="quote-content">

    
      <div class="full logo">

          <div id="gv-logo">
            <div class="logo"><img src="http://getvoip.com/sites/all/themes/gv_blue/css/images/getvoip-logo8.png" alt="GetVoIP" title="GetVoIP" /></div>
          </div>
        
          
          
      </div>
  
      
      
      <div class="bottom-clear"></div> 
  
  


      <div class="full main">
        <!--<img src="/images/theme/lp7-back.jpg" style="position: absolute;"> -->
        <div id="main-content"> 

              
              <?php if ($_SERVER['REDIRECT_URL'] == '/lpv8-uk-final'): ?>

                  <div class="left final">
                    
                    <h2><span>Save Up To 65%</span> on an Award Winning Business Phone Solution!</h2>
                    <div class="subtitle">In just under 2 minutes we'll match you with pre-screened VoIP providers that offer the best business phone systems for your specific needs.</div>

                    <?php  
                      //echo '<a class="guide" href="/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank">Download Your Free VoIP Buyer\'s Guide<img src="/sites/all/themes/gv_orange/css/images/click-here-button.png" /></a><div class="quote-final">' . t('<p><strong>Thank you</strong> for taking your time to complete our form. A VoIP Expert will be contacting you shortly to provide you with a personalized VoIP Service quote.</p><p>In the meantime, you can gain a great deal of VoIP information right here at <a href="http://getvoip.com">GetVoIP.com</a></p>') . '</div>';
                    
                    echo '<a class="guide" href="/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank">Download Your Free VoIP Buyer\'s Guide'
                            , '<img src="/sites/all/themes/gv_blue/css/images/click-here-button.png" />'
                        , '</a>'
                        , '<div class="quote-final">' 
                          , '<p><strong>Thank you</strong> for requesting a quote. A dedicated VoIP specialist will be calling you very shortly to finalize the quote.</p>'
                          , '<p>In the meantime, visit <a href="http://getvoip.com/business">GetVoIP.com</a> to browse featured business phone providers.</p>' 
                        , '</div>';
                    ?>
                  </div>
              
              <?php else: ?>
                  
                  <div class="left">
                    
                    <h2><span>Save Up To 65%</span> on an Award Winning Business Phone Solution!</h2>
                    <div class="subtitle">In just under 2 minutes we'll match you with pre-screened VoIP providers that offer the best business phone systems for your specific needs.</div>

                     <?php echo gv_blocks_get_requestQuoteForPage_v8_uk(); ?>
                  </div>

                  <form action="http://ww3.vocalocity.com/l/7772/2012-09-28/36c856" method="post"></form>

              <?php endif; ?>
                
                        
                <div class="right-side">
                    <img src="http://getvoip.com/sites/all/themes/gv_blue/css/images/lp8-image.png" />
                    <div>Our team of 59 unbiased VoIP analysts have reviewed <span>108</span> business phone systems.</div>
                </div>
                
                <?php
                  echo render($content['metatags']);
                ?>

          </div> <!-- <div id="main-content"> -->

      </div> <!-- of Full -->



      
      <div class="full bottom">

        <div id="bottom-inside">

            <div class="left">
                  
              <div class="caption">Our Real-time Quotes Include:</div>
              <div class="text bullet v1"><strong>Lowest Rates & Exclusive Discounts</strong><div>Discover the lowest possible rates from industry leaders.</div></div>
              <div class="text bullet v2"><strong>Personalized Quotes From Top Providers</strong><div>Get quotes from verified providers that will meet your needs.</div></div>
              <div class="text bullet v3"><strong>No Contracts, Risk-Free Guarantee</strong><div>We guarantee each service to be contract free and hassle free.</div></div>
              <div class="text bullet v4"><strong>Free Trials on All-inclusive Phone Systems</strong><div>Voice, fax, text, web collaboration, and HD Video Meetings.</div></div>
                            
            </div>
            
            <div class="right">
              <div>As Featured In</div>
              <img src="http://getvoip.com/sites/all/themes/gv_blue/css/images/lp8uk-image2.jpg" />
            </div>
            
        </div>

      </div> <!-- of Full --> 
      

      <div class="full excerpt">
        
          <div id="upper-block">
            <!--<h1>We identify and rank the best business VoIP providers and phone systems.</h1>-->

            <div class="quotes one">
              <div class="text"><span></span>GetVoIP stands out in the business VoIP implementation space by providing expert analysis and unparalleled information along with hands-on reviews and comparisons.<div></div></div>
              <div class="source"><span class="image"></span><div>Chris Rabbu</div> VP of Marketing at Vonage, Inc.</div>
            </div>
            <div class="bottom-clear"></div> 
          </div>

      </div> <!-- of Full -->


      
      
            

  
      <footer id="footer" role="contentinfo" class="region-footer clearfix">
        <div id="footer-inside">

          <div class="left">GetVoIP is an independent VoIP service comparison guide, offering unbiased personalized quotes and exclusive reports.</div>
          <div class="right"><img src="http://getvoip.com/sites/all/themes/gv_blue/css/images/getvoip-logo8.png" alt="GetVoIP" title="GetVoIP" /><div>© 2015 | All Rights Reserved</div></div>

        </div>
      </footer> <!-- /#footer -->
  
  

  </div> <!-- End of <div id="quote-content"> -->
  
</div> <!-- End of <div id="v8"> -->



<?php if ($_SERVER['REDIRECT_URL'] == '/lpv8-uk-final'): /* If we are on the final page, after the submission */ ?> 

          <?php /*if ($_SERVER['HTTP_REFERER'] == 'http://getvoip.com/lpv8'):*/  /* If we get the final page from the main quote page, what is correct.*/ ?> 
            
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
            
            <!-- inserted by me on 21.01.2014 -->
            <script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/b2106e00-2863-40e4-844c-f95b8ba90d29/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"1856373",type:"1",actionid:"210748"})</script> 
            <noscript> <iframe src="//flex.msn.com/mstag/tag/b2106e00-2863-40e4-844c-f95b8ba90d29/analytics.html?dedup=1&domainId=1856373&type=1&actionid=210748" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>
            

            
            
            <!-- Business.com Conversion Tracking Code for "Network Pixel" -->
            <script language="JavaScript" src="http://roi.business.com/crm/js/conversion.js"></script>
            <script language="JavaScript" type="text/javascript">

            var bdc_conversion_value = 80.00;
            var bdc_conversion_id = "13223";
            BDC_RecordConversion(bdc_conversion_value, bdc_conversion_id);

            </script>
            <noscript>
            <img height=1 width=1 src="http://roi.business.com/crm/images/conversion.gif?bdc_conversion_id=13223&bdc_conversion_value=80.00"/>
            </noscript>

            
            
            
            
            
          <?php /*global $user; elseif ($user->uid != 1): // If we get the final page from an other page, what is INCORRECT, we just redirect a user to the main quote page.?>
            <script>top.location.href="http://getvoip.com/lpv8-uk";</script>
          <?php endif;*/?>
    
<?php else: // Else of if ($_SERVER['REDIRECT_URL'] == '/lpv8-uk-final'):
// So we are on the lending page '/lpv8-uk' 
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
  
  
<?php endif; // End of Else of if ($_SERVER['REDIRECT_URL'] == '/lpv8-uk-final'):?>
  

  <script src="//cdn.optimizely.com/js/786756874.js"></script>