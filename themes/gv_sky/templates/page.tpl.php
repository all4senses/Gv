<?php drupal_add_js('/sites/all/themes/gv_sky/js/global.js') ?>
  <header id="header" role="banner">

    <nav id="navigation" role="navigation">

      <div id="logo">
        <a href="<?php print $front_page; ?>" title="<?php print 'GetVoIP Home'; ?>" class="logo-link">
          <?php
              echo '<img src="/sites/all/themes/gv_sky/images/getvoip-logo.png" width="206" height="53" class="logo-link-img" alt="GetVoIP" title="GetVoIP" />';
          ?>
        </a>
        <div class="logo-slogan">Cloud Communications Advisor</div>
      </div>
      
      <?php echo render($page['header']); ?>
      <?php  if ($page['highlighted']): ?>

        <div class="hero-header">
          <?php print render($page['highlighted']); ?>
        </div>

      <?php endif;  ?>
    </nav> 

  </header>

  <main role="main">
    
    <?php  if ($page['content_wide']): ?>
      <section id="content-wide">
        <?php print render($page['content_wide']); ?>
      </section>
    <?php endif;  ?>
    
    <?php  if ($page['below_content_wide']): ?>
      <section id="below-content-wide">
        <?php print render($page['below_content_wide']); ?>
      </section>
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
    
  
  
  <footer id="footer" role="contentinfo" class="<?php echo $hide_follow_us_links ? ' no-follow-us-links' : '' ?>">
   <div id="footer-inside">

    <?php
        //if (!$hide_follow_us_links) 
          {
          echo '<div id="block-gv-blocks-follow-links">', gv_blocks_get_headerLinks(), '</div>';
        }
        echo render($page['footer']);
        
        echo '<div class="about">GetVoIP.com is an independent provider comparison and shoppers guide, offering unbiased consumer reviews. We monetize from advertisers and affiliates. This does not influence the rankings and reviews on our website.</div>
<div class="c"><div>Copyright</div> 2015 GetVoIP.com | All Rights Reserved</div>';
        
    ?>
    
        <?php

    ?>
   </div>
  </footer> <!-- /#footer -->

