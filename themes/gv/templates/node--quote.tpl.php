<?php 
  //dpm($node);
  //dpm($content);
// Hide comments, tags, and links now so that we can render them later.
  hide($content['links']);
  hide($content['field_topics']);
?>

<div id="logo"></div>
<h2>Don't trust your phone system with just anyone. Get the reviews.</h2>
  
<?php print render($title_prefix); ?>
  <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
<?php print render($title_suffix); ?>

<div class="content"<?php print $content_attributes; ?>>
  
  <div id="left">
    
  </div>
  <div id="center">
    
  </div>
  <div id="right">
    
  </div>
  
  <?php
    print render($content);
  ?>
</div>
  
<div class="bottom"<?php print $content_attributes; ?>>
  <?php
    print render($content);
  ?>
</div>


<footer>

</footer>

 

  
