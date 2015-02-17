<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php else: ?>
     <?php 
      $url = 'http://getvoip.com'. url('node/' . $node->nid);
    ?>
<?php endif; ?>

           
  <div class="main-content">
    

        <div class="content"<?php print $content_attributes; ?>>
          
          
          
          <div id="provider-main">
            
          
          </div> <!-- End of <div id="provider-main"> -->
              
            
              
              
          <?php echo render($content['metatags']); ?>
          
          
              
              
              
          <?php //echo render($content); ?>
          
        </div> <!-- content -->

        
  </div> <!-- main-content -->
  
  
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
