<div>RRR</div>
<?php

  if ($node->nid == 12) {
    dpm($content);
  }


?>

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
   
            <?php if ($page): ?>
                <?php print render($title_prefix); ?>
                <h1<?php print $title_attributes; ?>>
                      <?php 
                        print $title; //t('Our Take on !p Business VoIP Provider', array('!p' => $content['field_p_name'][0]['#markup']) )
                      ?>
                </h1>
                <?php print render($title_suffix); ?>
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
          
          <?php echo render($content['gv_ratings']); ?>
              
              
          <div class="bottom-clear"></div>
          
           
              
          <?php
            // Hide already shown anr render the rest.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
        
            echo render($content);
          ?>
          
        </div> <!-- content -->

        
        
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
  
  <div class="shadow"></div>
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
