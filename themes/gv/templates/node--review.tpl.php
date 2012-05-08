<div>RRR</div>
<?php

  if ($node->nid == 48) {
    dpm($content);
    dpm($node);
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
          
          <div class="gv_votes">
            <?php echo '<div class="caption">' . t('Customer Rating') . '</div>' . render($content['gv_ratings']); ?>
            <div class="rate-other">
              <div class="text"><?php echo '<div class="title">' , t('Rating:') , '</div>' , render($content['gv_rating_overall']); ?></div>
              <div class="text"><?php echo '<div class="title">' , t('Date:') , '</div><div>' , date('d Y', $node->created) , '</div>'; ?></div>
              <div class="text"><?php echo '<div class="title">' , t('Reviewer:') , '</div><div>' , $node->field_r_fname['und'][0]['safe_value'] , '</div>'; ?></div>
              <div class="text"><?php echo render($content['gv_recommend']); ?></div>
            </div>
          </div>
              
          <div class="right-content">
            <div class="pros-cons">
              <?php
                if ($content['r_data']['pros']) {
                  echo '<div class="pros"><div class="caption">' . t('Pros:') . '</div><text>' . $content['r_data']['pros'] . '</div></div>';
                }
                if($content['r_data']['pros'] && $content['r_data']['pros']) {
                  echo '<div class="vs">' . t('VS') . '</div>';
                }
                if ($content['r_data']['cons']) {
                  echo '<div class="cons"><div class="caption">' . t('Cons:') . '</div><text>' . $content['r_data']['cons'] . '</div></div>';
                }
              ?>
            </div>
            <?php echo render($content['body']); ?>
          </div>
          <div class="bottom-clear"></div>
          <div class="links"><?php echo l(t('Visit Just Host'), $content['provider_url']); ?><span class="delim">|</span><?php echo l(t('Write a Review'), 'node/add/review'); ?></div>
           
              
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
