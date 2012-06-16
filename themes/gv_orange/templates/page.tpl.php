  <div id="bshadow">
    <div id="bs1"></div>
    <div id="bs2"></div>
    
    
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    <?php if ($main_menu): ?>
      <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
    <?php endif; ?>
  </div>


  
  <header id="header" role="banner" class="clearfix">

    <nav id="navigation" role="navigation" class="clearfix">
      <div id="header-menu-back"></div>
      
      <div id="logo-block">
        <a href="<?php print $front_page; ?>" title="<?php print t('GetVoIP Home'); ?>" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('GetVoIP Home'); ?>" />
        </a>
        <div class="title">2012 VOIP</div><div class="stars"></div>
        <div class="subtitle">SERVICE PROVIDER REVIEWS</div>
      </div>
      
      <?php echo '<div id="block-gv-blocks-header-links"><div class="follow-us">Follow Us</div>', gv_blocks_get_headerLinks(), '</div>', render($page['header']); ?>
    </nav> <!-- /#navigation -->

    <?php ////if ($breadcrumb): print $breadcrumb; endif;?>
  </header> <!-- /#header -->

  
  <?php if ($page['highlighted']): ?>
    <section id="highlighted" class="clearfix">
      <?php print render($page['highlighted']); ?>
    </section>
  <?php endif; ?>
  
  
  <div id="all-content" class="clearfix">
      
      
    
      <section id="main" role="main" class="clearfix">

          <?php print $messages; ?>
          <a id="main-content"></a>
          
          <!-- 
          <?php //if (!$is_front && $title): ?>
            <?php //print render($title_prefix); ?>
            <h1 class="title" id="page-title"><?php //print $title; ?></h1>
            <?php //print render($title_suffix); ?>
          <?php //endif; ?>
          -->
          
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php print render($page['above_content']); ?>
          <?php print render($page['content']); ?>

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

  </div> <!-- /#all-content -->

  </div> <!-- <div id="bshadow"> -->


  
  <footer id="footer" role="contentinfo" class="clearfix">
      <?php echo render($page['footer']), '<div class="c">© 2012 GetVoIP.com | All Rights Reserved</div>'; ?>
  </footer> <!-- /#footer -->

