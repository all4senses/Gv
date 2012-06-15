<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php if ($title != 'Request a Free Quote' && ($block->region == 'sidebar_first' || $block->region == 'sidebar_second') ): ?>
      <div class="block-icon pngfix"><?php echo t('All'); ?></div>
    <?php endif;?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
  
</section> <!-- /.block -->
