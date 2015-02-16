  <?php
    if ($node->title == 'Request a Quote page v5 Final') {
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




<div id="v5">
  <div id="quote-content">

    
      <div class="full logo">

          <div id="gv-logo">
            <?php 
              echo '<div class="logo"><img src="http://getvoip.com/sites/all/themes/gv_orange/css/images/getvoip-logo4.png" alt="GetVoIP" title="GetVoIP" /></div>'; 
            ?>
          </div>

      </div>
  

      <div class="bottom-clear"></div> 
  
  


      <div class="full">
        
        <div id="main-content">

              <div class="content<?php echo ($_SERVER['REDIRECT_URL'] == '/lp-iscope-final' ? ' final' : '')?>"<?php print $content_attributes; ?>>

                    <?php //echo '<div class="field-name-field-q-image">', theme('image', array( 'path' => $initialQuotePage_node->field_q_image['und'][0]['uri'], 'alt' => $initialQuotePage_node->field_q_image['und'][0]['alt'], 'title' => $initialQuotePage_node->field_q_image['und'][0]['title'])), '</div>'; ?>
                    <!--<div class="field-name-field-q-image"><img typeof="foaf:Image" src="http://getvoip.com/sites/default/files/qp-v4-girl2.png" alt="" title=""></div>-->
                    
                    <div class="left">
                            <h2>Save Up To 80% On a Better<br/> Business Phone System!</h2>
                            <div class="caption">Benefits & Features:</div>
                            <div class="text bullet v1"><strong>Lowest Rates & Exclusive Discounts</strong></div>
                            <div class="text bullet v2"><strong>Personalized Quotes From Top Providers</strong></div>
                            <div class="text bullet v3"><strong>No Contracts Or Set-Up Fees</strong></div>
                            <div class="text bullet v4"><strong>Intuitive Feature-Loaded HD Phones</strong></div>

                            <div class="ps"><span>Over 100,000 Quotes Delivered</span> Average business savings of $240/mo</div>
                    </div>

              </div>
          
          
          
          
          
          
          
              <div style="display: none;">
                <div id="exitIntent"> 
                  <div id="line-1">Do You Want To Save BIG On</div>
                  <div id="line-2">Reliable Business Phone Service?</div>

                  <div id="line-3">Get Voice, Fax, Text and Video Conferencing for $19/mo.</div>

                  <a href="/business" id="yes" target="_top">YES</a>
                  <div id="no">NO - I like overpaying for my old phone service.</div>
                </div>
              </div>
          
              <?php
              
                // Exit intent Ad popup block.
                // 
                //global $user; 
                //if ($user->uid) 
//                {
//                  // Colorbox for popup window.
//                  //1, 3, 4, 
//                  drupal_add_js('sites/all/libraries/jquery.plugins/colorbox/colorbox/jquery.colorbox.js');
//                  drupal_add_css('sites/all/libraries/jquery.plugins/colorbox/example1/colorbox.css', array('preprocess' => FALSE)); // array('group' => CSS_THEME, 'preprocess' => FALSE)
//
//                  // Exit intent Ad block main js.
//                  $path_to_custom_js = drupal_get_path('module', 'gv_misc') . '/js/';
//                  drupal_add_js($path_to_custom_js . 'gv_exitIntent_lpV4.js');
//                }

              
              ?>
          
          
          
          

              <?php if ($_SERVER['REDIRECT_URL'] == '/lp-iscope-final'): ?>

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

                  <div id="verisign"></div>
                  
                  <div class="right">
                    <div id="right-bottom">
                      <?php echo gv_blocks_get_requestQuoteForPage_v5(); ?>
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



      <div class="full excerpt">
        
          <div id="upper-block">
            <h1>We identify and rank the best business VoIP providers and phone systems.</h1>

            <div class="quotes one">
              <div class="text">"GetVoIP stands out in the business VoIP implementation space by providing expert analysis and unparalleled information along with hands-on reviews and feature explanations, which ultimately translates into an easy to setup and manage phone system."</div>
              <div class="source"><span class="image"></span>Chris Rabbu, VP of Marketing at Vocalocity, Inc.</div>
            </div>
            <div class="bottom-clear"></div> 
          </div>

      </div> <!-- of Full -->

      
      
      
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
                echo '<img src="http://getvoip.com/sites/all/themes/gv_orange/css/images/lp-slider-logos-v41.jpg" alt="Supported by Major VoIP Brands" />';

            ?>

            <div class="bottom-clear"></div> 
          </div>
        
      </div> <!-- of Full -->        

  
  

      
      <div class="full bottom">

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

      </div> <!-- of Full --> 
      

  
      <footer id="footer" role="contentinfo" class="region-footer clearfix">
        <div id="footer-inside">

          <?php
              //echo '<div id="block-gv-blocks-follow-links"><div class="follow-us">Follow Us</div>', gv_blocks_get_headerLinks(), '</div>';
              //echo gv_blocks_getBlockThemed(array('module' => 'gv_blocks', 'delta' => 'footer_menu', 'no_subject' => TRUE, /*'class' => 'block-om-maximenu',*/ 'shadow' => FALSE), TRUE, '+31 day');
          ?>


          <div class="c">GetVoIP is an independent VoIP service comparison guide, offering unbiased personalized quotes and exclusive reports.
            <div>© 2015 GetVoIP.com | All Rights Reserved</div>
          </div>

        </div>
      </footer> <!-- /#footer -->
  
  
  
  
  

  </div> <!-- End of <div id="quote-content"> -->
  
</div> <!-- End of <div id="v4"> -->



<?php if ($_SERVER['REDIRECT_URL'] == '/lp-iscope-final'): /* If we are on the final page, after the submission */ ?> 

          <?php /*if ($_SERVER['HTTP_REFERER'] == 'http://getvoip.com/lp-iscope'):*/  /* If we get the final page from the main quote page, what is correct.*/ ?> 
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
            <script>top.location.href="http://getvoip.com/lp-iscope";</script>
          <?php endif;*/?>
    
<?php else: // Else of if ($_SERVER['REDIRECT_URL'] == '/lp-iscope-final'):
// So we are on the lending page '/lp-iscope' 
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
  
<?php endif; // End of Else of if ($_SERVER['REDIRECT_URL'] == '/lp-iscope-final'):?>
  
