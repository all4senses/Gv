
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
    <?php print $content ?>

