<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
   
  <div class="main-content"  xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review">
    
            <?php if (!$page): ?>
              <header>
            <?php endif; ?>
                
                <?php $full_title = FALSE; ?>
                
                <?php if ($page): ?>
                  <h1 <?php 
                          echo 'property="v:summary"';
                      ?>
                <?php else: ?>
                    <?php 
                    $full_title_urls = array();
                    if (in_array(@$_SERVER['REDIRECT_URL'], $full_title_urls)) {
                      $full_title = TRUE;
                    }
                    ?>
                    <?php if($full_title): ?>
                      <h2 <?php 
                              echo 'class="rcaption" property="v:summary"';
                           ?>
                    <?php else: ?>
                      <h3 <?php 
                              echo 'class="rcaption" property="v:summary"';
                           ?>
                    <?php endif; ?>
                <?php endif; ?>
                  
                <?php ?>><?php 
                      global $user;
                      if (!$page && $user->uid) {
                        echo '<a href="' . $node_url . '">';
                      }
                     
                      echo ($full_title || $page ? 'Phone ' . $node->field_p_name['und'][0]['value'] . ' ' . t('Review') . ' - ' : '') . $title; 
                      if (!$page && $user->uid) {
                        echo '</a>';
                      }
                  if ($page) {
                    echo '</h1>';
                  }
                  else {
                    echo '</h2>';
                  }
                 ?>

            <?php if (!$page): ?>       
              </header>
            <?php endif; ?>
    
            <?php if ($page): ?>
              <span class="submitted">
              <?php 
                echo t('Reviewer'), ': ', '<span property="v:reviewer">' . ( isset($node->field_r_fname['und'][0]['safe_value']) ? $node->field_r_fname['und'][0]['safe_value'] : $node->field_r_fname[0]['safe_value']), '</span><span class="delim">|</span><span property="v:dtreviewed" content="' . date('Y-m-d', $node->created) . '">', date('F d, Y \a\t g:sa', $node->created), '</span>';
              ?>
            </span>
          <?php endif; ?>
    

        <div class="content"<?php print $content_attributes; ?>>
          
          <div class="gv_votes">
            <?php echo '<div class="caption"><span>' , t('User\'s Rating') , ':</span> <span property="v:rating">' , $node->field_r_rating_overall['und'][0]['value'], '</span>' , '<div class="bottom-clear"></div></div>' , render($content['gv_ratings']); ?>
            <div class="rate-other">
              <?php if (!$page): ?>
                <div class="text"><?php echo '<div class="title">' , t('Date:') , '</div><div property="v:dtreviewed" content="' . date('Y-m-d', $node->created) . '">' , date('F j, Y', $node->created) , '</div>'; ?></div>
                <div class="text"><?php echo '<div class="title">' , t('Reviewer:') , '</div><div property="v:reviewer">' , $node->field_r_fname['und'][0]['safe_value'] , '</div>'; ?></div>
              <?php endif; ?>
              <div class="text"><?php echo '<div class="title">' . t('Recommend') . ': </div><div class="data">' . $node->gv_recommend . '</div>'?></div>
            </div>
          </div>
          
          <!--<div class="right-content">-->
          <div class="review-right">
            
            <?php echo '<div property="v:description">' . render($content['body']) . '</div>'; ?>
          </div>
          <div class="bottom-clear"></div>
          <div class="links">
            <?php 
            
              echo '<div class="rlinks">' 
                  . (
                      $page || $full_title 
                      ? 
                        ( (!isset($node->field_ref_phone['und'][0]['target_id']) || !$node->field_ref_phone['und'][0]['target_id'] ) ? '' : '<a href="' . url('node/' . $node->field_ref_phone['und'][0]['target_id']) . '">View All <span class="review-phone">' . $node->field_p_name['und'][0]['safe_value'] . '</span> Reviews</a> <span class="delim">|</span>')
                      
                        . l(t('Write a Review'), 'node/add/phone-review', array('query' => array('id' => $node->field_ref_phone['und'][0]['target_id']))) 
                      : ''
                    ) 
                    
                  . '</div>'; 
              
            ?>
          </div>
           
              
          <?php
            // Hide already shown anr render the rest.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
            
            echo render($content['metatags']);
          ?>
          
        </div> <!-- content -->

        
        
      <?php if ($page): ?>
    
        <footer>

        </footer>
    
      <?php endif; ?>
        
      

  </div> <!-- main-content -->
  
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
