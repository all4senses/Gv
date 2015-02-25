<?php drupal_add_js('/sites/all/themes/gv_sky/js/global.js') ?>
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
          <div class="navigation-logo-slogan">Cloud Communications Advisor</div>
          <div class="clearfix"></div>
        </div>
        
        <?php echo render($page['header']); ?>

        <div class="clearfix"></div>
      </div>
    </nav> 

    <?php  if ($page['highlighted']): ?>

      <div class="hero-header">
        <?php print render($page['highlighted']); ?>
      </div>
      
    <?php endif;  ?>

  </header>

  <main role="main">
    
    <?php  if ($page['content_wide']): ?>
        <?php print render($page['content_wide']); ?>
    <?php endif;  ?>
    
    <?php  if ($page['below_content_wide']): ?>
        <?php print render($page['below_content_wide']); ?>
    <?php endif;  ?>
    
    
    <section id="all-content">
        
        
      
        <div>
            <div id="breadcrumbs-dummy"></div>
            
            <!-- Error Messegaes -->
            <?php print $messages; ?>

            <a id="main-content"></a>
            
            
            <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper "><?php print render($tabs); ?></div><?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            
            <?php print render($page['above_content']); ?>
            <?php print render($page['content']); ?>
            
           
        </div>


        <?php if ($page['sidebar_first']): ?>
          <aside id="sidebar-first" role="complementary" class="sidebar ">
            <?php print render($page['sidebar_first']); ?>
          </aside>  <!-- /#sidebar-first -->
        <?php endif; ?>

        <?php if ($page['sidebar_second']): ?>
          <aside id="sidebar-second" role="complementary" class="sidebar ">
            <?php print render($page['sidebar_second']); ?>
          </aside>  <!-- /#sidebar-second -->
        <?php endif; ?>

        <div class="bottom-clear"></div>
        
        <div id="above_footer">
            <?php echo render($page['above_footer']); ?>
        </div>

    </section> <!-- /#all-content -->

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
        echo gv_blocks_get_headerLinks();
        echo '</div>';
    ?>
    
        <?php

    ?>
   </div>
  </footer> <!-- /#footer -->

