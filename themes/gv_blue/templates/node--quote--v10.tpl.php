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





      

      
      <main class="main section full-height" role="main" style="height: 728px;/* display: none; */">
        <div class="form-main">
          <div class="title-first">
            <h1>Simplify your Business VoIP buying process by letting us do the work for you.</h1>
            <h2>Answer a few questions and we'll find the best business phone solution for your specific needs.</h2>
          </div>
          <div class="title-loading">
            <div class="loading-gif"></div>
          </div>
          <div class="title-second">
            <h1>We have found <span class="result"><span class="number">4</span></span> VoIP companies matching your requirements!</h1>
            <h2>Where do we send the details for your 4 matches?</h2>
          </div>
          <form action="default.php" class="form">
            <div class="step one radio-filled" style="display: block;">
              <div class="wrap">
                <div class="fieldset choices service-type first">
                  <p class="question">How can we help you?</p>
                  <div class="wrap">
                    <div class="choice phone-only first">
                      <div class="icon-replace"></div>
                      <label for="replace">Replace current system</label>
                      <input type="radio" class="radio" name="service" id="replace" value="replace">
                    </div>
                    <div class="choice both checked">
                      <div class="icon-new"></div>
                      <label for="new"><span>Find</span> new system &amp; service</label>
                      <input type="radio" class="radio" name="service" id="new" value="new" checked="">
                    </div>
                    <div class="choice service-only">
                      <div class="icon-expand"></div>
                      <label for="expand-only">Expand current system</label>
                      <input type="radio" class="radio" name="service" id="expand-only" value="expand-only">
                    </div>
                  </div>
                  <div class="clearfix-dk"></div>
                </div>
                <div class="fieldset button-field next">
                  <div class="wrap">
                    <div class="button">
                      <p>Let's Get Started <span class="icon-angle-double-right"></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="step two" style="display: none;">
              <div class="wrap">
                <div class="fieldset choices people first">
                  <p class="question">How many people will be using your phone system?</p>
                  <div class="wrap">
                    <div class="choice first"><label for="1-4">1<span> </span>-<span> </span>4</label><input type="radio" class="radio" name="people" value="1-4" id="1-4"></div>
                    <div class="choice second"><label for="5-10">5<span> </span>-<span> </span>10</label><input type="radio" class="radio" name="people" value="5-10" id="5-10"></div>
                    <div class="choice third"><label for="11-20">11<span> </span>-<span> </span>20</label><input type="radio" class="radio" name="people" value="11-20" id="11-20"></div>
                    <div class="choice fourth"><label for="21-49">21<span> </span>-<span> </span>49</label><input type="radio" class="radio" name="people" value="21-49" id="21-49"></div>
                    <div class="choice fifth"><label for="50">50 +</label><input type="radio" class="radio" name="people" value="50" id="50"></div>
                    <div class="clearfix-dk"></div>
                  </div>
                </div>
                <div class="fieldset checkboxes">
                  <p class="question">What features are important to you?</p>
                  <div class="wrap top5">
                    <div class="wrap column left">
                      <div class="choice-checkbox first"><div class="checkbox-new"></div><label for="mobile">Mobile Capabilities</label><input type="checkbox" class="checkbox" name="features" value="mobile" id="mobile"></div>
                      <div class="choice-checkbox second"><div class="checkbox-new"></div><label for="fax">Online Fax</label><input type="checkbox" class="checkbox" name="features" value="fax" id="fax"></div>
                      <div class="choice-checkbox third"><div class="checkbox-new"></div><label for="monitoring">Call Management<span>/Monitoring</span></label><input type="checkbox" class="checkbox" name="features" value="monitoring" id="monitoring"></div>
                    </div>
                    <div class="wrap column right">
                      <div class="choice-checkbox first"><div class="checkbox-new"></div><label for="voicemail">Voicemail-to-email</label><input type="checkbox" class="checkbox" name="features" value="voicemail" id="voicemail"></div>
                      <div class="choice-checkbox second"><div class="checkbox-new"></div><label for="auto">Auto Attendant</label><input type="checkbox" class="checkbox" name="features" value="auto" id="auto"></div>
                      <div class="choice-checkbox third"><div class="checkbox-new"></div><label for="none">No Preference</label><input type="checkbox" class="checkbox" name="features" value="none" id="none"></div>
                    </div>
                    <div class="clearfix-dk"></div>
                  </div>
                </div>
                <div class="fieldset button-field top10">
                  <div class="wrap">
                    <div class="button fixed left back to-step-1">
                      <p>Back</p>
                    </div>
                    <div class="button right next to-step-3">
                      <p>Find Me Solutions <span class="icon-angle-double-right"></span></p>
                    </div>
                    <div class="clearfix-dk"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="step three">
              <div class="wrap">
                <div class="fieldset input half first firstname">
                  <p class="question">First Name</p>
                  <div class="wrap"><input type="text" class="field"></div>
                </div>
                <div class="fieldset input half first lastname">
                  <p class="question">Last Name</p>
                  <div class="wrap"><input type="text" class="field"></div>
                </div>
                <div class="clearfix-dk"></div>
                <div class="fieldset input half email">
                  <p class="question">Email Address</p>
                  <div class="wrap"><input type="text" class="field"></div>
                </div>
                <div class="fieldset input half phone">
                  <p class="question">Phone Number</p>
                  <div class="wrap"><input type="text" class="field"></div>
                </div>
                <div class="clearfix-dk"></div>
                <div class="fieldset button-field">
                  <div class="wrap"><input type="submit" value="Show Me Results" class="button"></div>
                </div>
                <p class="inform-text">You will also receive a FREE 6-Page business VoIP guide to help analyze and compare your results.</p>
              </div>
            </div>
          </form>
        </div>
    
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
          <h2 class="boost">Here's what a few of them have to say about GetVoip</h2>
          <div class="wrap">
            <div class="testimonial">
              <div class="wrap">
                <div class="quote">
                  <p>GetVoIP's comparison guides made it easy to make an informed and cost-effective decision.</p>
                </div>
                <div class="person">
                  <div class="photo">
                    <div class="circle"><img src="/sites/all/themes/gv_blue/css/sass/lpv10-img/richard.png" alt="Richard Janes"></div>
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
                    <div class="circle"><img src="/sites/all/themes/gv_blue/css/sass/lpv10-img/mark.png" alt="Mark Crosbie"></div>
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