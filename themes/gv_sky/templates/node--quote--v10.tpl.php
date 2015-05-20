  <?php
      if (!$is_admin) {
        drupal_static_reset('drupal_add_css');
      }
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
      
      // Add exit intent
      drupal_add_js('/sites/all/themes/gv_sky/js/popup.js');
      // drupal_add_js('/sites/all/themes/gv_sky/js/global.js');
    }
    drupal_add_css('sites/all/themes/gv_sky/css/lpv10.css', array('preprocess' => FALSE, 'type' => 'external' ));
    drupal_add_css('sites/all/themes/gv_sky/css/popup-exit.css', array('preprocess' => FALSE, 'type' => 'external' ));
  ?>





      <header id="masthead" class="site-header" role="banner">
        <div class="wrap">

          <div class="logo">
            <img src="/sites/all/themes/gv_sky/images/lpv10/logo-lp.png" width="206" height="53" alt="GetVoIP" title="GetVoIP">
          </div>

          <div class="slogan-wrap">
            <div class="slogan">The VoIP Authority Trusted by <span>Millions</span></div>
          </div>

          <div class="clearfix-dk"></div>
        </div>
      </header>






      
      <main class="main section full-height" role="main">
        
        <?php if (!$final_page): ?>
        
          <?php echo gv_blocks_get_requestQuoteForPage_v10('us'); ?>
        
        <?php else: ?>
          <div class="form-main pdf-page">
            <div class="title-first pdf">
              <h1>Download Your Free VoIP Buyer's Guide</h1>
            </div>
            <form class="form">
              <div class="step one show">
                <div class="wrap">
                  <a href="http://getvoip.com/pdfs/SMBVOIPAdvantagesWhitePaper.pdf" target="_blank"><div class="download"><div class="icon-download"></div><span>Download PDF</span></div></a>
                </div>
                <p class="thanks"><span>Thank you</span> for requesting a quote. A dedicated VoIP specialist will be calling you very shortly to finalize the quote. <br><br>In the meantime, visit <a href="http://getvoip.com/business">GetVoIP.com</a> to browse featured business phone providers.</p>
              </div>
            </form>
          </div>
        <?php endif; ?>
        
        <div class="feature">
          <div class="wrap">
            <h5>Featured In:</h5>
            <div class="companies">
              <div class="company binsider"><div class="cm-image"></div></div>
              <div class="company forbes"><div class="cm-image"></div></div>
              <div class="company fox-b"><div class="cm-image"></div></div>
              <div class="company pcworld"><div class="cm-image"></div></div>
            </div>
            <div class="clearfix-dk"></div>
          </div>
        </div>
      </main>



      
      <section class="section below-fold">
        <div class="testimonials">
          <h1 class="boost">Over <span>1 Million</span> Happy Businesses Served.</h1>
          <h2 class="boost">Here's what a few of them have to say about GetVoIP</h2>
          <div class="wrap">
            <div class="testimonial">
              <div class="wrap">
                <div class="quote">
                  <p>GetVoIP's comparison guides made it easy to make an informed and cost-effective decision.</p>
                </div>
                <div class="person">
                  <div class="photo">
                    <div class="circle"><img src="/sites/all/themes/gv_sky/images/lpv10/richard.png" alt="Richard Janes"></div>
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
                    <div class="circle"><img src="/sites/all/themes/gv_sky/images/lpv10/mark.png" alt="Mark Crosbie"></div>
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
        
        <div class="footer">© 2015 GetVoIP.com | All Rights Reserved</div>
        
      </section>







<!-- Footer with js codes -->
<?php if ($final_page): ?> 

            
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
            

            
            
            
<?php endif; // End of Else of if ($_SERVER['REDIRECT_URL'] == '/service-quotes-final'):?>
  

