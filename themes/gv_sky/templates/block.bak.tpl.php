  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php $h_tag = in_array($block->region, array('content', 'content_wide', 'above_footer')) ? 'h2' : 'h3'; ?>
    <<?php echo $h_tag . ' ' . $title_attributes; ?>>
    <?php echo '<span class="block-icon">' . $title . '</span></' . $h_tag . '>'; ?>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  
    <?php print $content ?>
  
  

