<?php 

  $provider_name = isset($node->field_p_name['und'][0]['value']) ? $node->field_p_name['und'][0]['value'] : $node->field_p_name[0]['value']; 
  
  dpm($node->p_data);
?>

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php else: ?>
     <?php 
      $url = 'http://getvoip.com'. url('node/' . $node->nid);
    ?>
<?php endif; ?>

           
  <div class="main-content" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
    
        <?php if (!$page): ?>

          <header>
        
            <h2<?php 
                  echo ' property="v:summary"'; 
                ?>>
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
        
          </header>
        <?php endif; ?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
          
          
         <?php if ($page): ?>
          <div id="provider-main">
            
            <div id="provider-top">
              
              <div class="logo-share">
                <?php
                  $logo_block = NULL;
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    $logo_block = '<div class="logo">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $provider_name . ' Reviews', 'title' => $provider_name . ' Reviews', 'attributes' => array('rel' => 'v:photo'))) . '</div>';
                    echo '<table><tbody><tr><td>' . $logo_block . '</td></tr></tbody></table>';
                  }
                  else {
                    echo render($title_prefix), '<h2', $title_attributes,'>', $provider_name, '</h2>', render($title_suffix);
                  }
                  
                  //echo gv_misc_getTrackingUrl('Visit Site', NULL, NULL, NULL, 'visit-site', array('key' => 'rel', 'value' => 'v:url nofollow'));
                  echo gv_misc_getTrackingUrl('', NULL, NULL, NULL, 'visit-site', array('key' => 'rel', 'value' => 'v:url nofollow'));
                  
                ?>
                
                
              </div> <!-- <div class="logo share">-->
                
              <div class="basic-info" rel="v:itemreviewed">
                <div typeof="Organization">
                  <?php 
                      echo '<h1 class="name" property="v:summary">' . $provider_name . '</h1>';
                      if (!empty($node->gv_rating_overall)) {
                        echo '<div class="stars-rating">' . theme('gv_misc_fivestar_static', array('rating' => $node->gv_rating_overall * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css'))) . '<span>' . $node->gv_rating_overall . '/5</span></div>'; 
                      }
                  ?>
                  
                  <div id="info-n-reviews">
                    
                    <div class="company">
                        <div><?php echo '<span class="title">Headquarters:</span><span property="v:address">' . $node->p_data['info']['i_heads'] . '</span>'; ?></div>
                        <div><?php echo '<span class="title">Founded In:</span>' . $node->p_data['info']['i_founded']; ?></div>
                        <div>
                          <?php 
                            if (!$node->p_data['info']['i_web_hide'] && !empty($node->p_data['info']['i_web'])) {
                              $goto_link_title = (isset($node->p_data['info']['i_web_display']) && $node->p_data['info']['i_web_display']) ? $node->p_data['info']['i_web_display'] : str_replace(array('http://', 'https://'), '', $node->p_data['info']['i_web']);
                              echo '<span class="title">Website:</span>' . gv_misc_getTrackingUrl($goto_link_title, NULL, NULL, NULL, NULL, array('key' => 'rel', 'value' => 'v:url nofollow'));
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="overall"> 
                        <?php 
                            $no_reviews_class = ' no-reviews';
                            if (!empty($content['gv_ratings'])): 
                        ?>

                              <?php 
                                 $no_reviews_class = NULL;
                                 echo '<div class="price narrow">', (empty($node->p_data['s']['bu']['fees']['mon']) ? '' : '$' . $node->p_data['s']['bu']['fees']['mon']), '</div>',
                                      '<div class="voters"><div class="title"><span class="not-narrow">Number of </span>Reviews:</div><div class="count" property="v:count"><a href="#reviews" rel="nofollow" >', $node->gv_voters, '</a></div></div>',
                                      '<div class="recommend not-narrow"><div class="title">Would recommend: </div><div class="data">', $node->gv_recommend, '% of Users</div></div>'
                                      ;
                              ?>

                        <?php /*else: ?>
                            <?php echo l('<img src="/sites/all/themes/gv_orange/css/images/writeareview2.png" alt="Write a Review" />', 'node/add/review', array('html' => TRUE, 'attributes' => array('id' => 'write-review', 'rel' => 'nofollow'), 'query' => array('id' => $node->nid))); ?>
                        <?php */endif; // end of if ($page && isset($content['gv_ratings']) && $content['gv_ratings']): ?>
                    </div>
                    
                  </div> <!-- End of <div id="info-n-reviews"> -->
                  
                  
                  
                </div> <!-- End of <div typeof="Organization"> -->
                
                <div class="links<?php echo $no_reviews_class;?>">
                  <?php echo '<a href="#" id="request-demo" rel="nofollow">Request a Demo</a>', // l('Request a Demo', '#', array('html' => TRUE, 'attributes' => array('id' => 'request-demo', 'rel' => 'nofollow'))), 
                          l('Request a Quote', 'node/add/review', array('html' => TRUE, 'attributes' => array('id' => 'request-quote', 'rel' => 'nofollow'), 'query' => array('id' => $node->nid))), 
                          l('Write a Review', 'node/add/review', array('html' => TRUE, 'attributes' => array('id' => 'write-review', 'rel' => 'nofollow'), 'query' => array('id' => $node->nid)));   
                  
                  
                  
//                          global $user; 
//                          if ($user->uid) 
                            {
                            
                            // Colorbox for popup window.
                            //1, 3, 4, 
                            drupal_add_js('sites/all/libraries/jquery.plugins/colorbox/colorbox/jquery.colorbox.js');
                            drupal_add_css('sites/all/libraries/jquery.plugins/colorbox/example1/colorbox.css', array('preprocess' => FALSE)); // array('group' => CSS_THEME, 'preprocess' => FALSE)

                            // Exit intent Ad block main js.
                            $path_to_custom_js = drupal_get_path('module', 'gv_pages') . '/js/';
                            drupal_add_js($path_to_custom_js . 'gv_provider_popup_requestLinks.js');
                            
                          }

                  
                  ?>
                  
                            <!-- Popup windows for Request links above -->
                            
                            <div style="display: none;">
                              <div id="block-gv-blocks-request-quote-v8" class="popup-request quote"> 
                                <?php echo $logo_block, '<div class="header"><div class="title">Request ', $provider_name, ' Quote</div><div class="descr">In order to prepare a quote, we need some information about you</div></div>'; ?>
                                <div class="bottom-clear"></div>
                                <?php echo gv_blocks_get_requestQuote_block_v8_popup_provider(); ?>
                                
                              </div>
                            </div>
                            
                            
                            <div style="display: none;">
                              <div id="block-gv-blocks-request-quote-v8" class="popup-request demo"> 
                                <?php echo $logo_block, '<div class="header"><div class="title">Request ', $provider_name, ' Demo</div><div class="descr">In order to schedule your demo, we need some information from you:</div></div>'; ?>
                                <div class="bottom-clear"></div>
                                <?php echo gv_blocks_get_requestDemo_block_v1_popup_provider(); ?>
                                
                              </div>
                            </div>

                  
                  
                </div>
                
              </div> <!-- End of <div class="basic-info" rel="v:itemreviewed"> -->
             
              
              
              <?php if (!empty($content['gv_ratings'])): ?>
                  <div class="gv_votes main"><?php echo render($content['gv_ratings']); ?>
                    <div class="total">
                      <?php 

                          echo '<div class="caption">OVERALL SCORE</div>
                          <span class="count" rel="v:rating">
                            <span typeof="v:Rating">
                              <span property="v:worst" content="0"></span>
                              <span property="v:value">' . $node->gv_rating_overall . '</span>
                              <span property="v:best" content="5"></span>
                            </span>
                          </span><div class="stars-rating">' . theme('gv_misc_fivestar_static', array('rating' => $node->gv_rating_overall * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css'))) . '</div>'; 

                      ?>
                    </div>
                  </div>
              <?php endif; // end of if (!empty($content['gv_ratings'])): ?>
              
              
            </div> <!-- End of <div id="provider-top"> -->
          
                  
          </div> <!-- End of <div id="provider-main"> -->
              
                      
          <div class="data tabs">
                
                <ul class="data-tabs-ul">
                  <?php if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): ?>
                    <li><a id="tab0" href="#tabs-0">
                      <?php 
                        //echo t('!p Reviews', array('!p' => !empty($provider_name) ? $provider_name : 'Provider' ));
                        echo 'Customer Reviews';
                      ?>
                    </a></li>
                  <?php endif; ?>
                    
                  <li><a id="tab1" href="#tabs-1">
                    <?php 
                      //echo t('!p Rundown', array('!p' => !empty($provider_name ) ? $provider_name : ' Provider' ));
                      echo 'Provider Overview';
                    ?>
                  </a></li>
                  
                  <?php 
                  
                          
                  $provider_options_bu = isset($node->p_data['provider_options_bu']) ? $node->p_data['provider_options_bu'] : (isset($node->p_data['provider_options']) ? $node->p_data['provider_options'] : NULL);
                  
                  if (!empty($provider_options_bu) && !empty($provider_options_bu['enabled'])) {
                    //echo '<li><a href="#tabs-2">Business Service Details</a></li>';
                    echo '<li><a id="tab2" href="#tabs-2">Available Services</a></li>';
                  }
                  
                  $provider_options_re = isset($node->p_data['provider_options_re']) ? $node->p_data['provider_options_re'] : NULL;
                  
                  if (!empty($provider_options_re) && !empty($provider_options_re['enabled'])) {
                    echo '<li><a id="tab3" href="#tabs-3">Available Services</a></li>';
                  }
                  
                  ?>
                </ul>
                
                
                
                
                <?php
                    $first_section_is_set = FALSE;
                    if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): 
                      $first_section_is_set = TRUE;
                ?>
                  <div id="tabs-0">
                    <div class="reviews">
                        <a id="reviews"></a>

                      <?php echo render($content['reviews_entity_view_1']); ?>

                    </div>
                  </div>
                <?php endif; ?>
                
                <div id="tabs-1" class="<?php 
                                            if ($first_section_is_set) {
                                              echo 'ui-tabs-hide aaa';
                                            }
                                            else {
                                              $first_section_is_set = TRUE;
                                            }
                                        ?>">
                  <?php echo render($content['body']); ?>
                </div>
                
                
                
                <?php 
                
                  if (!empty($provider_options_bu) && !empty($provider_options_bu['enabled'])) {
                  
                    echo '<div id="tabs-2" class="ui-tabs-hide aaa">';

                      $provider_options_bu_out = '';

                      unset($provider_options_bu['enabled']);

                      foreach ($provider_options_bu as $options_set => $options_data) {

                        $provider_options_bu_out .= '<tr><td colspan="2"></td></tr><tr class="caption ' . $options_set . '"><td colspan="2">' . str_replace(array('(', ')'), array('<span>(', ')</span>'), $options_set) . '</td></tr>';

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
                  
                  
                  
                  
                  if ($user->uid && !empty($provider_options_re) && !empty($provider_options_re['enabled'])) {
                  
                    echo '<div id="tabs-3" class="ui-tabs-hide aaa">';

                      $provider_options_re_out = '';

                      unset($provider_options_re['enabled']);

                      foreach ($provider_options_re as $options_set => $options_data) {

                        $provider_options_re_out .= '<tr><td colspan="2"></td></tr><tr class="caption"><td colspan="2">' . str_replace(array('(', ')'), array('<span>(', ')</span>'), $options_set) . '</td></tr>';

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

        
  </div> <!-- main-content -->
  
  <!--<div class="shadow"></div> -->
  
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
