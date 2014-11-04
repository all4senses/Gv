  <?php
    if ($node->title == 'Request a Quote page v7 Final') {
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




<div id="v7" class="us">
  <div id="quote-content">

    
      <div class="full logo">

          <div id="gv-logo">
            <?php 
              echo '<div class="logo"><img src="/images/theme/get-voip-logo5.png" alt="GetVoIP" title="GetVoIP" /></div>'; 
            ?>
            <!--<div class="ps"><span>Over 100,000 Quotes Delivered</span> Average business savings of $240/mo</div> -->
            
            <!--
            <section id="block-gv-blocks-shopperapproved-badge" class="block block-gv-blocks contextual-links-region odd first">
              <div class="content">
                <a href="http://www.shopperapproved.com/reviews/getvoip.com/" onclick="var nonwin=navigator.appName!= 'Microsoft Internet Explorer'?'yes':'no'; var certheight=screen.availHeight-90; window.open(this.href,'shopperapproved','location='+nonwin+',scrollbars=yes,width=620,height='+certheight+',menubar=no,toolbar=no'); return false; "><img src="https://c683207.ssl.cf2.rackcdn.com/12265-r.gif" style="border: 0" alt="" oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by Shopper Approved � '+d.getFullYear()+'.'); return false;"></a> 
              </div>
            </section>
            -->
            
          </div>
        
          
          
      </div>
  
      
      
      <div class="bottom-clear"></div> 
  
  


      <div class="full main">
        <img src="/images/theme/lp7-back.jpg" style="position: absolute;">
        <div id="main-content">

              <h2><span>Save Up To 65%</span> on a Better<br/> Business Phone Solution!</h2>
              <h4>No contracts or set-up fees</h4>
              
              <img id="q-image" src="/images/theme/lp7-phone.png" />
              
              <div class="content<?php echo ($_SERVER['REDIRECT_URL'] == '/service-quotes-final' ? ' final' : '')?>"<?php print $content_attributes; ?>>

                    <div class="left">
                            
                            <div class="caption">Simplify Your VoIP Buying Process</div>
                            <div class="text bullet v3"><strong>Fast, Free VoIP Solution Quotes</strong></div>
                            <div class="text bullet v1"><strong>Free Number Porting, & Instant Setup</strong></div>
                            <div class="text bullet v2"><strong>Tap into Prescreened Solutions</strong></div>
                            <!-- <div class="text bullet v3"><strong>No Contracts & No Set-up Fees</strong></div> -->
                            <div class="text bullet v4"><strong>Full-featured HD Phones Included</strong></div>
                            
                            <!--
                            <div class="caption">Benefits & Features:</div>
                            <div class="text bullet v1"><strong>Best Rates & Exclusive Offers</strong></div>
                            <div class="text bullet v2"><strong>Custom Quotes From Top Providers</strong></div>
                            <div class="text bullet v3"><strong>No Contracts Or Set-Up Fees</strong></div>
                            <div class="text bullet v4"><strong>Feature Loaded HD Phones</strong></div>
                            -->

                            
                    </div>

              </div>
          
          
          
          
          
          
              <?php /*
              <div style="display: none;">
                <div id="exitIntent"> 
                  <div id="line-1">Do You Want To Save BIG On</div>
                  <div id="line-2">Reliable Business Phone Service?</div>

                  <div id="line-3">Get Voice, Fax, Text and Video Conferencing for $19/mo.</div>

                  <a href="/business" id="yes" target="_top">YES</a>
                  <div id="no">NO - I like overpaying for my old phone service.</div>
                </div>
              </div>
              */ ?>
              <?php
              
                // Exit intent Ad popup block.
                // 
                //global $user; 
                //if ($user->uid) 
                {
                  /*
                  // Colorbox for popup window.
                  //1, 3, 4, 
                  drupal_add_js('sites/all/libraries/jquery.plugins/colorbox/colorbox/jquery.colorbox.js');
                  drupal_add_css('sites/all/libraries/jquery.plugins/colorbox/example1/colorbox.css', array('preprocess' => FALSE)); // array('group' => CSS_THEME, 'preprocess' => FALSE)

                  // Exit intent Ad block main js.
                  $path_to_custom_js = drupal_get_path('module', 'gv_misc') . '/js/';
                  drupal_add_js($path_to_custom_js . 'gv_exitIntent_lpV4.js');
                  */
                }

              
              ?>
          
          
          
          

              <?php if ($_SERVER['REDIRECT_URL'] == '/service-quotes-final'): ?>

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



      <?php /*
      <div class="full bottom">

          <div id="bottom">
            <div class="text first">
              <span></span>
              <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['left_title']; ?></h3>
              <div><?php echo $initialQuotePage_node->q_data['bottom_text']['left_text']; ?></div>
            </div>
            <div class="text">
              <span></span>
              <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['center_title']; ?></h3>
              <div><?php echo $initialQuotePage_node->q_data['bottom_text']['center_text']; ?></div>
            </div>
            <div class="text last">
              <span></span>
              <h3><?php echo $initialQuotePage_node->q_data['bottom_text']['right_title']; ?></h3>
              <div><?php echo $initialQuotePage_node->q_data['bottom_text']['right_text']; ?></div>
            </div>


            <div class="bottom-clear"></div>
          </div>

      </div> <!-- of Full --> 
      */?>
      
      
      <div class="full brands">
          
          <div id="brands">
            <h2>Supported by Major Brands:</h2>
            <?php
                /*
                if (isset($initialQuotePage_node->field_q_image2['und'][0])) {
                  echo '<ul id="mycarousel" class="jcarousel-skin-tango">';
                 
                  $image_style = 'landing_page_logos_slider_gray'; //'thumbnail'
                  foreach ($initialQuotePage_node->field_q_image2['und'] as $brand) {
                    echo '<li>', '<table><tbody><tr><td>', 
                            theme('image_style', array( 'path' =>  $brand['uri'], 'style_name' => $image_style, 'alt' => $brand['alt'], 'title' => $brand['title'])),
                        '</td></tr></tbody></table>', '</li>'; 
                  }
                  echo '</ul>';
                }
                */
                echo '<img src="/images/theme/lp-slider-logos-v7.png" alt="Supported by Major VoIP Brands" />';
                global $user;
                if ($user->uid == 1) {
                  echo gv_blocks_get_topProvidersForLP('Top 5');
                }

            ?>

            <div class="bottom-clear"></div> 
          </div>
        
      </div> <!-- of Full -->        

  
  


      <div class="full excerpt">
        
          <div id="upper-block">
            <!--<h1>We identify and rank the best business VoIP providers and phone systems.</h1>-->

            <div class="quotes one">
              <div class="text"><span></span>GetVoIP stands out in the business VoIP implementation space by providing expert analysis and unparalleled information along with hands-on reviews and feature explanations, which ultimately translates into an easy to setup and manage phone system.<div></div></div>
              <div class="source"><span class="image"></span><div>Chris Rabbu</div> VP of Marketing at Vonage, Inc.</div>
            </div>
            <div class="bottom-clear"></div> 
          </div>

      </div> <!-- of Full -->


      
      
            

  
      <footer id="footer" role="contentinfo" class="region-footer clearfix">
        <div id="footer-inside">

          <?php
              //echo '<div id="block-gv-blocks-follow-links"><div class="follow-us">Follow Us</div>', gv_blocks_get_headerLinks(), '</div>';
              //echo gv_blocks_getBlockThemed(array('module' => 'gv_blocks', 'delta' => 'footer_menu', 'no_subject' => TRUE, /*'class' => 'block-om-maximenu',*/ 'shadow' => FALSE), TRUE, '+31 day');
          ?>


          <div class="c"><!--GetVoIP is an independent VoIP service comparison guide, offering unbiased personalized quotes and exclusive reports.-->
            <div>© 2014 GetVoIP.com | All Rights Reserved</div>
          </div>

        </div>
      </footer> <!-- /#footer -->
  
  <!--
      <div class="full underfooter">
        
        <div id="underfooter-inside">
          
        </div>
        
      </div>
  -->
  

  </div> <!-- End of <div id="quote-content"> -->
  
</div> <!-- End of <div id="v7"> -->



<?php if ($_SERVER['REDIRECT_URL'] == '/service-quotes-final'): /* If we are on the final page, after the submission */ ?> 

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