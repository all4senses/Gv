<?php 

 $all_data_quick = gv_misc_getProvidersDataQuick();
 
 if($view_mode == 'home_teaser') {
  //dpm($content);
  //dpm($node);
  
  
  $provider_nid = $node->field_ref_provider['und'][0]['target_id'];
  
 


  echo '<div class="header">';
  
      // Use a logo from providers sprite for monimizing loaded images amount.
      $sprite_name = isset($node->sprite_name) ? $node->sprite_name : 'home_top_providers'; 
      
      //dpm($_GET);
      //dpm($_SERVER);
      
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
      
      //$out = gv_misc_getTrackingUrl($image, NULL, $data['data']->nid);
      
      
      //echo '<a class="logo" href="' . url('node/' . $provider_nid) . '">' . $image . '</a>';
      //echo '<a class="logo" href="' . $logo_link . '">' . $image . '</a>';
      

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
  //dpm($content);
  //dpm($node);
  
  
  $provider_nid = $node->field_ref_provider['und'][0]['target_id'];
  
 


  echo '<div class="header">';
  
      // Use a logo from providers sprite for monimizing loaded images amount.
      $sprite_name = isset($node->sprite_name) ? $node->sprite_name : 'home_top_providers'; 
      
      //dpm($_GET);
      //dpm($_SERVER);
      
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
      
      //$out = gv_misc_getTrackingUrl($image, NULL, $data['data']->nid);
      
      
      //echo '<a class="logo" href="' . url('node/' . $provider_nid) . '">' . $image . '</a>';
      //echo '<a class="logo" href="' . $logo_link . '">' . $image . '</a>';
      

      
  echo '</div>';
  
  
  $body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : $node->body[0]['value'];
  $teaser = strip_tags($body);
  
  $characters_num = 160;
  
  // Replaces & with &amp;
  $teaser = htmlspecialchars(trim(drupal_substr($teaser, 0, $characters_num)));
  
  
  $last_pos = strrpos($teaser, ' ');
  
  //$teaser = substr_replace ($teaser, '... ' . l(t('Read More'), 'node/' . $nid, array('attributes' => array('class' => array('more')))), $last_pos);
  $teaser = substr_replace ($teaser, '... ' . l(t('Read More'), 'node/' . $provider_nid, array('attributes' => array('class' => array('more'), 'rel' => 'nofollow'))), $last_pos);
  
  
  $stars = theme('gv_misc_fivestar_static', array('rating' => $node->field_r_rating_overall['und'][0]['value'] * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css')));
  //$stars = '<div class="rating">' . $stars . '<span class="count">' . $node->field_r_rating_overall['und'][0]['value'] . ' out of 5</span></div>';
  $stars = '<div class="rating">' . $stars . '</div>';

      
  echo '<div class="right">', 
          '<a href="', url('node/' . $provider_nid), '"><h3>', $node->title, '</h3></a>', 
          $stars, 
          '<div class="submitted"><span class="author">', $node->field_r_fname['und'][0]['value'], ' ', $node->field_r_lname['und'][0]['value'][0], '.</span> says:</div>',
          '<div class="review">', $teaser, '</div>',
          //'<div class="submitted"><span class="author">', $node->field_r_fname['und'][0]['value'], ' ', $node->field_r_lname['und'][0]['value'][0], '.</span> / ', date('F d, Y', $node->created), '</div>',
       '</div>';
  
  return;
}
elseif($view_mode == 'teaser_onPrefaceBottomLatest') {
  //dpm($content);
  //dpm($node);
  
  
  $provider_nid = $node->field_ref_provider['und'][0]['target_id'];
  
 


  //echo '<div class="header">';
  
      /*
      // Use a logo from providers sprite for monimizing loaded images amount.
      $sprite_name = isset($node->sprite_name) ? $node->sprite_name : 'home_top_providers'; 
      
      //dpm($_GET);
      //dpm($_SERVER);
      
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
      */
      
      //$out = gv_misc_getTrackingUrl($image, NULL, $data['data']->nid);
      
      
      //echo '<a class="logo" href="' . url('node/' . $provider_nid) . '">' . $image . '</a>';
      //echo '<a class="logo" href="' . $logo_link . '">' . $image . '</a>';
      

      
  //echo '</div>';
  
  
  $body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : $node->body[0]['value'];
  $teaser = strip_tags($body);
  
  $characters_num = 145;
  
  // Replaces & with &amp;
  $teaser = htmlspecialchars(trim(drupal_substr($teaser, 0, $characters_num)));
  
  
  $last_pos = strrpos($teaser, ' ');
  
  //$teaser = substr_replace ($teaser, '... ' . l(t('Read More'), 'node/' . $nid, array('attributes' => array('class' => array('more')))), $last_pos);
  
  //$teaser = substr_replace ($teaser, '... ' . l(t('Read More'), 'node/' . $provider_nid, array('attributes' => array('class' => array('more')))), $last_pos);
  $teaser = substr_replace ($teaser, '...', $last_pos);
  
  //dpm($all_data_quick[$provider_nid]['name']);
  
  $stars = theme('gv_misc_fivestar_static', array('rating' => $node->field_r_rating_overall['und'][0]['value'] * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css')));
      
  echo '<h4><a href="' . url('node/' . $provider_nid) . '">'. $all_data_quick[$provider_nid]['name'] . ' - ' . $node->title . '</a></h4>
    <div class="rating">' . $stars . '<span class="count">' . $node->field_r_rating_overall['und'][0]['value'] . ' out of 5</span></div>
    <div class="submitted"><span class="author">' . $node->field_r_fname['und'][0]['value'] . ' ' . strtoupper($node->field_r_lname['und'][0]['value'][0]) . '.</span> - ' . date('F d\t\h, Y', $node->created) . '</div>
    <div class="teaser">' . $teaser . '</div>';
    
  return;
}
?>

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
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

    
    
  <div class="main-content" <?php echo ($full_title ? '' : 'xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review"'); /*echo ($page ? ' xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review"' : '');*/  ?>>
    
      <?php
        $reviewer = (isset($node->field_r_fname[0]['value']) ? $node->field_r_fname[0]['value'] : $node->field_r_fname['und'][0]['value'] );
      ?>
      <div class="reviewer">
        <div class="r-avatar"><img src="/sites/all/themes/gv_blue/css/images/avatar.jpg"></div>
        <div class="name"><?php echo $reviewer; ?></div>
      </div>
    
      <div class="review-wrapper">
        
            <div class="pointer"></div>
        
            <div class="left-wrapper">
              
              <header>
                
                <div class="title-block">
                
                          <?php if ($page): /* <span class="pname" property="v:itemreviewed"><?php echo $node->field_r_provider_name['und'][0]['safe_value'] ?></span><span class="pname delim">:</span><h1 property="v:summary" */?>
                            <h1 <?php 
                                    //echo 'property="dc:title v:summary"';
                                    echo $full_title ? '' : 'property="v:summary"';
                                    if (!$node->status) {echo ' class="not-published"';}
                                ?>
                          <?php else: ?>
                                <h3 <?php 
                                        echo 'class="rcaption"';
                                     ?>
                              <?php /*endif;*/ ?>
                          <?php endif; ?>

                          <?php /*print $title_attributes;*/ ?>><?php 

                                  echo ( ($full_title || $page) ? $provider_name . ' - ' : '') . $title; 
                          if ($page) {
                            echo '</h1>';
                          }
                          else {
                            echo '</h3>';
                          }
                          ?>

                      <?php print render($title_suffix); ?>

                        <div class="submitted">
                          <?php 
                            echo '<span property="v:reviewer">', $reviewer, '</span>, <span property="v:dtreviewed" content="', date('Y-m-d', $node->created), '">', date('F d, Y', $node->created), '</span>';
                          ?>
                        </div>
              </div>
                        
              <div class="links">
               <?php 
                    if($page || $full_title) {
                      echo ( empty($node->field_ref_provider['und'][0]['target_id']) ? '' : '<a href="' . url('node/' . $node->field_ref_provider['und'][0]['target_id']) . '"><span class="review-provider">' . $provider_name . '</span> Reviews</a>');
                    }
                    echo ( !$provider_url ? '' : gv_misc_getTrackingUrl('<span class="review-provider">Visit <span property="v:itemreviewed">' . $provider_name . '</span></span>', NULL, $node->field_ref_provider['und'][0]['target_id'], NULL, NULL, NULL, $provider_data_quick)) . l('Write a Review', 'node/add/review', array('attributes' => array('rel' => 'nofollow'), 'query' => array('id' => $node->field_ref_provider['und'][0]['target_id']))); 
               ?>
             </div>           

                        
           </header>

   
    
            <?php 
    
                if (isset($node->field_r_fname[0]['value'])) {
                  $reviewer = $node->field_r_fname[0]['value'] . ' ' . strtoupper($node->field_r_lname[0]['value'][0]) . '.';
                }
                else {
                  $reviewer = $node->field_r_fname['und'][0]['value'] . ' ' . strtoupper($node->field_r_lname['und'][0]['value'][0]) . '.';
                }
    
            ?>
    
    

          
          <div class="review-block">
            
            <?php 
              echo '<div property="v:description">' . render($content['body']) . '</div>'; 
            ?>
            
            <?php if ($content['r_data']['pros'] || $content['r_data']['cons']): ?>
              <div class="pros-cons">
                <?php

                  $cons_add_class = ($content['r_data']['pros'] && $content['r_data']['cons']) ? ' border' : '';
                  
                  if ($content['r_data']['pros']) {
                    echo '<div class="pros frame' . $cons_add_class . '"><div class="text"><span class="caption">Pros:</span>' . $content['r_data']['pros'] . '</div></div>';
                  }

                  if ($content['r_data']['cons']) {
                    echo '<div class="' . (!$content['r_data']['pros'] ? 'pros' : 'cons') . ' frame"><div class="text"><span class="caption">Cons:</span>' . $content['r_data']['cons'] . '</div></div>';
                  }
                ?>
              </div>
            <?php endif; ?>
            
          </div>
          

        
        </div> <!-- End of  <div class="left-wrapper"> -->
          
          
          <div class="gv_votes">
            
            <?php echo render($content['gv_ratings']); ?>
            <div class="caption">
                <?php 
              
                  $r = empty($node->field_r_rating_overall['und'][0]['value']) ? $node->field_r_rating_overall[0]['value'] : $node->field_r_rating_overall['und'][0]['value'];
                  echo '<span>Overall Score:</span>
                        <span rel="v:rating" style="margin-right: 0;">',
                          '<span typeof="v:Rating">',
                            '<span property="v:value" style="font-weight: bold;">', $r, '</span> Out of ', 
                            '<span property="v:best" content="5" style="float: right; font-weight: bold;">5</span>',
                            '<span property="v:worst" content="0"></span>',
                          '</span>',
                        '</span>'; 
                ?>
            </div>
            
          </div> <!-- End of <div class="gv_votes"> -->
          
          
         </div> <!-- End of review-wrapper -->
                
           
              
          <?php
            // Hide already shown anr render the rest.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
            
            echo render($content['metatags']);
          ?>
          

  </div> <!-- main-content -->
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
