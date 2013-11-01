<div id="bshadow" class="page-compare-providers">
    
  <?php
  /*
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    <?php if ($main_menu): ?>
      <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
    <?php endif; ?>
  </div>
  */
  ?>

  
  <header id="header" role="banner" class="clearfix">

    <nav id="navigation" role="navigation" class="clearfix">
      <div id="header-menu-back"></div>
      
      <div id="logo-block">
        <a href="<?php print $front_page; ?>" title="<?php print 'GetVoIP Home'; ?>" id="logo">
          <img src="http://getvoip.com/sites/all/themes/gv_orange/css/images/getvoip-logo4.png" alt="GetVoIP" title="GetVoIP" />
        </a>
        <div class="descr">
          
          <!--<div class="title">VoIP Decisions</div>
          <div class="subtitle">Made Easy!</div> -->
          
          <!--<div class="stars"><img src="/sites/all/themes/gv_orange/css/images/sprite-0.png" alt="Provider Reviews From Consumers" title="VoIP Reviews"/></div>-->
          
        </div>
      </div>
      <div id="headline">We've helped <span>over 7,000 VoIP shoppers</span> find the perfect phone service.</div>
      
      <?php 
          global $user;

//        if ($user->uid == 1) {
          echo /*'<a id="itexpo" href="http://getvoip.com/blog/tags/itexpo-2012"></a>',*/ render($page['header']); 
          
          //echo gv_blocks_getBlockThemed(array('module' => 'om_maximenu', 'delta' => 'om-maximenu-1', 'no_subject' => TRUE, 'class' => 'block-om-maximenu', 'shadow' => FALSE), TRUE, '+31 day', ($user->uid ? '_logged' : NULL));
          
//        }
//        else {
//          echo '<div id="block-gv-blocks-header-links"><div class="follow-us">Follow Us</div>', gv_blocks_get_headerLinks(), '</div>', render($page['header']); 
//        }
      ?>
    </nav> <!-- /#navigation -->

    <?php ////if ($breadcrumb): print $breadcrumb; endif;?>
  </header> <!-- /#header -->
  
  <div id="all-content" class="clearfix">
      
      
    
      <section id="main" role="main" class="clearfix">

          <?php 
            /*
            if ($breadcrumb): 
              print $breadcrumb;
            endif;
            */
            
            // Hide breadcrumbs temporarily, but reserve the room for it.
            //echo $breadcrumb; 
            //echo '<div style="height: 18px; width: 100%;"></div>'
          ?>
        <div id="breadcrumbs-dummy"></div>
        
          <?php 
          
            print $messages; 
            // we aren't getting messages, get them manually
//            if (isset($_SESSION['messages'])) {
//                echo '<div class="messages">';
//                foreach($_SESSION['messages'] as $type=>$messages) {
//                    echo "<p class=\"$type\">".implode("</p><p class=\"$type\">", $messages)."</p>";
//                }
//                echo '</div>';
//                unset($_SESSION['messages']);
//            }

            
          ?>
          <a id="main-content"></a>

          
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php print render($page['above_content']); ?>
          <?php if ($page['sidebar_second']): ?>
            <aside id="sidebar-second" role="complementary" class="sidebar clearfix">
              <?php print render($page['sidebar_second']); ?>
            </aside>  <!-- /#sidebar-second -->
          <?php endif; ?>

          <?php print render($page['content']); ?>
          
          
          
          <?php 
          /*
          $pages_with_timestamp = array(
            '/compare-business-voip-providers', 
            '/business-voip-reviews', 
            '/compare-residential-voip-providers', 
            '/best-voip-service-providers',
            '/residential-voip-reviews', 
            '/sip-trunking-providers',
            '/internet-fax-service-providers',
            '/providers/reviews', 
            '/about-voip-services', 
            '/blog', 
            '/news', 
            '/voip-provider-submit-user-review',
            '/about-us',
            '/contact-us',
            '/advertise',
            '/press',
            '/privacy-policy',
            '/terms-of-use',
            '/our-team',
          );
          //if ($user->uid == 1) {
//          if($is_front || in_array($_SERVER['REDIRECT_URL'], $pages_with_timestamp)) {
//            echo gv_misc_lastUpdatedStamp();
//          }
              
          //}
          */
          ?>
          
      </section> <!-- /#main -->

      <?php /*if ($page['sidebar_second']): ?>
        <aside id="sidebar-second" role="complementary" class="sidebar clearfix">
          <?php print render($page['sidebar_second']); ?>
        </aside>  <!-- /#sidebar-second -->
      <?php endif; */?>
      
      <?php if ($page['sidebar_second_below_chart']): ?>
        <aside id="sidebar-second-below-chart" role="complementary" class="sidebar clearfix">
          <?php print render($page['sidebar_second_below_chart']); ?>
        </aside>  <!-- /#sidebar-second -->
      <?php endif; ?>
      
      <div class="bottom-clear"></div>
      
      <div id="above_footer">
          <?php echo render($page['above_footer']); ?>
      </div>

  </div> <!-- /#all-content -->

  </div> <!-- <div id="bshadow"> -->


  
  
  
  <footer id="footer" role="contentinfo" class="clearfix">
   <div id="footer-inside">

   
    
    <?php
      
      

        echo '<div id="block-gv-blocks-follow-links"><div class="follow-us">Follow Us</div>', gv_blocks_get_headerLinks(), '</div>';
        
        echo render($page['footer']);
        
        ?>
     
    
            <div class="c">GetVoIP.com is an independent provider comparison and shoppers guide, offering unbiased consumer reviews. We monetize from advertisers and affiliates. This does not influence the rankings and reviews on our website. 
<div>© 2012-2013 GetVoIP.com | All Rights Reserved</div>
</div>

    
            <!--<div id="sitelock"><a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=getvoip.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/getvoip.com"/></a></div>-->
        <?php

    ?>
   </div>
  </footer> <!-- /#footer -->

