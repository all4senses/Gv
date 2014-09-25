<div id="bshadow">
 

  
  <header id="header" role="banner" class="clearfix">

    <nav id="navigation" role="navigation" class="clearfix">
      
      <div id="logo-block">
        <a href="<?php print $front_page; ?>" title="<?php print 'GetVoIP Home'; ?>" id="logo">
          <?php
              echo '<img src="/images/theme/get-voip-logo5.png" alt="GetVoIP" title="GetVoIP Conferences" />';
          ?>
        </a>
  
      </div>
   
    </nav> <!-- /#navigation -->

    <?php ////if ($breadcrumb): print $breadcrumb; endif;?>
  </header> <!-- /#header -->

  
  
  <div id="all-content" class="clearfix">
      
      
    
      <section id="main" role="main" class="clearfix">
        <div id="fix-resp">
       
          <?php print $messages; ?>
          
          <a id="main-content"></a>
                    
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php print render($page['above_content']); ?>
          <?php print render($page['content']); ?>
        
          </div> <!-- /#fix-resp -->
      </section> <!-- /#main -->


      <div class="bottom-clear"></div>
      
      <div id="above_footer">
          <?php echo render($page['above_footer']); ?>
      </div>

  </div> <!-- /#all-content -->

</div> <!-- <div id="bshadow"> -->


  
  
  <footer id="footer" role="contentinfo" class="clearfix<?php echo $hide_follow_us_links ? ' no-follow-us-links' : '' ?>">
   <div id="footer-inside">

    <?php
       
        echo render($page['footer']);
        
        echo '<div class="c"><div>Copyright</div> 2014 GetVoIP.com | All Rights Reserved</div>';
        
    ?>
   </div>
  </footer> <!-- /#footer -->

