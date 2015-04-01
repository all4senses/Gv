<?php 
drupal_add_js('/sites/all/themes/gv_sky/js/popup.js');
drupal_add_js('/sites/all/themes/gv_sky/js/global.js');
drupal_add_js('/sites/all/themes/gv_sky/js/comparison_page.js');
drupal_static_reset('drupal_add_css');
?>
<link rel="stylesheet" href="/sites/all/themes/gv_sky/css/compare.css"
  <header id="header" role="banner">

    <nav class="navigation" role="navigation">
      <div class="navigation-wrap">

        <div class="navigation-logo">
          <?php
              if (in_array(@$_SERVER['REDIRECT_URL'], array('/ppc/business-voip', '/canada') )) {
                echo '<div class="navigation-logo-link">';
                echo '<img src="/sites/all/themes/gv_sky/images/getvoip-logo.png" width="206" height="53" class="navigation-logo-link-img" alt="GetVoIP" title="GetVoIP" />';
                echo '</div>';
              }
              else {
                echo '<a href="' . $front_page . '" title="GetVoIP Home" class="navigation-logo-link">';
                echo '<img src="/sites/all/themes/gv_sky/images/getvoip-logo.png" width="206" height="53" class="navigation-logo-link-img" alt="GetVoIP" title="GetVoIP" />';
                echo '</a>';
              }
          ?>
          <div class="navigation-logo-slogan">Cloud Communication Advisor</div>
          <div class="clearfix"></div>
        </div>
        
        <?php echo render($page['header']); ?>

        <div class="clearfix"></div>
      </div>
    </nav> 
      <div class="hero-header left">
        <div class="hero-title">
          <h1 class="hero-title-heading"><?php print render($title); ?></h1>
          <p class="hero-title-desc"><?php print field_get_items('node',$node, 'body')[0]['value']; ?></p>
        </div>
      </div>
  </header>

  <main role="main" id="main">
    <div class="main-wrap">
       
            <!-- Error Messegaes -->
            <?php print $messages; ?>            
            
            <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper "><?php print render($tabs); ?></div><?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            
            <?php print render($page['above_content']); ?>
            <?php print render($page['content']); ?>
            
           

          <?php if ($page['below_content_with_sidebar'] || $page['sidebar_second_below_chart']): ?>
            
                <?php if ($page['below_content_with_sidebar']): ?>
                    <?php print render($page['below_content_with_sidebar']); ?>
                <?php endif; ?>

                <?php if ($page['sidebar_second_below_chart']): ?>
                    <?php print render($page['sidebar_second_below_chart']); ?>
                <?php endif; ?>
            
          <?php endif; ?>  

        
          <?php echo render($page['above_footer']); ?>
          <?php //echo gv_blocks_getQuotePopup_onLists(); ?>
    </div>
  </main>


  <?php
  
    $hide_follow_us_links = ( !isset($node->type) || !in_array($node->type, array('blog_post', 'news_post', 'article')) ) ? FALSE : TRUE;
  ?>
    
  
  
  <footer class="footer" role="contentinfo" class="<?php echo $hide_follow_us_links ? ' no-follow-us-links' : '' ?>">
   <div class="footer-wrap">

    <?php
        echo '<div class="footer-wrap-left">' . render($page['footer']) . '</div>';

        echo '<div class="footer-wrap-right">';
        echo '<div class="footer-copyright">© GetVoIP.com 2015 | All Right Reserved</div>';
        if (!in_array($_SERVER['REQUEST_URI'], array('/ppc/business-voip', '/business', '/canada', '/cloud-contact-center'))) {
          echo gv_blocks_get_headerLinks();
        }
        echo '</div>';
    ?>
    
        <?php

    ?>
   </div>
  </footer> <!-- /#footer -->

