<?php

  if ($node->nid == 48) {
    //dpm($content);
    //dpm($node);
  }


?>

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
   
  <div class="main-content">
    
            <?php if (!$page): ?>
              <header>
            <?php endif; ?>
                
                <?php print render($title_prefix); ?>
                
                <?php if ($page): ?>
                  <h1
                <?php else: ?>
                  <h2
                <?php endif; ?>
                  
                <?php print $title_attributes; ?>>
                    <?php if (!$page): ?>
                      <a href="<?php print $node_url; ?>">
                    <?php endif; ?>
                        
                      <?php print $title; ?>
                        
                    <?php if (!$page): ?>
                      </a>
                    <?php endif; ?>
                
                <?php if ($page): ?>
                  </h1>
                <?php else: ?>
                  </h2>
                <?php endif; ?>
                
                <?php print render($title_suffix); ?>

            <?php if (!$page): ?>       
              </header>
            <?php endif; ?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
          <div class="gv_votes">
            <?php echo '<div class="caption"><span>' , t('User\'s Rating') , ':</span> ' , render($content['gv_rating_overall']) , '<div class="bottom-clear"></div></div>' , render($content['gv_ratings']); ?>
            <div class="rate-other">
              <div class="text"><?php echo '<div class="title">' , t('Date:') , '</div><div>' , date('F j, Y', $node->created) , '</div>'; ?></div>
              <div class="text"><?php echo '<div class="title">' , t('Reviewer:') , '</div><div>' , $node->field_r_fname['und'][0]['safe_value'] , '</div>'; ?></div>
              <div class="text"><?php echo render($content['gv_recommend']); ?></div>
            </div>
          </div>
          
          <!--<div class="right-content">-->
          <div class="review-right">
            
            <?php if ($content['r_data']['pros'] || $content['r_data']['cons']): ?>
              <div class="pros-cons">
                <?php
                  if ($content['r_data']['pros']) {
                    echo '<div class="pros frame"><div class="text"><span class="caption">' . t('Pros:') . '</span>' . $content['r_data']['pros'] . '</div></div>';
                  }
                  if($content['r_data']['pros'] && $content['r_data']['cons']) {
                    echo '<div class="vs">' . t('VS') . '</div>';
                  }
                  if ($content['r_data']['cons']) {
                    echo '<div class="' . (!$content['r_data']['pros'] ? 'pros' : 'cons') . ' frame"><div class="text"><span class="caption">' . t('Cons:') . '</span>' . $content['r_data']['cons'] . '</div></div>';
                  }
                ?>
              </div>
            <?php endif; ?>
            
            <?php echo render($content['body']); ?>
          </div>
          <div class="bottom-clear"></div>
          <div class="links">
            <?php //echo l(t('Visit Just Host'), $content['provider_url']); ?>
            <!--<span class="delim">|</span> -->
            <?php echo l(t('Write a Review'), 'node/add/review'); ?>
          </div>
           
              
          <?php
            // Hide already shown anr render the rest.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
            
            echo render($content['metatags']);
            //echo render($content);
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
  
  <!--<div class="shadow"></div> -->
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
