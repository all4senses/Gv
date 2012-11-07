<?php if (!strpos($classes, 'first')): ?>
  <div class="top-line <?php print $block_html_id; ?>"></div>
<?php endif; ?>
<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php echo ($block->region == 'content' ? '<h2 ' : '<h3 ') . $title_attributes; ?>><?php echo $title . ($block->region == 'content' ? '</h2>' : '</h3>'); ?>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
  
</section> <!-- /.block -->
