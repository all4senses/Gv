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





      <header id="masthead" class="site-header" role="banner">
        <div class="wrap">

          <div class="logo">
            <img src="/sites/all/themes/gv_blue/css/sass/lpv10-img/logo.png" width="210" height="58" alt="GetVoIP" title="GetVoIP">
          </div>

          <div class="slogan-wrap">
            <div class="slogan">The VoIP Authority Trusted by <span>Millions</span></div>
          </div>

          <div class="clearfix-dk"></div>
        </div>
      </header>



      
      <section class="section below-fold">
        <div class="testimonials">
          <h1 class="boost">Over <span>1 Million</span> Happy Businesses Served.</h1>
          <h2 class="boost">Here's what a few of them have to say about GetVoip</h2>
          <div class="wrap">
            <div class="testimonial">
              <div class="wrap">
                <div class="quote">
                  <p>GetVoIP's comparison guides made it easy to make an informed and cost-effective decision.</p>
                </div>
                <div class="person">
                  <div class="photo">
                    <div class="circle"><img src="img/richard.png" alt="Richard Janes"></div>
                  </div>
                  <div class="name-meta">
                    <p class="full-name">Richard Janes</p>
                    <p class="job">Fanology Social, Inc.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial">
              <div class="wrap">
                <div class="quote">
                  <p>I had no idea where to start looking. GetVoIP found exactly what we needed in under 5 mins.</p>
                </div>
                <div class="person">
                  <div class="photo">
                    <div class="circle"><img src="img/mark.png" alt="Mark Crosbie"></div>
                  </div>
                  <div class="name-meta">
                    <p class="full-name">Mark Crosbie</p>
                    <p class="job">Flux Recruitment</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix-dk"></div>
          </div>
        </div>
      </section>







<!-- Footer with js codes -->
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