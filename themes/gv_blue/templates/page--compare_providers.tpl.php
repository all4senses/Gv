<div id="bshadow" class="page-compare-providers">
   
  <header id="header" role="banner" class="clearfix">

    <nav id="navigation" role="navigation" class="clearfix">
      
      <div id="logo-block">
        <a href="<?php print $front_page; ?>" title="<?php print 'GetVoIP Home'; ?>" id="logo">
          <!-- <img src="http://getvoip.com/sites/all/themes/gv_blue/css/images/getvoip-logo4.png" alt="GetVoIP" title="GetVoIP" /> -->
          <img src="/images/theme/get-voip-logo5.png" alt="GetVoIP" title="GetVoIP" />
        </a>
      </div>
      
      <?php 
          echo render($page['header']); 
      ?>
    </nav> <!-- /#navigation -->

  </header> <!-- /#header -->
  
  <div id="all-content" class="clearfix">
      
      
    
      <section id="main" role="main" class="clearfix">

        <div id="breadcrumbs-dummy"></div>
        
          <?php 
            print $messages; 
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
          
            
          <?php if ($page['below_content_with_sidebar'] || $page['sidebar_second_below_chart']): ?>
            
            <div id="below-content-with-second-sidebar">

                <?php if ($page['below_content_with_sidebar']): ?>
                  <div id="below-content-with-sidebar">
                    <?php print render($page['below_content_with_sidebar']); ?>
                  </div>
                <?php endif; ?>

                <?php if ($page['sidebar_second_below_chart']): ?>
                  <aside id="sidebar-second-below-chart" role="complementary" class="sidebar clearfix">
                    <?php print render($page['sidebar_second_below_chart']); ?>
                  </aside> 
                <?php endif; ?>

            </div>
            
          <?php endif; ?>  
            
                   
      </section> <!-- /#main -->

      <div class="bottom-clear"></div>
      
      <div id="above_footer">
          <?php echo render($page['above_footer']); ?>
      </div>

  </div> <!-- /#all-content -->

  </div> <!-- <div id="bshadow"> -->


  
  
  
  <footer id="footer" role="contentinfo" class="clearfix">
   <div id="footer-inside">

      <?php
        dpm($_SERVER);
        if (!in_array($_SERVER['REQUEST_URI'], array('/ppc/business-voip', '/business'))) {
          echo '<div id="block-gv-blocks-follow-links">', gv_blocks_get_headerLinks(), '</div>';
        }
        echo render($page['footer']);
        
        echo '<div class="about">GetVoIP.com is an independent provider comparison and shoppers guide, offering unbiased consumer reviews. We monetize from advertisers and affiliates. This does not influence the rankings and reviews on our website.</div>
<div class="c"><div>Copyright</div> 2014 GetVoIP.com | All Rights Reserved</div>';
      ?>
     
   </div>
  </footer> <!-- /#footer -->

