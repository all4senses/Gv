<?php 
  drupal_add_js('sites/all/themes/gv_sky/js/provider.js');
  drupal_add_js('/sites/all/themes/gv_sky/js/popup.js');

  $provider_name = isset($node->field_p_name['und'][0]['value']) ? $node->field_p_name['und'][0]['value'] : $node->field_p_name[0]['value']; 
  
?>

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php else: ?>
     <?php 
      $url = 'http://getvoip.com'. url('node/' . $node->nid);
    ?>
<?php endif; ?>

  <div class="provider-box" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
    
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
    

              
          
        
       <?php if ($page): ?>

        <div class="provider-box-provider provider-box-provider-sticky">
            <div class="provider-box-provider-sticky-wrap">
            
              <div class="provider-box-provider-logo provider-box-provider-sticky-logo">
                <?php
                  $logo_block = NULL;
                  $logo_block2 = NULL;
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    $logo_block = '<div class="provider-box-provider-logo-wrap provider-box-provider-sticky-logo-wrap">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $provider_name . ' Reviews', 'title' => $provider_name . ' Reviews', 'attributes' => array('rel' => 'v:photo', 'class' => 'provider-box-provider-logo-wrap-img'))) . '</div>';
                    $logo_block2 = '<div class="provider-popup-logo">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $provider_name . ' Reviews', 'title' => $provider_name . ' Reviews', 'attributes' => array('rel' => 'v:photo', 'class' => 'provider-popup-logo-img'))) . '</div>';
                    echo $logo_block;
                  }
                  else {
                    echo render($title_prefix), '<h2', $title_attributes,'>', $provider_name, '</h2>', render($title_suffix);
                  }
                ?>
              </div>

                
              <div class="provider-box-provider-details provider-box-provider-sticky-details">
                
                    <?php echo
                      gv_misc_getTrackingUrl('<span class="provider-box-provider-details-button-text provider-box-provider-sticky-details-button-text">Visit Provider</span>', NULL, NULL, NULL, 'provider-box-provider-details-button provider-box-provider-sticky-details-button', array('key' => 'rel', 'value' => 'v:url nofollow')) .

                      // (!empty($node->p_data['disable_buttons']['quote']) ? '' : l('<span class="provider-box-provider-details-button-text provider-box-provider-sticky-details-button-text">Request a Quote</span>', 'node/add/review', array('html' => TRUE, 'attributes' => array('class' => 'provider-box-provider-details-button provider-box-provider-sticky-details-button', 'rel' => 'nofollow'), 'query' => array('id' => $node->nid)))) . 
                      '<div class="provider-box-provider-details-button provider-box-provider-sticky-details-button quote-trigger trigger"><span class="provider-box-provider-details-button-text provider-box-provider-sticky-details-button-text">Request a Quote</span></div>'.
                     
                      l('<span class="provider-box-provider-details-button-text provider-box-provider-sticky-details-button-text write-review">Write Review</span>', 'node/add/review', array('html' => TRUE, 'attributes' => array('class' => 'provider-box-provider-details-button provider-box-provider-sticky-details-button', 'rel' => 'nofollow'), 'query' => array('id' => $node->nid)));   
                    ?>
            
              </div> <!-- End of <div class="provider-box-provider-details" -->
             
              
              <?php if (!empty($content['gv_ratings'])): ?>
                    <div class="provider-box-provider-review-score provider-box-provider-sticky-review-score">
                          <div class="provider-box-provider-review-score-number" rel="v:rating">
                            <span typeof="v:Rating">
                              <span property="v:worst" content="0"></span>
                              <span property="v:value"> <?php echo $node->gv_rating_overall; ?> </span>
                              <span property="v:best" content="5"></span>
                            </span>
                          </div>
                          <div class="provider-box-provider-review-score-fivestar"> <?php echo theme('gv_misc_fivestar_provider', array('rating' => $node->gv_rating_overall * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css'))); ?>
                          </div>

                    </div>
              <?php endif; // end of if (!empty($content['gv_ratings'])): ?>
                  </div>
          </div>

        <div class="provider-box-provider">
          
            
            <div class="provider-box-provider-logo">
              <?php
                $logo_block = NULL;
                if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                  $logo_block = '<div class="provider-box-provider-logo-wrap">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $provider_name . ' Reviews', 'title' => $provider_name . ' Reviews', 'attributes' => array('rel' => 'v:photo', 'class' => 'provider-box-provider-logo-wrap-img'))) . '</div>';
                  echo $logo_block;
                }
                else {
                  echo render($title_prefix), '<h2', $title_attributes,'>', $provider_name, '</h2>', render($title_suffix);
                }
                
                echo gv_misc_getTrackingUrl('<span class="provider-box-provider-logo-button-text">Visit Provider</span>', NULL, NULL, NULL, 'provider-box-provider-logo-button', array('key' => 'rel', 'value' => 'v:url nofollow'));
              ?>
            </div>

              
            <div class="provider-box-provider-details" rel="v:itemreviewed">
              <div typeof="Organization">
                <?php 
                    echo '<h1 class="provider-box-provider-details-name" property="v:summary">' . $provider_name . '</h1>';
                ?>                

                  <div class="provider-box-provider-details-info provider-box-provider-details-info_location"><?php echo $node->p_data['info']['i_heads']; ?></div>
                  <div class="provider-box-provider-details-info provider-box-provider-details-info_website">
                    <?php 
                      if (!$node->p_data['info']['i_web_hide'] && !empty($node->p_data['info']['i_web'])) {
                        $goto_link_title = (isset($node->p_data['info']['i_web_display']) && $node->p_data['info']['i_web_display']) ? $node->p_data['info']['i_web_display'] : str_replace(array('http://', 'https://'), '', $node->p_data['info']['i_web']);
                        echo gv_misc_getTrackingUrl($goto_link_title, NULL, NULL, NULL, 'provider-box-provider-details-info-link', array('key' => 'rel', 'value' => 'v:url nofollow'));
                      }
                      ?>
                  </div>
                  <div class="provider-box-provider-details-info provider-box-provider-details-info_service">Service Location: <?php echo $node->p_data['info']['i_availability']; ?></div>
                  <ul class="provider-box-provider-details-stats">
                    <li class="provider-box-provider-details-stats-item">
                      <span class="provider-box-provider-details-stats-item-number"><?php echo $node->p_data['info']['i_founded']; ?></span>
                      <span class="provider-box-provider-details-stats-item-desc">Year Founded</span>
                    </li>
                    <?php if ($node->gv_voters) { ?>
                          <li class="provider-box-provider-details-stats-item">
                            <span class="provider-box-provider-details-stats-item-number"><?php echo $node->gv_recommend; ?>%</span>
                            <span class="provider-box-provider-details-stats-item-desc">Recommend</span>
                          </li>
                          <li class="provider-box-provider-details-stats-item">
                            <span class="provider-box-provider-details-stats-item-number"><?php echo $node->gv_voters; ?></span>
                            <span class="provider-box-provider-details-stats-item-desc">User Reviews</span>
                          </li>
                    <?php } ?>
                  </ul>

              
                  <?php echo 
                    (!empty($node->p_data['disable_buttons']['demo']) ? '' : '<div class="provider-box-provider-details-button demo-trigger trigger"><span class="provider-box-provider-details-button-text">Request a Demo</span></div>'), 
                    (!empty($node->p_data['disable_buttons']['demo']) ? '' : '<div class="provider-box-provider-details-button quote-trigger trigger"><span class="provider-box-provider-details-button-text">Request a Quote</span></div>'), 
                    // l('Request a Demo', '#', array('html' => TRUE, 'attributes' => array('id' => 'request-demo', 'rel' => 'nofollow'))), 
                    // (!empty($node->p_data['disable_buttons']['quote']) ? '' : l('<span class="provider-box-provider-details-button-text">Request a Quote</span>', 'node/add/review', array('html' => TRUE, 'attributes' => array('class' => 'provider-box-provider-details-button', 'rel' => 'nofollow'), 'query' => array('id' => $node->nid)))) , 
                   
                    l('<span class="provider-box-provider-details-button-text">Write Review</span>', 'node/add/review', array('html' => TRUE, 'attributes' => array('class' => 'provider-box-provider-details-button write-review', 'rel' => 'nofollow'), 'query' => array('id' => $node->nid)));   
            
                      // Colorbox for popup window.
                      // drupal_add_js('sites/all/libraries/jquery.plugins/colorbox/colorbox/jquery.colorbox.js');
                      // drupal_add_css('sites/all/libraries/jquery.plugins/colorbox/example1/colorbox.css', array('preprocess' => FALSE)); // array('group' => CSS_THEME, 'preprocess' => FALSE)

                      // Exit intent Ad block main js.
                      // $path_to_custom_js = drupal_get_path('module', 'gv_pages') . '/js/';
                      // drupal_add_js($path_to_custom_js . 'gv_provider_popup_requestLinks.js');
                      
                  ?>
          
                          <!-- Popup windows for Request links above -->
                          <div style="display: none;" class="provider-quote-container">
                            <div class="provider-popup provider-quote"> 
                              <?php echo $logo_block2, '<div class="provider-popup-header"><div class="provider-popup-header-wrap"><div class="provider-popup-header-title">Request ', $provider_name, ' Quote</div><div class="provider-popup-header-desc">In order to prepare a quote, we need some information about you.</div></div></div>'; ?>
                              <?php echo gv_blocks_get_requestQuote_block_v8_popup_provider(); ?>
                              
                            </div>
                          </div>
                          
                          <div style="display: none;" class="provider-demo-container">
                            <div class="provider-popup provider-demo"> 
                              <?php echo $logo_block2, '<div class="provider-popup-header"><div class="provider-popup-header-wrap"><div class="provider-popup-header-title">Request ', $provider_name, ' Demo</div><div class="provider-popup-header-desc">In order to schedule your demo, we need some information from you.</div></div></div>'; ?>
                              <?php echo gv_blocks_get_requestDemo_block_v1_popup_provider(); ?>
                              
                            </div>
                          </div>

              </div> <!-- End of <div typeof="Organization"> -->


            </div> <!-- End of <div class="provider-box-provider-details" rel="v:itemreviewed"> -->

            <?php if (!empty($content['gv_ratings'])): ?>
                <div class="provider-box-provider-review"><?php echo render($content['gv_ratings']); ?>
                  <div class="provider-box-provider-review-score">
                        <div class="provider-box-provider-review-score-caption">Overall</div>
                        <div class="provider-box-provider-review-score-number" rel="v:rating">
                          <span typeof="v:Rating">
                            <span property="v:worst" content="0"></span>
                            <span property="v:value"> <?php echo $node->gv_rating_overall; ?> </span>
                            <span property="v:best" content="5"></span>
                          </span>
                        </div>
                        <div class="provider-box-provider-review-score-fivestar"> <?php echo theme('gv_misc_fivestar_provider', array('rating' => $node->gv_rating_overall * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css'))); ?>
                        </div>

                  </div>
                </div>
            <?php endif; // end of if (!empty($content['gv_ratings'])): ?>

            
        </div> <!-- End of <div class="provider-box-provider-sticky"> -->


            
                    
        <div class="provider-box-data">
              
              <ul class="provider-box-data-tabs">
                <?php if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): ?>
                  <li id="tab-0" class="provider-box-data-tabs-item active">
                    <?php 
                      echo '<span class="provider-box-data-tabs-item-mobile_hide">Customer </span>Reviews';
                    ?>
                  </li>

                <li id="tab-1" class="provider-box-data-tabs-item">
                <?php else: ?>
                <li id="tab-1" class="provider-box-data-tabs-item active">
                <?php endif; ?>
                  <?php 
                    echo '<span class="provider-box-data-tabs-item-mobile_hide">Provider </span>Overview';
                  ?>
                </li>
                
                <?php 
                
                        
                $provider_options_bu = isset($node->p_data['provider_options_bu']) ? $node->p_data['provider_options_bu'] : (isset($node->p_data['provider_options']) ? $node->p_data['provider_options'] : NULL);
                
                if (!empty($provider_options_bu) && !empty($provider_options_bu['enabled'])) {
                  echo '<li id="tab-2" class="provider-box-data-tabs-item"><span class="provider-box-data-tabs-item-mobile_hide">Available </span>Services</li>';
                }
                
                $provider_options_re = isset($node->p_data['provider_options_re']) ? $node->p_data['provider_options_re'] : NULL;
                
                if (!empty($provider_options_re) && !empty($provider_options_re['enabled'])) {
                  echo '<li id="tab-3" class="provider-box-data-tabs-item">Available Services</li>';
                }
                
                ?>
              </ul>

              <div class="provider-box-data-content">
                              
              
              
              <?php
                  $first_section_is_set = FALSE;
                  if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): 
                    $first_section_is_set = TRUE;
              ?>
                <div id="tab-0-c" class="provider-box-data-content-section active">
                    <div class="reviews-title">Customer Reviews</div>
                    <?php echo render($content['reviews_entity_view_1']); ?>
                    <div class="reviews-load">Load More</div>
                </div>

              <div id="tab-1-c" class="provider-box-data-content-section">
              <?php else: ?>
              <div id="tab-1-c" class="provider-box-data-content-section active">
              <?php endif; ?>
                <div class="overview-title">Provider Overview</div>
                <?php echo render($content['body']); ?>
              </div>
              
              
              
              <?php 
              
                if (!empty($provider_options_bu) && !empty($provider_options_bu['enabled'])) {
                
                  echo '<div id="tab-2-c" class="provider-box-data-content-section"><div class="services-title">Available Services</div>';

                    $provider_options_bu_out = '';

                    unset($provider_options_bu['enabled']);

                    foreach ($provider_options_bu as $options_set => $options_data) {

                      // $provider_options_bu_out .= '<tr><td colspan="2"></td></tr><tr class="caption ' . $options_set . '"><td colspan="2">' . str_replace(array('(', ')'), array('<span>(', ')</span>'), $options_set) . '</td></tr>';
                      $title = $options_set;

                      if ( strpos($title, '(') ) {
                        $title = substr($title, 0, 18);
                      }

                      $titleClass = strtolower(str_replace(' ', '-', $title));
                      $titleClass = str_replace('&', 'n', $titleClass);


                      $provider_options_bu_out .= '<table class="services-table ' . $titleClass . '"><thead class="servies-table-thead">
                        <tr class="services-table-thead-row">
                          <td class="services-table-thead-row-text ' . $titleClass . '" colspan="2">' . $title . '</td>
                        </tr>
                      </thead><tbody class="services-table-tbody">';

                      $odd = TRUE;

                      foreach ($options_data as $option_title => $option_value) {
                        if (strpos($option_title, '-text-')) {
                          continue;
                        }
                        $option_title = str_replace('Num ', '# ', $option_title);
                        $option_value = (is_int($option_value) ? ($option_value ? 'Yes' : 'No') : ($option_value ? $option_value : 'N/A'));
                        if ($odd) {
                          $odd = FALSE;
                          $row_class = 'services-table-tbody-row even';
                        }
                        else {
                          $odd = TRUE;
                          $row_class = 'services-table-tbody-row odd';
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
                        $provider_options_bu_out .= '<tr class="' . $row_class . '"><td class="services-table-tbody-row-title">' . $option_title . '</td><td class="services-table-tbody-row-value' . ($option_value == 'Yes' ? ' yes' : ($option_value == 'No' ? ' no' : '')) . '"><div class="services-table-tbody-row-value-icon">' . (($option_value == 'Yes') ? '' : (($option_value == 'No') ? '' : $option_value)) . '</div><span class="services-table-tbody-row-value-additional">' . $additional_text . '</span></td></tr>';
                      }
                      $provider_options_bu_out.= '</tbody></table>';
                    }
                    // echo '<table class="specs"><tbody>' . $provider_options_bu_out . '</tbody></table>';
                    echo $provider_options_bu_out;

                  echo '</div>';
                }
                
                
                
                
                if ($user->uid && !empty($provider_options_re) && !empty($provider_options_re['enabled'])) {
                
                  echo '<div id="tab-3-c" class="provider-box-data-content-section">';

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
                </div>
             
              
            </div> <?php // End of <div class="data tabs"> ?>

            
            
            
        <?php echo render($content['metatags']);?>
        
        
            
            
            
            
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
         
            
      
        
  </div> <!-- main-content -->
  
  
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
