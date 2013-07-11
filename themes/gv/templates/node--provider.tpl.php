<?php $provider_name = isset($node->field_p_name['und'][0]['value']) ? $node->field_p_name['und'][0]['value'] : $node->field_p_name[0]['value']; ?>

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php else: ?>
     <?php 
    
      $url = 'http://getvoip.com'. url('node/' . $node->nid);
      //$url = 'http://getvoip.com' . ($_GET['q'] == 'home' ? '' : $_SERVER['REQUEST_URI']);
     

          if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
            $share_title = $node->metatags['title']['value'];
          }
          else {
            $share_title = $title;
          }

        echo '<div class="float share">' . gv_blocks_getSocialiteButtons($url, $share_title) . '</div>';

    ?>
<?php endif; ?>

           
  <div class="main-content" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
    
        <?php if ($page): ?>
          <h1<?php 
                echo ' property="v:summary"'; 
                if (!$node->status) {echo ' class="not-published"';}?> ><?php 
                  print $title; 
                ?></h1>
   
        <?php else: ?>
          <header>
        
            <h2<?php 
                  //echo /*$title_attributes .*/ ' property="dc:title v:summary"'; 
                  echo /*$title_attributes .*/ ' property="v:summary"'; 
                ?>>
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
        
          </header>
        <?php endif; ?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
          
          
           <?php if ($page): ?>
            <div id="provider-top">
              <div class="logo-share">
                <?php
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    echo '<div class="logo">' . gv_misc_getTrackingUrl(theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $content['field_p_logo'][0]['#item']['alt'], 'title' => $content['field_p_logo'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo')))) . '</div>';
                  }
                  else {
                    echo render($title_prefix), '<h2', $title_attributes,'>', $provider_name /*$content['field_p_name'][0]['#markup']*/, '</h2>', render($title_suffix);
                  }
                  $url = 'http://getvoip.com'. url('node/' . $node->nid);
                ?>
                
                <?php /*
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
                */ ?>
              </div> <!-- <div class="logo share">-->
                
              <div class="basic-info" rel="v:itemreviewed">
                <div typeof="Organization">
                  <div class="caption"><?php echo t('!p Corporate Info:', array('!p' => '<span property="v:itemreviewed">' . $provider_name . '</span>')); ?></div>
                  <div><?php echo '<span class="title">Headquarters:</span><span property="v:address">' . $node->p_data['info']['i_heads'] . '</span>'; ?></div>
                  <div><?php echo '<span class="title">Founded In:</span>' . $node->p_data['info']['i_founded']; ?></div>
                  <div><?php echo '<span class="title">Service Availability:</span>' . $node->p_data['info']['i_availability']; ?></div>
                  <div>
                    <?php 
                      if (!$node->p_data['info']['i_web_hide'] && !empty($node->p_data['info']['i_web'])) {
                        $goto_link_title = (isset($node->p_data['info']['i_web_display']) && $node->p_data['info']['i_web_display']) ? $node->p_data['info']['i_web_display'] : str_replace(array('http://', 'https://'), '', $node->p_data['info']['i_web']);
                        echo '<span class="title">Website:</span>' . gv_misc_getTrackingUrl($goto_link_title, NULL, NULL, NULL, NULL, array('key' => 'rel', 'value' => 'v:url'));
                      }
                      ?>
                  </div>
                </div>
              </div>
             
              <div class="image">
                <?php
                
                  if (isset($content['field_p_image'][0]['#item']['uri'])) {
                    echo '<div>' . gv_misc_getTrackingUrl(theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page', 'alt' =>  $content['field_p_image'][0]['#item']['alt'], 'title' =>  $content['field_p_image'][0]['#item']['title']))), '</div>';
                  }
                  
                  if (!$node->p_data['info']['i_web_hide'] && !empty($node->p_data['info']['i_web'])) {
                    echo '<div class="site">' , gv_misc_getTrackingUrl('Visit ' . $provider_name), '</div>';
                  }
                ?>  
                
              </div>
          
              
            </div>
              <!--<div class="bottom-clear"></div> -->

              <?php if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                  <div class="gv_votes"><?php echo '<div class="caption">Overall Consumer Ratings</div>' . render($content['gv_ratings']); ?></div>
                  <div class="overall"> 
                    <div class="text">
                      <?php echo '<a id="write-review" href="/voip-provider-submit-user-review?id=' . $node->nid . '"><img src="/sites/default/files/writeareview.png" /></a><div class="voters"><div class="title">' . 'Number of Reviews' . ':</div><div class="count" property="v:count"><a href="#reviews">' . $node->gv_voters . '</a></div></div>'; ?>
                      <?php echo '<div id="positive">' . $node->gv_recommends['positive'] . ' Positive reviews</div><div id="negative">' . $node->gv_recommends['negative'] . ' Negative reviews</div>' ?>
                      <?php echo '<div class="recommend"><div class="title">Would recommend: </div><div class="data">' . $node->gv_recommend . '% of Users' . '</div></div>'; ?>
                      <div class="title"><?php $provider_name /*$content['field_p_name'][0]['#markup']*/ . ' Overall Rated:'; ?></div>
                    </div>
                    <div class="star-big">
                      <?php echo '<div class="count" content="' . $node->gv_rating_overall . '" property="v:rating">' . $node->gv_rating_overall . '</div>' . '<div class="descr">' . t('Out of 5 stars') . '</div>'; ?>
                    </div>
                  </div>
              
              <? else: ?>
                  <?php echo '<a id="write-review" href="/voip-provider-submit-user-review?id=' . $node->nid . '"><img src="/sites/default/files/writeareview.png" /></a>'; ?>
              <?php endif; // end of if ($page && isset($content['gv_ratings']) && $content['gv_ratings']): ?>
              
              <div class="bottom-clear"></div>
              
              
                      
              <div class="data tabs">
                
                <ul>
                  <?php if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): ?>
                    <li><a href="#tabs-0"><?php echo t('!p User Reviews', array('!p' => empty($provider_name) ? $provider_name : 'Provider' )); ?></a></li>
                  <?php endif; ?>
                    
                  <li><a href="#tabs-1"><?php echo t('!p Rundown', array('!p' => empty($provider_name ) ? $provider_name : t(' Provider') )); ?></a></li>
                  
                  <?php 
                  
                  dpm($node->p_data);
                          
                  $provider_options_bu = isset($node->p_data['provider_options_bu']) ? $node->p_data['provider_options_bu'] : (isset($node->p_data['provider_options']) ? $node->p_data['provider_options'] : NULL);
                  
                  dpm($provider_options_bu);
                  
                  if (!empty($provider_options_bu) && !empty($provider_options_bu['enabled'])) {
                    echo '<li><a href="#tabs-2">Business Options</a></li>';
                  }
                  
                  $provider_options_re = isset($node->p_data['provider_options_re']) ? $node->p_data['provider_options_re'] : NULL;
                  
                  dpm($provider_options_re);
                  
                  //if (!empty($provider_options_re) && (!isset($provider_options_re['enabled']) || !empty($provider_options_re['enabled']))) {
                  if (!empty($provider_options_re) && !empty($provider_options_re['enabled'])) {
                    echo '<li><a href="#tabs-3">Residential Options</a></li>';
                  }
                  
                  ?>
                </ul>
                
                
                
                
                <?php if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): ?>
                  <div id="tabs-0">
                    <div class="reviews">
                        <a id="reviews"></a>

                      <?php echo render($content['reviews_entity_view_1']); ?>

                    </div>
                  </div>
                <?php endif; ?>
                
                <div id="tabs-1">
                  <?php echo render($content['body']); ?>
                </div>
                
                
                
                <?php 
                
                  if (!empty($provider_options_bu) && (!isset($provider_options_bu['enabled']) || !empty($provider_options_bu['enabled']))) {
                  
                    echo '<div id="tabs-2">';

                      $provider_options_bu_out = '';

                      unset($provider_options_bu['enabled']);

                      foreach ($provider_options_bu as $options_set => $options_data) {

                        $provider_options_bu_out .= '<tr></tr><tr class="caption"><td colspan="2">' . $options_set . '</td></tr>';

                        $odd = TRUE;

                        foreach ($options_data as $option_title => $option_value) {
                          if (strpos($option_title, '-text-')) {
                            continue;
                          }
                          $option_title = str_replace('Num ', '# ', $option_title);
                          $option_value = (is_int($option_value) ? ($option_value ? 'Yes' : 'No') : ($option_value ? $option_value : 'N/A'));
                          if ($odd) {
                            $odd = FALSE;
                            $row_class = 'even';
                          }
                          else {
                            $odd = TRUE;
                            $row_class = 'odd';
                          }

                          if ($option_value == 'Yes' && !empty($options_data[$option_title . ' -text-'])) {
                            $additional_text = ' <span>' . $options_data[$option_title . ' -text-'] . '</span>';
                          }
                          else {
                            $additional_text = '';
                          }
                          if (is_array($option_value)) {
                            $option_value = $option_value['value'];
                          }
                          $provider_options_bu_out .= '<tr class="' . $row_class . '"><td class="title">' . $option_title . '</td><td class="value' . ($option_value == 'Yes' ? ' yes' : ($option_value == 'No' ? ' no' : '')) . '"><div class="check">' . $option_value . '</div><span>' . $additional_text . '</span></td></tr>';
                        }
                      }
                      echo '<table class="specs"><tbody>' . $provider_options_bu_out . '</tbody></table>';

                    echo '</div>';
                  }
                  
                  
                  
                  
                  if ($user->uid && !empty($provider_options_re) && (!isset($provider_options_re['enabled']) || !empty($provider_options_re['enabled']))) {
                  
                    echo '<div id="tabs-3">';

                      $provider_options_re_out = '';

                      unset($provider_options_re['enabled']);

                      foreach ($provider_options_re as $options_set => $options_data) {

                        $provider_options_re_out .= '<tr></tr><tr class="caption"><td colspan="2">' . $options_set . '</td></tr>';

                        $odd = TRUE;

                        foreach ($options_data as $option_title => $option_value) {
                          if (strpos($option_title, '-text-')) {
                            continue;
                          }
                          $option_title = str_replace('Num ', '# ', $option_title);
                          $option_value = (is_int($option_value) ? ($option_value ? 'Yes' : 'No') : ($option_value ? $option_value : 'N/A'));
                          if ($odd) {
                            $odd = FALSE;
                            $row_class = 'even';
                          }
                          else {
                            $odd = TRUE;
                            $row_class = 'odd';
                          }

                          if ($option_value == 'Yes' && !empty($options_data[$option_title . ' -text-'])) {
                            $additional_text = ' <span>' . $options_data[$option_title . ' -text-'] . '</span>';
                          }
                          else {
                            $additional_text = '';
                          }
                          if (is_array($option_value)) {
                            $option_value = $option_value['value'];
                          }
                          $provider_options_re_out .= '<tr class="' . $row_class . '"><td class="title">' . $option_title . '</td><td class="value' . ($option_value == 'Yes' ? ' yes' : ($option_value == 'No' ? ' no' : '')) . '"><div class="check">' . $option_value . '</div><span>' . $additional_text . '</span></td></tr>';
                        }
                      }
                      echo '<table class="specs"><tbody>' . $provider_options_re_out . '</tbody></table>';

                    echo '</div>';
                  }
                  
                  ?>
               
                <div class="bottom-clear"></div>
                
                
              </div> <?php // End of <div class="data tabs"> ?>

              
              
              
          <?php echo render($content['metatags']); //gv_misc_renderMetatags_newOrder($content['metatags']);?>
          
          
              
              
              
              
          <?php else: ?> <!-- if (!$page): -->
          
              <div class="logo">
                <?php
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    echo '<div class="logo">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page')) . '</div>';
                  }
                  else {
                    echo render($title_prefix), '<h2', $title_attributes,'>', $provider_name, '</h2>', render($title_suffix);
                  }
                ?>
              </div>
          
              <?php echo render($content['body']); ?>
          
          
          
          <?php endif; ?>  <!-- if ($page): -->
           
              
          <?php //echo render($content); ?>
          
        </div> <!-- content -->

        
        
      <?php /*if ($page): ?>
    
        <footer>

        </footer>
    
      <?php endif; */?>
        
      

  </div> <!-- main-content -->
  
  <div class="shadow"></div>
  
  
  <?php 
  global $user;
  if (0) /*($user->uid == 1)*/ /*($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1'])*/: ?>
    <div class="reviews">
      <div class="header">
        <a id="reviews"></a>
        <h2 class="button"><?php echo $provider_name, ' User Reviews'; ?></h2>
        
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
