<?php if (!strpos($classes, 'first')): ?>
  <div class="top-line <?php print $block_html_id; ?>"></div>
<?php endif; ?>
<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php if ($block->region == 'sidebar_second'): ?>
      <div class="block-icon pngfix"></div>
    <?php endif;?>
    <?php $h_tag = in_array($block->region, array('content', 'content_wide', 'above_footer')) ? 'h2' : 'h3'; ?>
    <<?php echo $h_tag . ' ' . $title_attributes; ?>>
    <?php echo $title . '</' . $h_tag . '>'; ?>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
  
</section> <!-- /.block -->
