<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <!-- <div class="inside"> -->
<?php else: ?>
  <div class="main-content"> 
<?php endif; ?>
          

      <?php if (!$page): ?>
        <header>
      <?php endif; ?>

        <?php print $user_picture; ?>

        <?php print render($title_prefix); ?>

          <?php if ($page): ?>
          <h1<?php else: ?>
          <h2<?php endif; ?><?php if (!isset($node->title_no_link) && !$page): ?><a href="<?php print $node_url; ?>"><?php print $title; ?></a><?php else: ?><?php print $title; ?><?php endif; ?><?php if ($page): ?></h1><?php else: ?></h2>
          <?php endif; ?>

      <?php if (!$page): ?>
        </header>
      <?php endif; ?>



      <div class="content <?php echo ($page ? 'page' : 'teaser'); ?>"<?php print $content_attributes; ?>>
        <?php
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          hide($content['field_topics']);
          print render($content);
        ?>
      </div>
   
      <div class="bottom-clear"></div>
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php else: ?>
  </div> <!-- <div class="main-content"> -->
<?php endif; ?>
