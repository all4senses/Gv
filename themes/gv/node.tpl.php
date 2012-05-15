<?php if (!$page): ?>
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="inside">
<?php endif; ?> <!-- if (!$page) -->
    

    <?php if (!$page): ?>
      <header>
    <?php endif; ?>
      
        
      <?php print $user_picture; ?>


      <?php print render($title_prefix); ?>

        <?php if ($page): ?>
        <h1
        <?php else: ?>
        <h2
        <?php endif; ?>

        <?php print $title_attributes; ?>>
          <?php if (!isset($node->title_no_link) && !$page): ?>
            <a href="<?php print $node_url; ?>">
              <?php print $title; ?>
            </a>
          <?php else: ?>
            <?php print $title; ?>
          <?php endif; ?>

        <?php if ($page): ?>
        </h1>
        <?php else: ?>
        </h2>
        <?php endif; ?> 

      <?php print render($title_suffix); ?>

  
      <?php if ($display_submitted): ?>
        <span class="submitted"><?php print $submitted; ?></span>
      <?php endif; ?>

          
    <?php if (!$page): ?>
      </header>
    <?php endif; ?>
    

  <div class="content <?php echo ($page) ? 'page' : 'teaser'; ?>"<?php print $content_attributes; ?>>
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      print render($content);
    ?>
  </div>
  
       
  <?php if (isset($content['field_tags'][0]) || isset($content['links'][0])): ?>
    <footer>
      <?php print render($content['field_tags']); ?>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

<?php if (!$page): ?>
  </div> <!-- /.inside -->
  <div class="shadow"></div>
  </article> <!-- /.node -->
<?php endif; ?>
