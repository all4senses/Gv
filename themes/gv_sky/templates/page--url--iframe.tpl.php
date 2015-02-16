  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    <?php if ($main_menu): ?>
      <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
    <?php endif; ?>
  </div>




  <div id="all-content" class="clearfix">

    <section id="main" role="main" class="clearfix">

        <?php print $messages; ?>
        <a id="main-content"></a>

        <?php print render($page['content']); ?>

    </section> <!-- /#main -->

  </div> <!-- /#all-content -->
  