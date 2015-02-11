<?php //dpm($block); ?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; print ' xxx'; ?>"<?php print $attributes; ?>>
  <div class="inside">
    <?php print render($title_prefix); ?>
    
    <?php if ($title): ?>
      
      
      <?php if (in_array($block->delta, array('blog_top_rotated', 'home_in_hlighted_4'))): ?>
        <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
      
      <?php else: ?>
        
        
        <<?php echo 'h3' . $title_attributes; ?>>
        <?php echo '<span class="block-icon">' . $title . '</span></h3>'; ?>
      
      <?php endif;?>
        
    <?php endif;?>
      
    <?php print render($title_suffix); ?>

    <div class="content"<?php print $content_attributes; ?>>
      <?php print $content ?>
    </div>
  </div> <!-- /.inside -->
  <div class="shadow"></div>
</div> <!-- /.block -->
