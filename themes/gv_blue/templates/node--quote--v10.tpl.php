  <?php
    $final_page = (!empty($variables['node']->field_version['und'][1]['value']) && $variables['node']->field_version['und'][1]['value'] == 'final') ? TRUE : FALSE;
    if (strpos($variables['node']->field_version['und'][0]['value'], '_')) {
      $version = explode('_', $variables['node']->field_version['und'][0]['value']);
      $subversion = $version[1];
      $version = $version[0];
     }
     else {
      $version = $variables['node']->field_version['und'][0]['value'];
      $subversion = '';
     }
  
    if ($final_page) {
      $initialQuotePage_node = gv_misc_getInitialQuotePageNode($node->title);
      $initialQuotePage_node->q_data = unserialize($initialQuotePage_node->field_q_data['und'][0]['value']);
    }
    else {
      $initialQuotePage_node = $node;
    }
  ?>




<div <?php echo 'id="v' . $version . '" class="version-wrapper ' . $subversion . '"';?>>
  
  <div id="quote-content">

      <!--
      <div class="full logo">

          <div id="gv-logo">
            <?php 
              echo '<div class="logo"><img src="/sites/all/themes/gv_blue/css/sass/lpv10-img/logo.png" alt="GetVoIP" title="GetVoIP" /></div>'; 
            ?>
            
          </div>
          
      </div>
      -->
      <header id="masthead" class="site-header" role="banner">
        <div class="wrap">

          <div class="logo">
            <img src="/images/theme/get-voip-logo5.png" width="210" height="58" alt="GetVoIP" title="GetVoIP">
          </div>

          <div class="slogan-wrap">
            <div class="slogan">The VoIP Authority Trusted by <span>Millions</span></div>
          </div>

          <div class="clearfix-dk"></div>
        </div>
      </header>
      
      <div class="bottom-clear"></div> 
  
  


      <div class="full main">

        <div id="main-content">

              <h2><span>Save Up To 65%</span> on a Better<br/> Business Phone Solution!</h2>
              <h4>No contracts or set-up fees</h4>
              
              <img id="q-image" src="/images/theme/lp7-phone.png" />
              
              <div class="content<?php echo ($final_page ? ' final' : '')?>"<?php print $content_attributes; ?>>

                    <div class="left">
                            
                            <div class="caption">Simplify Your VoIP Buying Process</div>
                            <div class="text bullet v3"><strong>Fast, Free VoIP Solution Quotes</strong></div>
                            <div class="text bullet v1"><strong>Free Number Porting, & Instant Setup</strong></div>
                            <div class="text bullet v2"><strong>Tap into Prescreened Solutions</strong></div>
                            <div class="text bullet v4"><strong>Full-featured HD Phones Included</strong></div>
                            
                    </div>

              </div>
          
              <?php if ($final_page): ?>

                  <div class="right final">
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

                  <!--<div id="verisign"></div> -->
                  
                  <div class="right">
                    <div id="right-bottom">
                      <?php echo gv_blocks_get_requestQuoteForPage_v7(); ?>
                      <div class="bottom-clear"></div> 
                    </div>
                  </div>

                <form action="http://ww3.vocalocity.com/l/7772/2012-09-28/36c856" method="post"></form>


                <?php endif; ?>

                <?php
                  echo render($content['metatags']);
                ?>
                <div class="bottom-clear"></div> 

          </div>

      </div> <!-- of Full -->



      
      
      <div class="full brands">
          
          <div id="brands">
            
            <?php
                  echo '<h2>Top 5 Recommended Business Phone Providers:</h2>', gv_blocks_get_topProvidersForLP('Top 5');
            ?>

            <div class="bottom-clear"></div> 
          </div>
        
      </div> <!-- of Full -->        

  
  


      <div class="full excerpt">
        
          <div id="upper-block">

            <div class="quotes one">
              <div class="text"><span></span>GetVoIP stands out in the business VoIP implementation space by providing expert price point analysis, and feature explanations, which ultimately translates into an easy to setup and manage phone system.<div></div></div>
              <div class="source"><span class="image"></span><div>Chris Rabbu</div> VP of Marketing at Vonage, Inc.</div>
            </div>
            <div class="bottom-clear"></div> 
          </div>

      </div> <!-- of Full -->


      
      
            

  
      <footer id="footer" role="contentinfo" class="region-footer clearfix">
        <div id="footer-inside">

          <div class="c">
            <div>© 2015 GetVoIP.com | All Rights Reserved</div>
          </div>

        </div>
      </footer> <!-- /#footer -->
  

  </div> <!-- End of <div id="quote-content"> -->
  
</div> <!-- End of <div id="v7"> -->



<?php if ($final_page): ?> 

          <?php /*if ($_SERVER['HTTP_REFERER'] == 'http://getvoip.com/service-quotes'):*/  /* If we get the final page from the main quote page, what is correct.*/ ?> 
            
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

            
            
            <!-- Added 14.08.2014 -->
            <img src='https://trending.revcontent.com/ads/tracker.php?t=MzE5Njs2MjIy'/>
            
            
            <!-- Added 14.08.2014 -->
            <!-- 7Search Code for Conversion Page (start) -->
            <script language="JavaScript" type="text/javascript">
            var _7search_conversion_advid = 221448;
            var _7search_conversion_type = "lead";
            var _7search_conversion_value = 1;
            </script>
            <script language="JavaScript" type="text/javascript" src="http://conversion.7search.com/conversion/v1/conversion.js"></script>
            <noscript><img width="1" height="1" border="0" src="http://conversion.7search.com/conversion/v1/?advid=221448&urlid=&type=lead&value=1&noscript=1" /></noscript>
            <!-- 7Search Code for Conversion Page (end) -->

            
            
            
          <?php /*global $user; elseif ($user->uid != 1): // If we get the final page from an other page, what is INCORRECT, we just redirect a user to the main quote page.?>
            <script>top.location.href="http://getvoip.com/service-quotes";</script>
          <?php endif;*/?>
    
<?php else: // Else of if ($_SERVER['REDIRECT_URL'] == '/service-quotes-final'):
// So we are on the lending page '/service-quotes' 
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
  
  
<?php endif; // End of Else of if ($_SERVER['REDIRECT_URL'] == '/service-quotes-final'):?>
  

  <script src="//cdn.optimizely.com/js/786756874.js"></script>