<?php $provider_name = isset($node->field_p_name['und'][0]['value']) ? $node->field_p_name['und'][0]['value'] : $node->field_p_name[0]['value']; ?>

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
              
            
              
              
          <?php echo render($content['metatags']); //gv_misc_renderMetatags_newOrder($content['metatags']);?>
          
          
              
              
              
          <?php //echo render($content); ?>
          
        </div> <!-- content -->

        
  </div> <!-- main-content -->
  
  <!--<div class="shadow"></div> -->
  
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
