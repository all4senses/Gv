<?php 
  //dpm($node);
  //dpm($content);
?>

<?php print render($title_prefix); ?>
  <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
<?php print render($title_suffix); ?>



<div class="content"<?php print $content_attributes; ?>>
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['links']);
    hide($content['field_topics']);

    print render($content);
  ?>
</div>


<footer>

</footer>

 

  
