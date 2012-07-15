<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

           
  <div class="main-content" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
    
        <?php if ($page): ?>
          <?php print render($title_prefix); ?>
          <h1<?php //print $title_attributes; ?> property="dc:title v:summary">
                <?php 
                  print $title; //t('Our Take on !p Business VoIP Provider', array('!p' => $content['field_p_name'][0]['#markup']) )
                ?>
          </h1>
          <?php print render($title_suffix); ?>
   
        <?php else: ?>
          <header>
        
            <?php print render($title_prefix); ?>
            <h2<?php //print $title_attributes; ?> property="dc:title v:summary">
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
            <?php print render($title_suffix); ?>
        
          </header>
        <?php endif; ?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
          
          
           <?php if ($page): ?>
              <div class="logo-share">
                <?php
                
                  //dpm($content['field_p_logo']);
                  
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    echo '<div class="logo"><a href="' . $node->p_data['info']['i_web'] . '" target="_blank">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'attributes' => array('rel' => 'v:photo'))) . '</a></div>'; 
                  }
                  else {
                    //echo render($title_prefix), '<h1', $title_attributes,'><a href="', $node_url, '>', $title, '</a></h1>', render($title_suffix);
                    echo render($title_prefix), '<h2', $title_attributes,'>', $content['field_p_name'][0]['#markup'], '</h2>', render($title_suffix);
                  }
                  $url = 'http://getvoip.com'. url('node/' . $node->nid);
                ?>
                
                <div class="share main">
                  
                  <div id="facebook-b">
                    <div id="fb-root"></div>
                    <div id="fb">
                      <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=138241656284512";
                        fjs.parentNode.insertBefore(js, fjs);
                      }(document, 'script', 'facebook-jssdk'));</script>
                      <div class="fb-like" data-href="<?php echo $url?>" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>
                    </div>
                  </div>

                  <div id="gplus-b">
                    <script type="text/javascript">
                      (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                      })();
                    </script>
                    <g:plusone size="medium" href="<?php echo $url?>"></g:plusone>
                  </div>

                  <div id="linkedin-b">
                    <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
                    <script type="IN/Share" data-url="<?php echo $url?>" data-counter="right" data-showzero="true"></script>
                  </div>

                  <div id="twitter-b">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                  </div>
                  
                </div> <!-- main share buttons -->
                
              </div> <!-- <div class="logo share">-->
                
              <div class="basic-info" rel="v:itemreviewed">
                <div typeof="Organization">
                  <div class="caption"><?php echo t('!p Corporate Info:', array('!p' => '<span property="v:itemreviewed">' . $content['field_p_name'][0]['#markup'] . '</span>')); ?></div>
                  <div><?php echo '<span class="title">' . t('Headquarters') . ':</span><span property="v:address">' . $node->p_data['info']['i_heads'] . '</span>'; ?></div>
                  <div><?php echo '<span class="title">' . t('Founded In') . ':</span>' . $node->p_data['info']['i_founded']; ?></div>
                  <div><?php echo '<span class="title">' . t('Service Availability') . ':</span>' . $node->p_data['info']['i_availability']; ?></div>
                  <div><?php if (!$node->p_data['info']['i_web_hide']) echo '<span class="title">' . t('Website') . ':</span>' . l( (isset($node->p_data['info']['i_web_display']) && $node->p_data['info']['i_web_display']) ? $node->p_data['info']['i_web_display'] : str_replace(array('http://', 'https://'), '', $node->p_data['info']['i_web']), $node->p_data['info']['i_web'], array('attributes' => array('rel' => 'v:url', 'target' => '_blank'))); ?></div>
                </div>
              </div>
             
              <div class="image">
                <?php
                  if (isset($content['field_p_image'][0]['#item']['uri'])) {
                    echo '<div><a href="' , $node->p_data['info']['i_web'] , '" target="_blank">' , theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page')) , '</a></div>', 
                         '<div class="site">' , l('Visit ' . $content['field_p_name'][0]['#markup'], $node->p_data['info']['i_web'], array('attributes' => array('target' => '_blank'))) , '</div>';
                  }
                ?>  
                
              </div>
          
              
              <div class="bottom-clear"></div>

              <?php if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                  <div class="gv_votes"><?php echo '<div class="caption">' . t('Overall Consumer Ratings') . '</div>' . render($content['gv_ratings']); ?></div>
                  <div class="overall"> 
                    <div class="text">
                      <?php echo '<div class="voters"><div class="title">' . t('Number of Reviews') . ':</div><div class="count" property="v:count">' . $node->gv_voters . '</div></div>'; ?>
                      <?php echo render($content['gv_recommend']); ?>
                      <div class="overall title"><?php $content['field_p_name'][0]['#markup'] . ' ' . t('Overall Rated:'); ?></div>
                    </div>
                    <div class="star-big">
                      <?php echo /*render($content['gv_rating_overall'])*/ '<div class="count" content="' . $node->gv_rating_overall . '" property="v:rating">' . $node->gv_rating_overall . '</div>' . '<div class="descr">' . t('Out of 5 stars') . '</div>'; ?>
                    </div>
                  </div>
              
              <?php endif; // end of if ($page && isset($content['gv_ratings']) && $content['gv_ratings']): ?>
              
              <div class="bottom-clear"></div>
              
              
                      
              <div class="data tabs">
                
                <ul>
                  <li><a href="#tabs-1"><?php echo t('About !p', array('!p' => isset($content['field_p_name'][0]['#markup']) ? /*'<span property="v:itemreviewed">' .*/ $content['field_p_name'][0]['#markup'] /*. '</span>'*/ : t(' Provider') )); ?></a></li>
                  <?php 
                    $count = 2;
                    foreach ($node->field_p_types['und'] as $type) {
                      echo '<li><a href="#tabs-' . $count++ . '">' . t('!type Features & Pricing', array('!type' => ucfirst($type['value']))) . '</a></li>';
                    } 
                  ?>
                </ul>
                <div id="tabs-1">
                  <?php echo render($content['body']); ?>
                </div>
                
                <?php 
                    $count = 2;
                    foreach ($node->field_p_types['und'] as $type) {
                      
                      switch ($type['value']) {
                        case 'business':
                          $key = 's_business';
                          $prefix = 'bu';
                          break;
                        case 'residential':
                          $key = 's_residential';
                          $prefix = 're';
                          break;
                        case 'international':
                          $key = 's_international';
                          $prefix = 'in';
                          break;
                      }
                      
                      
                      echo '<div id="tabs-' . $count++ . '">';
                      
                        if ($node->p_data['services'][$key][$prefix . '_basicinfo_title']) {
                          echo  '<div class="f caption first">' , t($node->p_data['services'][$key][$prefix . '_basicinfo_title']) , ':</div>',
                                '<div class="text">' , t($node->p_data['services'][$key][$prefix . '_basicinfo_text']) , '</div>';
                        }

                        echo    '<div class="f caption">' , t('Pricing') , ':</div>',
                                '<div class="block-1">',
                                '<div class="price"><div class="title">' , t('Monthly price') , ':</div><div class="fee">' , ($node->p_data['services'][$key][$prefix . '_basicinfo_fees']['monthly_fees'] ? $node->p_data['services'][$key][$prefix . '_basicinfo_fees']['monthly_fees'] : t('N/A') ) , '</div></div>',
                                '<div class="price"><div class="title">' , t('Setup Fees') , ':</div><div class="fee">' , ($node->p_data['services'][$key][$prefix . '_basicinfo_fees']['setup_fees'] ? $node->p_data['services'][$key][$prefix . '_basicinfo_fees']['setup_fees'] : t('N/A') ), '</div></div>',
                                '<div class="price"><div class="title">' , t('Cancellation Fees') , ':</div><div class="fee">' , ($node->p_data['services'][$key][$prefix . '_basicinfo_fees']['cancel_fees'] ? $node->p_data['services'][$key][$prefix . '_basicinfo_fees']['cancel_fees'] : t('N/A') ) , '</div></div>',
                                '</div>',
                                '<div class="block-2">',
                                '<div class="price"><div class="title">' , t('Long Distance') , ':</div><div class="fee">' , ($node->p_data['services'][$key][$prefix . '_basicinfo_fees']['longdistance_fees'] ? $node->p_data['services'][$key][$prefix . '_basicinfo_fees']['longdistance_fees'] : t('N/A') ), '</div></div>',
                                '<div class="price"><div class="title">' , t('Other Fees') , ':</div><div class="fee">' , ($node->p_data['services'][$key][$prefix . '_basicinfo_fees']['other_fees'] ? $node->p_data['services'][$key][$prefix . '_basicinfo_fees']['other_fees'] : t('N/A') ) , '</div></div>',
                                '</div>',

                                '<div class="f caption back">' , t('Money Back Guarantee') , ':</div>',
                                '<div class="text">' , t($node->p_data['services'][$key][$prefix . '_money_back_guarantee']) , '</div>';

                        if (isset($node->p_data['services'][$key]['weights_' . $prefix . '_features'])) {
                          echo '<div class="f caption">' , t('Available Features') , ':</div>';
                          foreach ($node->p_data['services'][$key]['weights_' . $prefix . '_features'] as $tid => $term) {
                            echo '<div class="tag">' , t($term['name']) /*l(t($term['name']), 'taxonomy/term/' . $tid )*/ , '</div>';
                          }

                        }
                      
                      echo '</div>'; // End of echo '<div id="tabs-' . $count++ . '">';
                  
                      
                    } // End of foreach ($node->field_p_types['und'] as $type) {
                    
                ?>
                
              </div> <?php // End of <div class="data tabs"> ?>
              
          <?php gv_misc_renderMetatags_newOrder($content['metatags']); //echo render($content['metatags']); ?>
          
          
              
              
              
              
          <?php else: ?> <!-- if ($page): -->
          
              <div class="logo">
                <?php
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    echo '<div class="logo">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page')) . '</div>';
                  }
                  else {
                    echo render($title_prefix), '<h2', $title_attributes,'>', $node->field_p_name['und'][0]['value'], '</h2>', render($title_suffix);
                  }
                ?>
              </div>
          
              <?php echo render($content['body']); ?>
          
          
          
          <?php endif; ?>  <!-- if ($page): -->
           
              
          <?php //echo render($content); ?>
          
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
  
  
  <?php if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): ?>
    <div class="reviews">
      <div class="header">
        <h2 class="button"><?php echo $node->field_p_name['und'][0]['value'], ' ', t('User Reviews'); ?></h2>
        
        <!-- <div class="button"> -->
          <?php 
          /*
            if (isset($node->current_user_has_review)) {
              echo l(t('Your Review'), $node->current_user_has_review, array('attributes' => array('title' => t('You have already submitted a review for this provider: "' . $node->current_user_has_review_title . '"')))); 
            }
            else {
              echo l(t('Submit Your Review'), 'node/add/review'); 
            }
          */
          ?>
        <!--</div> -->
      </div>

      
      <?php 
        // Hide Sort be Select element.
        //<div class="form-item form-type-select form-item-sort-by">
        ////$content['reviews_entity_view_1'] = preg_replace('/(.*<div.*views-widget-sort-by.*\")(>.*)/', "$1 style=" . '"display: none;"' . "$2", $content['reviews_entity_view_1']);
      
      
//      <div class="views-exposed-widget views-widget-sort-order">
//        <div class="form-item form-type-select form-item-sort-order">
//          <label for="edit-sort-order">Order </label>
//          <select class="form-select" name="sort_order" id="edit-sort-order"><option value="ASC">Asc</option><option selected="selected" value="DESC">Desc</option></select>
//        </div>
//      </div>
    
//        if (strpos($content['reviews_entity_view_1'], '<option selected="selected" value="created">Post date</option>')) {
//          $content['reviews_entity_view_1'] = preg_replace('/(.*<option value="ASC">)(.*)(<.*)/', "$1xxx$3", $content['reviews_entity_view_1']);
//        }
//        else {
//          $content['reviews_entity_view_1'] = preg_replace('/(.*<option value="ASC">)(.*)(<.*)/', "$1yyy$3", $content['reviews_entity_view_1']);
//        }
        echo render($content['reviews_entity_view_1']); 
      ?>
      
    </div>
 <?php endif; ?>
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
