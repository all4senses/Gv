<?php drupal_add_js('/sites/all/themes/gv_sky/js/global.js');

if ($is_front) {
  drupal_add_js('/sites/all/themes/gv_sky/js/home.js');
}

if ( current_path() == 'blog' ) {
  drupal_add_js('/sites/all/themes/gv_sky/js/blog.js');
}

if ( current_path() == 'node/add/review' ) {
  drupal_add_js('/sites/all/themes/gv_sky/js/submit-review.js');
}


?>
  <header id="header" role="banner">
    <nav class="navigation" role="navigation">
      <div class="navigation-wrap">

        <div class="navigation-logo">
          <a href="<?php print $front_page; ?>" title="<?php print 'GetVoIP Home'; ?>" class="navigation-logo-link">
            <?php
                echo '<img src="/sites/all/themes/gv_sky/images/getvoip-logo.png" width="206" height="53" class="navigation-logo-link-img" alt="GetVoIP" title="GetVoIP" />';
            ?>
          </a>
          <div class="navigation-logo-slogan">Cloud Communication Advisor</div>
          <div class="clearfix"></div>
        </div>
        
        <?php echo render($page['header']); ?>

        <div class="clearfix"></div>
      </div>
    </nav> 

    <?php if ( current_path() == 'node/804' ) { ?>
      <?php drupal_add_js('/sites/all/themes/gv_sky/js/review.js'); ?>
      <div class="hero-header left">
        <div class="hero-title">
          <h1 class="hero-title-heading"><?php print render($title); ?></h1>
          <p class="hero-title-desc"><?php print field_get_items('node',$node, 'body')[0]['value']; ?></p>
        </div>
      </div>
    <?php } ?>

    <?php if ( current_path() == 'node/62' ||  current_path() == 'node/91' ) { // Contact and Advertise Page?>
      <?php drupal_add_js('/sites/all/themes/gv_sky/js/contact.js'); ?>
      <?php drupal_add_js('/sites/all/themes/gv_sky/js/form-validation.js'); ?>
      <div class="hero-header center">
        <div class="hero-title">
          <h1 class="hero-title-heading"><?php print ( current_path() == 'node/62' ? 'Contact Us' : 'Advertise With Us' ) ?></h1>
          <p class="hero-title-desc"><?php print ( current_path() == 'node/62' ? 'Questions or Comments?' : 'Want to Advertise?' ) ?> Get In Touch.</p>
        </div>
      </div>
    <?php } ?>

    <?php  if ($page['highlighted']): ?>
      <div class="hero-header <?php if ($is_front) {echo 'center';} ?>">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif;  ?>

  </header>

  <main role="main" <?php if (!$is_front) {echo 'id="main"';} ?> >
    <?php echo (($is_front) ? '' : '<div class="main-wrap">')  ?>
    <?php  if ($page['content_wide']): ?>
        <?php print render($page['content_wide']); ?>
    <?php endif;  ?>
    
    <?php  if ($page['below_content_wide']): ?>
        <?php print render($page['below_content_wide']); ?>
    <?php endif;  ?>
                
            <!-- Error Messegaes -->
            <?php print $messages; ?>            
            
            <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper "><?php print render($tabs); ?></div><?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            
            <?php print render($page['above_content']); ?>
            <?php echo ( current_path() == 'blog' ? '<div class="blog-posts">' : '') ?>
            <?php print render($page['content']); ?>
            <?php echo ( current_path() == 'blog' ? '</div><div class="blog-posts-load">Load More</div>' : '') ?>



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

        <?php if ( current_path() == 'node/62' ||  current_path() == 'node/91' ) { 
          echo gv_blocks_getContactInfo();
        } ?>
        

        
        <div id="above_footer">
            <?php echo render($page['above_footer']); ?>
        </div>

    <?php echo (($is_front) ? '' : '</div>') ?>
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

