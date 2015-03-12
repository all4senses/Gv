<?php 

 $all_data_quick = gv_misc_getProvidersDataQuick();
 
 if($view_mode == 'home_teaser') {
  
  
  $provider_nid = $node->field_ref_provider['und'][0]['target_id'];
  
 


  echo '<div class="header">';
  
      // Use a logo from providers sprite for monimizing loaded images amount.
      $sprite_name = isset($node->sprite_name) ? $node->sprite_name : 'home_top_providers'; 
      
      
      // Only for /hosted-pbx don't take thumbs from the current sprite, but generate it with different sizes (bigger than on that page sprite).
      if ($_SERVER['REQUEST_URI'] == '/hosted-pbx' || !$image = gv_misc_getProviderLogoFromSprite($provider_nid, $sprite_name, $all_data_quick)) {
        $image_style_name = 'logo_provider_chart_main'; //'thumbnail';
        $image = theme('gv_misc_image_style', array('style_name' => $image_style_name, 'path' => $all_data_quick[$provider_nid]['i_logo_uri'], 'alt' =>  $all_data_quick[$provider_nid]['i_logo_alt'], 'title' =>  $all_data_quick[$provider_nid]['i_logo_title'] ));
      }
      
      if (!empty($all_data_quick[$provider_nid]['i_web'])) {
        //$logo_link = $all_data_quick[$provider_nid]['i_web'];
        echo gv_misc_getTrackingUrl($image, NULL, $provider_nid, NULL, 'logo', NULL, $all_data_quick[$provider_nid]);
      }
      else {
        echo '<a class="logo" href="' . url('node/' . $provider_nid) . '">' . $image . '</a>';
      }
      

      $stars = theme('gv_misc_fivestar_static', array('rating' => $node->field_r_rating_overall['und'][0]['value'] * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css')));
      echo '<div class="rating">' . $stars . '<span class="count">' . $node->field_r_rating_overall['und'][0]['value'] . ' out of 5</span></div>';

  echo '</div>';
  
  
  $body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : $node->body[0]['value'];
  $teaser = strip_tags($body);
  
  $characters_num = 160;
  
  // Replaces & with &amp;
  $teaser = htmlspecialchars(trim(drupal_substr($teaser, 0, $characters_num)));
  
  
  $last_pos = strrpos($teaser, ' ');
  
  //$teaser = substr_replace ($teaser, '... ' . l(t('Read More'), 'node/' . $nid, array('attributes' => array('class' => array('more')))), $last_pos);
  $teaser = substr_replace ($teaser, '... ' . l(t('Read More'), 'node/' . $provider_nid, array('attributes' => array('class' => array('more'), 'rel' => 'nofollow'))), $last_pos);
  
  echo '<a href="' . url('node/' . $provider_nid) . '"><h3>'. $node->title . '</h3></a><div class="review">' . $teaser . '</div>';
  
  echo '<div class="submitted"><span class="author">- by ' . $node->field_r_fname['und'][0]['value'] . ' ' . strtoupper($node->field_r_lname['und'][0]['value'][0]) . '.</span> / ' . date('F d, Y', $node->created) . '</div>';
  
  return;
}
elseif($view_mode == 'servicePage_bottomMainReviewTeaser') {
  
  
  $provider_nid = $node->field_ref_provider['und'][0]['target_id'];
  
  
  $body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : $node->body[0]['value'];
  $teaser = strip_tags($body);
  
  $characters_num = 112;
  
  // Replaces & with &amp;
  $teaser = htmlspecialchars(trim(drupal_substr($teaser, 0, $characters_num)));
  
  
  $last_pos = strrpos($teaser, ' ');
  
  $teaser = substr_replace ($teaser, '... ', $last_pos);
  
  
  $stars = theme('gv_misc_fivestar_static_latest_reviews', array('rating' => $node->field_r_rating_overall['und'][0]['value'] * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css')));
  
  if ($_SERVER['REQUEST_URI'] == '/ppc/business-voip') {
    $reviews_attributes = array('class' => array('more'), 'rel' => 'nofollow', 'target' => '_blank');
  }
  else {
    $reviews_attributes = array('class' => array('more'), 'rel' => 'nofollow');
  }
  

  // $reviewsLink = l('More Reviews', 'node/' . $provider_nid, array('attributes' => $reviews_attributes));
  $reviewsLink = '<a href="' . url('node/' . $provider_nid) . '" class="latest-reviews-list-item-more">More Reviews</a>';
  // latest-reviews-list-item-header-cta-fivestar
 


  echo '<div class="latest-reviews-list-item-header">';
  
      // Use a logo from providers sprite for minimizing loaded images amount.
      $sprite_name = isset($node->sprite_name) ? $node->sprite_name : 'home_top_providers'; 
      
      
      // Only for /hosted-pbx don't take thumbs from the current sprite, but generate it with different sizes (bigger than on that page sprite).
      if ($_SERVER['REQUEST_URI'] == '/hosted-pbx' || !$image = gv_misc_getProviderLogoFromSprite($provider_nid, $sprite_name, $all_data_quick)) {
        $image_style_name = 'logo_provider_chart_main'; //'thumbnail';
        $image = theme('gv_misc_image_style', array('style_name' => $image_style_name, 'path' => $all_data_quick[$provider_nid]['i_logo_uri'], 'alt' =>  $all_data_quick[$provider_nid]['i_logo_alt'], 'title' =>  $all_data_quick[$provider_nid]['i_logo_title'] ));
      }
      
      if (!empty($image)) {
        //$logo_link = $all_data_quick[$provider_nid]['i_web'];
        // echo gv_misc_getTrackingUrl($image, NULL, $provider_nid, NULL, 'logo', NULL, $all_data_quick[$provider_nid]);
        echo '<a class="latest-reviews-list-item-header-logo" href="' . str_replace('reviews/', 'go/', url('node/' . $provider_nid)) . '">' . $image . '</a>';
      }
      else {
        echo '<a class="latest-reviews-list-item-header-logo-alt" href="' . str_replace('reviews/', 'go/', url('node/' . $provider_nid)) . '"><span class="latest-reviews-list-item-header-logo-alt-text">' . $all_data_quick[$provider_nid]['name'] . '</span></a>';
      }
      
      echo '<div class="latest-reviews-list-item-header-cta">' .
              $stars .
              '<div class="latest-reviews-list-item-header-cta-button">' . gv_misc_getTrackingUrl('Visit', NULL, $provider_nid, NULL, 'latest-reviews-list-item-header-cta-button-text', array('key' => 'rel', 'value' => 'nofollow'), $all_data_quick[$provider_nid]) . 
              '</div>
            </div>';
      

      
  echo '</div>';
  

      
  echo    '<h3 class="latest-reviews-list-item-title"><a href="' . url('node/' . $provider_nid) . '" class="latest-reviews-list-item-title-link"></a>' . $node->title . '</h3>',
          '<div class="latest-reviews-list-item-content">"', $teaser, '"</div>',
          '<div class="latest-reviews-list-item-author"> - ', $node->field_r_fname['und'][0]['value'], ' ', $node->field_r_lname['und'][0]['value'][0], '.</div>',
          $reviewsLink;
  
  return;
}
elseif($view_mode == 'teaser_onPrefaceBottomLatest') {
  
  
  $provider_nid = $node->field_ref_provider['und'][0]['target_id'];
  
 

  
  $body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : $node->body[0]['value'];
  $teaser = strip_tags($body);
  
  $characters_num = 145;
  
  // Replaces & with &amp;
  $teaser = htmlspecialchars(trim(drupal_substr($teaser, 0, $characters_num)));
  
  
  $last_pos = strrpos($teaser, ' ');
  
  
  $teaser = substr_replace ($teaser, '...', $last_pos);
  
  
  $stars = theme('gv_misc_fivestar_static', array('rating' => $node->field_r_rating_overall['und'][0]['value'] * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css')));
      
  echo '<h4><a href="' . url('node/' . $provider_nid) . '">'. $all_data_quick[$provider_nid]['name'] . ' - ' . $node->title . '</a></h4>
    <div class="rating">' . $stars . '<span class="count">' . $node->field_r_rating_overall['und'][0]['value'] . ' out of 5</span></div>
    <div class="submitted"><span class="author">' . $node->field_r_fname['und'][0]['value'] . ' ' . strtoupper($node->field_r_lname['und'][0]['value'][0]) . '.</span> - ' . date('F d\t\h, Y', $node->created) . '</div>
    <div class="teaser">' . $teaser . '</div>';
    
  return;
}
?>

<?php if (!$page): ?>
  <article class="reviews-list-item"<?php print $attributes; ?>>
<?php endif; ?>

<?php 

  $provider_data_quick = !empty($node->field_ref_provider['und'][0]['target_id']) ? $all_data_quick[$node->field_ref_provider['und'][0]['target_id']] : NULL;
  
  $full_title_urls = array('/reviews', '/reviews/business', '/reviews/residential');
  $full_title = (in_array(@$_SERVER['REDIRECT_URL'], $full_title_urls)) ? TRUE : FALSE;
  $provider_url = (!isset($content['provider_url']) || !$content['provider_url']) ? '' : $content['provider_url'];
  
  if ($provider_data_quick) {
    $provider_name = $provider_data_quick['name'];
  }
  else {
    $provider_name = isset($node->field_r_provider_name[0]['value']) ? $node->field_r_provider_name[0]['value'] : $node->field_r_provider_name['und'][0]['value'];
  }
                      
?>

    
    
  <div <?php echo ( ($full_title) ? '' : 'xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review"'); ?>>
    
      <?php
        $reviewer = (isset($node->field_r_fname[0]['value']) ? $node->field_r_fname[0]['value'] : $node->field_r_fname['und'][0]['value'] );
      ?>
        <div class="reviews-list-item-details">
            <h3 class="reviews-list-item-details-title"><?php echo ( ($full_title || $page) ? $provider_name . ' - ' : '') . $title; ?></h3>
            <?php print render($title_suffix); ?>
            <div class="reviews-list-item-details-meta">
              <span class="reviews-list-item-details-meta-author" property="v:reviewer"><?php echo $reviewer; ?></span>
              <span class="reviews-list-item-details-meta-date" property="v:dtreviewed" content="<?php echo date('Y-m-d', $node->created);?>"><?php echo date('F d, Y', $node->created); ?></span>
            </div>
              
            <?php 
    
                if (isset($node->field_r_fname[0]['value'])) {
                  $reviewer = $node->field_r_fname[0]['value'] . ' ' . strtoupper($node->field_r_lname[0]['value'][0]) . '.';
                }
                else {
                  $reviewer = $node->field_r_fname['und'][0]['value'] . ' ' . strtoupper($node->field_r_lname['und'][0]['value'][0]) . '.';
                }
    
            ?>
    
            <div class="reviews-list-item-details-content">
              
              <?php 
                echo '<div property="v:description">' . render($content['body']) . '</div>'; 
              ?>
              
              <?php if ($content['r_data']['pros'] || $content['r_data']['cons']): ?>
                <div class="reviews-list-item-details-content-summary">
                  <?php
                    
                    if ($content['r_data']['pros']) {
                      echo '<div class="reviews-list-item-details-content-summary-item pros"><span class="reviews-list-item-details-content-summary-item-title">Pros: </span>' . $content['r_data']['pros'] . '</div>';
                    }

                    if ($content['r_data']['cons']) {
                      echo '<div class="reviews-list-item-details-content-summary-item ' . (!$content['r_data']['pros'] ? 'pros' : 'cons') . '"><span class="reviews-list-item-details-content-summary-item-title">Cons: </span>' . $content['r_data']['cons'] . '</div>';
                    }
                  ?>
                </div>
              <?php endif; ?>
              
            </div>
      
        </div> <!-- End of <div class="reviews-list-item-details"></div> -->
          
        <div class="reviews-list-item-rating">
          
            <?php echo render($content['gv_ratings']); ?>
            <div class="reviews-list-item-rating-score">
                <?php $r = empty($node->field_r_rating_overall['und'][0]['value']) ? $node->field_r_rating_overall[0]['value'] : $node->field_r_rating_overall['und'][0]['value']; ?>

                <div class="reviews-list-item-rating-score-caption">Overall</div>
                <div class="reviews-list-item-rating-score-number" rel="v:rating">
                  <span typeof="v:Rating">
                    <span property="v:worst" content="0"></span>
                    <span property="v:value"> <?php echo $node->gv_rating_overall; ?> </span>
                    <span property="v:best" content="5"></span>
                  </span>
                </div>
                </div>
            </div>
          
        </div> 
        
                          
           
              
          <?php
            // Hide already shown anr render the rest.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
            
            echo render($content['metatags']);
          ?>
          

  <!-- </div>  -->
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
