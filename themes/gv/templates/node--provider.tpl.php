<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

    
<?php

dpm($content);

?>

  <div class="main-content">
    
        <?php if ($user_picture || $display_submitted || !$page): ?>
          <?php if (!$page): ?>
            <header>
        <?php endif; ?>


            
          <?php //if (!$page): ?>
          <?php print render($title_prefix); ?>
          
            <?php if (!$page): ?>
            <h2
            <?php else: ?>
            <h1
            <?php endif; ?>
              
              <?php print $title_attributes; ?>>
              <?php if (!isset($node->title_no_link) && !$page): ?>
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
              <?php else: ?>
                <?php print $title; ?>
              <?php endif; ?>
              
            <?php if (!$page): ?>
            </h2>
            <?php else: ?>
            </h1>
            <?php endif; ?> 
            
          
          <?php print render($title_suffix); ?>
          <?php //endif; ?>
              
              

          <?php if (!$page): ?>
            </header>
          <?php endif; ?>
        <?php endif; ?>

        <div class="content"<?php print $content_attributes; ?>>
          <?php
            // Hide comments, tags, and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
            hide($content['reviews_entity_view_1']);
            
            print render($content);
          ?>
        </div>

        
      <?php if ($page): ?>
    
                  <footer>

                    <?php 
                      $tags = NULL;
                      foreach (element_children($content['field_topics']) as $key) {
                        $tags .= ($tags ? '<div class="delim">|</div>' : '') . l(t($content['field_topics'][$key]['#title']), 'articles/tags/' . str_replace(' ', '-', drupal_strtolower($content['field_topics'][$key]['#title'])));
                      }
                      if ($tags) {
                        echo '<div class="topics"><div class="title">' . t('TAGS:') . '</div>' . $tags . '</div>';
                      }
                      //print render($content['field_topics']); 
                      //print render($content['links']);
                    ?>
                  </footer>
    
      <?php endif; ?>

  </div> <!-- main-content -->
  
  
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php else: ?>  
  <?php echo render($content['reviews_entity_view_1']); ?>
<?php endif; ?>
