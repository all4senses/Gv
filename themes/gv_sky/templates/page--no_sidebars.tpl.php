<?php 
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
    
    <?php 
      global $main_menu_inner_ul_removed;
      echo $main_menu_inner_ul_removed;
    ?>
    
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


<main role="main" <?php if (!$is_front) {echo 'id="main"';} ?> >
  <div class="main-wrap">

        <?php  
          print $messages; 
        ?>        
        
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        
        <?php print render($page['above_content']); ?>
        <?php print render($page['content']); ?>
        

    
    <div id="above_footer">
        <?php echo render($page['above_footer']); ?>
    </div>
  </div>
</main> <!-- /#all-content -->




  <?php
  
    $hide_follow_us_links = ( !isset($node->type) || !in_array($node->type, array('blog_post', 'news_post', 'article')) ) ? FALSE : TRUE;
  ?>
    
  
  
  <footer id="footer" role="contentinfo" class="clearfix<?php echo $hide_follow_us_links ? ' no-follow-us-links' : '' ?>">
   <div id="footer-inside">

    <?php
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

