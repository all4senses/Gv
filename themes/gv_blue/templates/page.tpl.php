<div id="bshadow">
    
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
          <?php
              //echo '<img src="http://getvoip.com/sites/all/themes/gv_blue/css/images/get-voip-logo.png" alt="GetVoIP" title="GetVoIP" />';
              echo '<img src="/images/theme/get-voip-logo.png" alt="GetVoIP" title="GetVoIP" />';
          ?>
        </a>
        <div class="descr">
          
          <!--<div class="title">VoIP Decisions</div>
          <div class="subtitle">Made Easy!</div> -->
          
          <!--<div class="stars"><img src="/sites/all/themes/gv_blue/css/images/sprite-0.png" alt="Provider Reviews From Consumers" title="VoIP Reviews"/></div>-->
          
        </div>
      </div>
      <!--<div id="headline">We've helped <span>over 7,000 VoIP shoppers</span> find the perfect phone service.</div>-->
      
      <?php 
//        if ($user->uid == 1) {
          echo /*'<a id="itexpo" href="http://getvoip.com/blog/tags/itexpo-2012"></a>',*/ render($page['header']); 
          
//          if (!$user->uid) 
//            {
//            echo gv_blocks_getBlockThemed(array('module' => 'om_maximenu', 'delta' => 'om-maximenu-1', 'no_subject' => TRUE, 'class' => 'block-om-maximenu', 'shadow' => FALSE), TRUE, '+31 day', ($user->uid ? '_logged' : NULL));
//          }

//        }
//        else {
//          echo '<div id="block-gv-blocks-header-links"><div class="follow-us">Follow Us</div>', gv_blocks_get_headerLinks(), '</div>', render($page['header']); 
//        }
      ?>
    </nav> <!-- /#navigation -->

    <?php ////if ($breadcrumb): print $breadcrumb; endif;?>
  </header> <!-- /#header -->

  
  <?php  if ($page['highlighted']): ?>
    <section id="highlighted" class="clearfix">
      <?php print render($page['highlighted']); ?>
    </section>
  <?php endif;  ?>
  
  <?php  if ($page['content_wide']): ?>
    <section id="content-wide" class="clearfix">
      <?php print render($page['content_wide']); ?>
    </section>
  <?php endif;  ?>
  
  <?php  if ($page['below_content_wide']): ?>
    <section id="below-content-wide" class="clearfix">
      <?php print render($page['below_content_wide']); ?>
    </section>
  <?php endif;  ?>
  
  
  <div id="all-content" class="clearfix">
      
      
    
      <section id="main" role="main" class="clearfix">
        <div id="fix-resp">
          <?php 
            /*
            if ($breadcrumb): 
              print $breadcrumb;
            endif;
            */
            
            // Hide breadcrumbs temporarily, but reserve the room for it.
            //echo $breadcrumb; 
            //echo '<div style="height: 18px; width: 100%;"></div>';
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
          
          <?php /* if (!$is_front && $title): ?>
            <?php print render($title_prefix); ?>
            <h1 class="title" id="page-title"><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
          <?php endif; */ ?>
          
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php print render($page['above_content']); ?>
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

          if($is_front || in_array($_SERVER['REDIRECT_URL'], $pages_with_timestamp)) {
            echo gv_blueisc_lastUpdatedStamp();
          }
          */

          ?>
          </div> <!-- /#fix-resp -->
      </section> <!-- /#main -->


      <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar-first" role="complementary" class="sidebar clearfix">
          <?php print render($page['sidebar_first']); ?>
        </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>

      <?php if ($page['sidebar_second']): ?>
        <aside id="sidebar-second" role="complementary" class="sidebar clearfix">
          <?php print render($page['sidebar_second']); ?>
        </aside>  <!-- /#sidebar-second -->
      <?php endif; ?>

      <div class="bottom-clear"></div>
      
      <div id="above_footer">
          <?php echo render($page['above_footer']); ?>
      </div>

  </div> <!-- /#all-content -->

</div> <!-- <div id="bshadow"> -->


  <?php
    /*
    if ($user->uid && $is_front) {
      echo gv_blocks_render_block('gv_blocks', 'as_featured_in');
    }
    */
  
    $hide_follow_us_links = ( !isset($node->type) || !in_array($node->type, array('blog_post', 'news_post', 'article')) ) ? FALSE : TRUE;
  ?>
    
  
  
  <footer id="footer" role="contentinfo" class="clearfix<?php echo $hide_follow_us_links ? ' no-follow-us-links' : '' ?>">
   <div id="footer-inside">

    <?php
        //if (!$hide_follow_us_links) 
          {
          echo '<div id="block-gv-blocks-follow-links">', gv_blocks_get_headerLinks(), '</div>';
        }
        echo render($page['footer']);
        
        echo '<div class="about">GetVoIP.com is an independent provider comparison and shoppers guide, offering unbiased consumer reviews. We monetize from advertisers and affiliates. This does not influence the rankings and reviews on our website.</div>
<div class="c"><div>Copyright</div> 2014 GetVoIP.com | All Rights Reserved</div>';
        
    ?>


    <!--
    <div class="c">GetVoIP.com is an independent provider comparison and shoppers guide, offering unbiased consumer reviews. We monetize from advertisers and affiliates. This does not influence the rankings and reviews on our website. 
    <div>© 2014 GetVoIP.com | All Rights Reserved</div>
</div>
-->

    
            <!--<div id="sitelock"><a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=getvoip.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/getvoip.com"/></a></div>-->
        <?php

    ?>
   </div>
  </footer> <!-- /#footer -->

