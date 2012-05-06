<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

    
<?php

dpm($content);

?>

  <?php if ($page): ?>
    <div class="supertitle"><?php echo t('Our Take on !p Business VoIP Provider', array('!p' => isset($content['field_p_name'][0]['#markup']) ? $content['field_p_name'][0]['#markup'] : '' )) ?></div>
  <?php endif; ?>

        
  <div class="main-content">
    
    
        <?php if (!$page): ?>
          <header>
        
            <?php print render($title_prefix); ?>
            <h2<?php print $title_attributes; ?>>
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
            <?php print render($title_suffix); ?>
        
          </header>
        <?php endif; ?>
    


        <div class="content"<?php print $content_attributes; ?>>
          <?php
            // Hide comments, tags, and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
            hide($content['reviews_entity_view_1']);
            
            
            echo theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page')); 
            print render($content);
          ?>
        </div>

        
      <?php if ($page): ?>
    
                  <footer>

                    <?php 
                      if (isset($content['field_topics'])) {
                        $tags = NULL;
                        foreach (element_children($content['field_topics']) as $key) {
                          $tags .= ($tags ? '<div class="delim">|</div>' : '') . l(t($content['field_topics'][$key]['#title']), 'articles/tags/' . str_replace(' ', '-', drupal_strtolower($content['field_topics'][$key]['#title'])));
                        }
                        if ($tags) {
                          echo '<div class="topics"><div class="title">' . t('TAGS:') . '</div>' . $tags . '</div>';
                        }
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
