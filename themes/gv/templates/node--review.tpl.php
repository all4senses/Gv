<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
   
  <div class="main-content"  xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review">
    
            <?php if (!$page): ?>
              <header>
            <?php endif; ?>
                
                
                <?php print render($title_prefix); ?>
                
                <?php $full_title = FALSE; ?>
                
                <?php if ($page): /* <span class="pname" property="v:itemreviewed"><?php echo $node->field_r_provider_name['und'][0]['safe_value'] ?></span><span class="pname delim">:</span><h1 property="v:summary" */?>
                  <h1 property="dc:title v:summary" 
                <?php else: ?>
                    <?php 
                    $full_title_urls = array('/providers/reviews', '/business-voip-reviews', '/residential-voip-reviews');
                    if (in_array(@$_SERVER['REDIRECT_URL'], $full_title_urls)) {
                      $full_title = TRUE;
                    }
                    ?>
                    <?php if($full_title): ?>
                      <h2 class="rcaption" property="dc:title v:summary"
                    <?php else: ?>
                      <h3 class="rcaption" property="dc:title v:summary"
                    <?php endif; ?>
                <?php endif; ?>
                  
                <?php /*print $title_attributes;*/ ?>>
                    <?php if (!$page): ?>
                      <a href="<?php print ($full_title && isset($node->field_ref_provider['und'][0]['target_id']) ? url('node/' . $node->field_ref_provider['und'][0]['target_id']) : $node_url); ?>">
                    <?php endif; ?>
                        
                      <?php 
                        echo ($full_title || $page ? $node->field_r_provider_name['und'][0]['value'] . ' ' . t('Review') . ' - ' : '') . $title; 
                        //if ($page) {
                        //  drupal_set_title($node->field_r_provider_name['und'][0]['safe_value'] . ': ' . $title);
                        //}
                      ?>
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
    
            <?php if ($page): ?>
              <span class="submitted">
              <?php 
                /*
                $created_str = '<span class="delim">|</span>' . date('F d, Y \a\t g:sa', $node->created);
                global $user;
                if ($user->uid && $node->uid) {
                  //echo preg_replace('/(<span.*>)(.*)(<a.*a>)(.*)(<\/span>)/', "$1" . t('Reviewer') . ":$3$created_str$5", $submitted);
                  $submitted = preg_replace('/(<span.*>)(.*)(<a.*a>)(.*)(<\/span>)/', "$1" . t('Reviewer') . ": " . $node->field_r_fname['und'][0]['safe_value'] . "$created_str$5", $submitted);
                }
                elseif (!$node->uid) {
                  //echo preg_replace('/(<span.*>)(.*)(<span.*span>)(.*)(<\/span>)/', "$1" . t('Reviewer') . ": $3 $created_str$5", $submitted);
                  $submitted = preg_replace('/(<span.*>)(.*)(<span.*span>)(.*)(<\/span>)/', "$1" . t('Reviewer') . ": " . $node->field_r_fname['und'][0]['safe_value'] . "$created_str$5", $submitted);
                }
                // Make a link for an authors profile from just a Name.
                else {
                  //echo preg_replace('/(<span.*>)(.*)<span(.*)(about=")(.*)(".*)>(.*)<\/span>.*(<\/span>)/', "$1" . t('Reviewer') . ":<a href=" . '"$5"' . "$3$4$5$6>$7</a>$created_str$8", $submitted);
                  $submitted = preg_replace('/(<span.*>)(.*)<span(.*)(about=")(.*)(".*)>(.*)<\/span>.*(<\/span>)/', "$1" . t('Reviewer') . ": " . $node->field_r_fname['und'][0]['safe_value'] . "$created_str$8", $submitted);
                }
                
                echo $submitted;
                */
                echo t('Reviewer'), ': ', '<span property="v:reviewer">' . $node->field_r_fname['und'][0]['safe_value'], '</span><span class="delim">|</span><span property="v:dtreviewed" content="' . date('Y-m-d', $node->created) . '">', date('F d, Y \a\t g:sa', $node->created), '</span>';
              ?>
            </span>
          <?php endif; ?>
    

        <div class="content"<?php print $content_attributes; ?>>
          
          <div class="gv_votes">
            <?php echo '<div class="caption"><span>' , t('User\'s Rating') , ':</span> <span property="v:rating">' , $node->field_r_rating_overall['und'][0]['value'], '</span>' /* render($content['gv_rating_overall'])*/ , '<div class="bottom-clear"></div></div>' , render($content['gv_ratings']); ?>
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
            
            <?php echo '<div property="v:description">' . render($content['body']) . '</div>'; ?>
          </div>
          <div class="bottom-clear"></div>
          <div class="links">
            <?php //echo l(t('Visit Just Host'), $content['provider_url']); ?>
            <!--<span class="delim">|</span> -->
            <?php 
            
              echo '<div class="rlinks">' 
                  . (
                      $page || $full_title 
                      ? 
                        ( (!isset($node->field_ref_provider['und'][0]['target_id']) || !$node->field_ref_provider['und'][0]['target_id'] ) ? '' : '<a href="' . url('node/' . $node->field_ref_provider['und'][0]['target_id']) . '">View All <span class="review-provider">' . $node->field_r_provider_name['und'][0]['safe_value'] . '</span> Reviews</a> <span class="delim">|</span>')
                      . ( (!isset($content['provider_url']) || !$content['provider_url']) ? '' : '<a href="' . $content['provider_url'] . '"> <span class="review-provider">Visit <span property="v:itemreviewed">' . $node->field_r_provider_name['und'][0]['safe_value'] . '</span></span></a> <span class="delim">|</span>')
                      
                      : ( (!isset($content['provider_url']) || !$content['provider_url']) ? '' : '<a href="' . $content['provider_url'] . '">Visit <span class="review-provider" property="v:itemreviewed">' . $node->field_r_provider_name['und'][0]['safe_value'] . '</span></a> <span class="delim">|</span>')
                    ) 
                    . l(t('Write a Review'), 'node/add/review') 
                  . '</div>'; 
              
              //'<a href="' . $content['provider_url'] . '">' . t('Visit !p', array('!p' => '<span property="v:itemreviewed">' . $node->field_r_provider_name['und'][0]['safe_value'] . '</span>')) . '</a>'
              //
              //'<a href="' . url('node/' . $node->field_ref_provider['und'][0]['target_id']) . '">' . t('View All !p Reviews', array('!p' => '<span property="v:itemreviewed">' . $node->field_r_provider_name['und'][0]['safe_value'] . '</span>')) . '</a>'
              //echo ($page || $_GET['q'] == 'providers/reviews' ? '<a href="' . url('node/' . $node->field_ref_provider['und'][0]['target_id']) . '">' . t('View All !p Reviews', array('!p' => '<span property="v:itemreviewed">' . $node->field_r_provider_name['und'][0]['safe_value'] . '</span>')) . '</a>' . '<span class="delim">|</span>' . l(t('Visit !p', array('!p' => $node->field_r_provider_name['und'][0]['safe_value'])), $content['provider_url']) . '<span class="delim">|</span>' : l(t('Visit !p', array('!p' => $node->field_r_provider_name['und'][0]['safe_value'])), $content['provider_url']) . '<span class="delim">|</span>') . l(t('Write a Review'), 'node/add/review'); 
            
              // ($page || $_GET['q'] == 'providers/reviews' ? '<a href="' . url('node/' . $node->field_ref_provider['und'][0]['target_id']) . '">' . t('View All !p Reviews', array('!p' => '<span property="v:itemreviewed">' . $node->field_r_provider_name['und'][0]['safe_value'] . '</span>') . '</a>' . '<span class="delim">|</span>' . l(t('Visit !p', array('!p' => $node->field_r_provider_name['und'][0]['safe_value'])), $content['provider_url']) . '<span class="delim">|</span>' : l(t('Visit !p', array('!p' => $node->field_r_provider_name['und'][0]['safe_value'])), $content['provider_url']) . '<span class="delim">|</span>') . l(t('Write a Review'), 'node/add/review';
            
            ?>
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
