
<?php
if ( current_path() != 'node/804' ) {
      drupal_add_js('/sites/all/themes/gv_sky/js/review.js');
}

if($view_mode == 'home_teaser_rotated') {
    
    
    if (!empty($node->extra_data['home_teaser_rotated_image_beautify'])) {
      echo $node->extra_data['home_teaser_rotated_image_beautify'] . /*$extra_data['home_teaser_image_beautify'] .*/ '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">' . date('F j\t\h \<\s\p\a\n\>Y\<\/\s\p\a\n\>', $node->created) . '</div>';
    }

    return;
  }

?>

<?php if (!$page): ?>
  <article class="review-posts-item"<?php print $attributes; ?>>
<?php else: ?>

<?php endif; ?>
           
      <?php if ($page): ?>
        <div xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review" itemprop="review" itemscope itemtype="http://schema.org/Review">
          <div class="hero-review">
            <div class="hero-review-wrap">
            <div class="hero-review-content">
      
  
              <?php 
              
                $url = 'http://getvoip.com'. url('node/' . $node->nid);

                if (isset($node->field_p_image['und'][0]['uri'])) {
                  echo '<a class="hero-review-content-img" title="' . $node->field_p_image['und'][0]['title'] . '" href="/' . gv_misc_getPathFromStreamUri($node->field_p_image['und'][0]['uri']) . '">' . theme('image_style', array( 'path' =>  $node->field_p_image['und'][0]['uri'], 'style_name' => 'phone_page_main', 'alt' => $node->field_p_image['und'][0]['alt'], 'title' => $node->field_p_image['und'][0]['title'], 'attributes' => array('rel' => 'v:photo', 'class' => 'hero-review-content-img-actual'))) . '</a>'; 
                }
                ?> 
                <div class="hero-review-content-wrap">
                <?php
                if ($page) {
                  echo '<h1 class="hero-review-content-title" ',  $title_attributes, /*'property="dc:title v:summary"',*/ /*'property="v:summary"',*/ (!$node->status ? ' class="not-published"' : ''), ' >', $node->field_p_name['und'][0]['value'], '</h1>',
                        '<span property="v:itemreviewed" content="' . $node->field_p_name['und'][0]['value'] . '"></span>';
                }
                elseif ($view_mode == 'teaser') {
                  echo '<h2 ',  $title_attributes, (!$node->status ? ' class="not-published"' : ''), ' ><a href="' . $url .'">' . $title . '</a></h2>';
                }
                elseif ($view_mode == 'side_block_teaser') {
                  echo '<h4><a href="' . $url .'">' . $title . '</a></h4>';
                }
                
      endif;
              
                if ($page || $view_mode == 'teaser'  || $view_mode == 'side_block_teaser') {
                  
                    if ($page) {
                      $delimiter = '<span class="delim">|</span>';
                      //$created_str = date('F d, Y \a\t g:ia', $node->created);
                      $created_str = date('F d, Y', $node->created);
                    }
                    else {
                      $created_str = date('F d, Y', $node->created);
                      switch ($view_mode) {
                        case 'teaser':
                          $delimiter = '<span class="delim">/</span>';
                          break;
                        
                        case 'side_block_teaser':
                          $delimiter = NULL;
                          break;
                      }
                    }
                   
                    $created_rdf = preg_replace('|(.*)content=\"(.*)\"\s(.*)|', '$2', $date); //date('Y-m-d\TH:i:s', $node->created); 
                    
                    if ($view_mode != 'side_block_teaser') {
                      $authorExtendedData = gv_misc_loadUserExtendedData($node->uid);
                      $author_name = $authorExtendedData->realname;
                      $author_gplus_profile = $authorExtendedData->field_u_gplus_profile_value;

                      $author_url = url('user/' . $node->uid);
                      $author_title = t('!author\'s profile', array('!author' => $author_name));

                      global $language;
                      $gplus_profile = ($author_gplus_profile) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $author_gplus_profile . '?rel=author">(G+)</a>' : '';
                    }
                    
                    if (!empty($extra_data['guest_author'])) {
                      
                      if ($view_mode == 'side_block_teaser') {
                        $submitted = '<div class="hero-review-content-meta" property="dc:date dc:created v:dtreviewed" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                      $created_str .
                                  '</div>';
                      }
                      else {
                        $submitted = '<div class="hero-review-content-meta" property="dc:date dc:created v:dtreviewed" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">'
                                      . '<span property="v:reviewer" class="guest-author">' . $extra_data['guest_author'] . '</span>'. 
                                      $created_str .
                                  '</div>';
                      }
                      
                    }
                    elseif ($node->uid) {

                      if ($view_mode == 'side_block_teaser') {
                        $submitted = '<div class="hero-review-content-meta" property="dc:date dc:created v:dtreviewed" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                      $created_str .
                                  '</div>';
                      }
                      else {
                        $submitted = '<div class="hero-review-content-meta" property="dc:date dc:created v:dtreviewed" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">'
                                      . (!$page ? $author_name : '<a href="' . $author_url . '" title="' . $author_title . '" class="hero-review-content-meta-author" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name v:reviewer">' . $author_name . '</a>') 
                                      . '<div class="hero-review-content-meta-date">' . $created_str . '</div>' .
                                  '</div>';
                      }

                    }
                    else {
                      $submitted = '<div class="hero-review-content-meta" property="dc:date dc:created v:dtreviewed" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                      '<span class="hero-review-content-meta-author" property="v:reviewer">Guest' . $created_str .
                                   '</div>';

                    }

                    echo $submitted;
                }
              
              ?>
        
        

        

               <?php $editor_overall_rating = number_format($node->extra_data['editor_rating_overall'] * 0.05, 1); ?>
              
               <?php if ($page): 
                  // Top share post links.
                  // echo gv_blocks_getSidebarShareStaticBlock($node, '<span>Share:</span>', 'top bottom');
                ?>
                <div class="hero-review-content-summary">
                  <?php 
                      // echo substr(render($content['body']), 0, 251) . '...';
                  ?>
                </div>

                <div class="hero-review-content-more">Read More</div>
                </div> <!-- <div class="hero-review-content-wrap"> -->
            </div> <!-- <div class="hero-review-content"> -->

            <div class="hero-review-rating">
              <div class="hero-review-rating-score">
                        <?php echo '
                            <span class="hero-review-rating-number" rel="v:rating">
                              <span typeof="v:Rating">
                                <span property="v:worst" content="0"></span>
                                <span property="v:value">' . $editor_overall_rating . '</span>
                                <span property="v:best" content="5"></span>
                              </span>
                            </span>' . theme('gv_misc_fivestar_dk', array('rating' => $editor_overall_rating * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css'), 'class' => 'hero-review-rating')); 
                        ?>
              </div>
              <?php echo render($node->editor->content['gv_ratings']); ?>
            </div>
            </div> <!-- <div class="hero-review-wrap"></div> -->
          </div> <!-- <div class="hero-review"></div> -->
                
              <div class="phone-summary">
                <div class="phone-summary-fact phone-summary-fact_good">
                  <div class="phone-summary-fact-title phone-summary-fact-title_good">The Good</div>
                    <?php echo '<div class="phone-summary-fact-content" property="v:summary">', $node->extra_data['pros_and_cons']['The good'], '</div>'; ?>
                </div>
                <div class="phone-summary-fact phone-summary-fact_bad">
                  <div class="phone-summary-fact-title phone-summary-fact-title_bad">The Bad</div><div class="phone-summary-fact-content"><?php echo $node->extra_data['pros_and_cons']['The bad']; ?></div>
                </div>
                <div class="phone-summary-fact phone-summary-fact_bottom-line">
                  <div class="phone-summary-fact-title phone-summary-fact-title_bottom-line">The Bottom Line</div><div class="phone-summary-fact-content"><?php echo $node->extra_data['pros_and_cons']['The bottom line']; ?></div>
                </div>
                
              </div>
             
          
 
              
             </div>
              
                      
              <div class="phone-box">
                    <ul class="phone-box-tabs">
                      <li id="tab-0" class="phone-box-tabs-item active">Editor's Review</li>
                      <li id="tab-1" class="phone-box-tabs-item"><span class="phone-box-tabs-item-mobile_hide">Technical </span>Specs</li>
                      <?php if ($node->extra_data['downloads']): ?><li id="tab-2" class="phone-box-tabs-item">Downloads</li><?php endif; ?>
                      <?php if ($node->extra_data['in_the_box']): ?><li id="tab-3" class="phone-box-tabs-item">In the Box</li><?php endif; ?>
                      <li id="tab-4" class="phone-box-tabs-item"><span class="phone-box-tabs-item-mobile_hide">User </span>Reviews</li>
                    </ul>
                
                    <div class="phone-box-content">
                      <div id="tab-0-c" class="phone-box-content-section phone-box-content-section-review active">
                        <div class="phone-box-content-section-title review-title">Editor's Review</div>
                        

                          
                                                                                                                                              
                        <?php 
                          echo '<div class="phone-box-content-section-review-intro" property="v:description">', @$node->extra_data['body_summary'], '</div>';
                          
                          
                            {
                            if (!empty($node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Pros']['value']) && !empty($node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Cons']['value'])) {
                              echo '<div class="phone-box-content-section-review-summary">',
                                      '<div class="phone-box-content-section-review-summary-pros">',
                                        '<div class="phone-box-content-section-review-summary-title phone-box-content-section-review-summary-pros-title">Top 5 Pros</div><div class="phone-box-content-section-review-summary-list">', $node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Pros']['value'], '</div></div>',
                                      '<div class="phone-box-content-section-review-summary-cons">',
                                        '<div class="phone-box-content-section-review-summary-title phone-box-content-section-review-summary-cons-title">Top 5 Cons</div><div class="phone-box-content-section-review-summary-list">', $node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Cons']['value'], '</div></div>',
                                    '</div>';
                            }
                          }
                          echo render($content['body']); 

                        ?>
                        
                      </div>
                      <div id="tab-1-c" class="phone-box-content-section phone-box-content-section-specs">
                        <div class="phone-box-content-section-title specs-title">Technical Specs</div>
                        <?php echo $node->specs; ?>
                      </div>
                      <?php if ($node->extra_data['downloads']): ?>
                        <div id="tab-2-c" class="phone-box-content-section phone-box-content-section-downloads">
                          <div class="phone-box-content-section-title downloads-title">Downlaods</div>
                          <?php echo $node->extra_data['downloads']; ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($node->extra_data['in_the_box']): ?>
                        <div id="tab-3-c" class="phone-box-content-section phone-box-content-section-box">
                          <div class="phone-box-content-section-title box-title">In the Box</div>
                          <?php echo $node->extra_data['in_the_box']; ?>
                        </div>
                      <?php endif; ?>
                      <div id="tab-4-c" class="phone-box-content-section phone-box-content-section-user-reviews">
                        <div class="phone-box-content-section-title user-reviews-title">User Reviews</div>
                        <?php if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                              <div class="gv_votes users_overall"><?php echo '<div class="caption">' . t('Overall Consumer Ratings') . '</div>' . render($content['gv_ratings']); ?></div>
                              <div class="overall"> 
                                <div class="text">
                                  <?php 
                                    echo '<div class="voters"><div class="title">' . t('Number of Reviews') . ':</div><div class="count">' . $node->gv_voters . '</div></div>';
                                  ?>
                                  <?php echo '<div class="recommend"><div class="title">' . t('Would recommend') . ': </div><div class="data">' . $node->gv_recommend . '% ' . t('of all voters') . '</div></div>'; ?>
                                  <div class="overall title"><?php $node->field_p_name['und'][0]['value'] . ' ' . t('Overall Rated:'); ?></div>
                                </div>
                                <div class="star-big">
                                  <?php 
                                    echo '<div class="count" content="' . $node->gv_rating_overall . '" >' . $node->gv_rating_overall . '</div>' . '<div class="descr">' . t('Out of 5 stars') . '</div>';
                                  ?>
                                </div>
                              </div>

                        <?php endif; // end of if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                
                        <?php echo $node->addPhoneReviewForm; ?>
                          
                        
                        <?php if ($node->userReviews): ?> 

                          <div class="reviews">
                            <div class="header">
                                <h2 class="button"><?php echo $node->field_p_name['und'][0]['value'], ' ', t('User Reviews'); ?></h2>
                            </div>
                            <?php echo $node->userReviews; ?>
                          </div>

                        <?php endif; ?>

                      </div> <!-- <div id="tab-4-c"> -->
                    </div>
                
              </div> <?php // End of <div class="data tabs"> ?>
              
          
              <?php echo render($content['metatags']); ?>
          
              
              
          <?php elseif ($view_mode == 'teaser'):  ?> <!-- Else of if ($page): -->
             
              <?php
                $teaser = strip_tags($node->body['und'][0]['value']);
                $teaser_chars = 450;
                $teaser = trim(drupal_substr($teaser, 0, $teaser_chars));// . '...';
                $last_pos = strrpos($teaser, ' ');
                $teaser = substr_replace ($teaser, '... ' . l('Read More', 'node/' . $node->nid, array('attributes' => array('class' => array('more'), 'rel' => 'nofollow'))), $last_pos);
                
                gv_misc_regenerateStyledAndBeautifyImageHtml($node->field_p_image['und'][0]['uri'], 'article_thumbnail_h', $main_image_html, $main_image_html_beautify, $node->title);
                echo $main_image_html_beautify;
              ?>
                <div class="teaser-content">
                     <?php echo $teaser;?>
                </div>
          
          <?php elseif ($view_mode == 'side_block_teaser'):  ?> <!-- Else of if ($page): -->
             
              <?php
                $teaser = strip_tags($node->body['und'][0]['value']);
                $teaser_chars = 145;
                $teaser = trim(drupal_substr($teaser, 0, $teaser_chars));// . '...';
                $last_pos = strrpos($teaser, ' ');
                $teaser = substr_replace ($teaser, '... ', $last_pos);
              ?>
                <div class="content teaser">
                     <?php echo $teaser;?>
                </div>
                      
          <?php elseif ($view_mode == 'teaser_phonePicAndRating'): ?> <!-- Second Elseif of if ($page): -->
          
          
                <?php
                  if (isset($node->field_p_image['und'][0]['uri'])) {
                    echo '<a class="review-posts-item-img" href="' . $node_url . '">' . theme('image_style', array( 'path' =>  $node->field_p_image['und'][0]['uri'], 'style_name' => 'phone_teaser_main', 'alt' => $node->field_p_image['und'][0]['alt'], 'title' => $node->field_p_image['und'][0]['title'], 'attributes' => array('rel' => 'v:photo', 'class' => 'review-posts-item-img-actual'))) . '</a>'; 
                  }
                ?>
              <h3 class="review-posts-item-title" property="dc:title v:summary">
                  <a class="review-posts-item-title-link" href="<?php print $node_url; ?>">
                    <?php print $node->field_p_name['und'][0]['value']; ?>
                  </a>
              </h3>
              <?php
                  $stars = theme('gv_misc_fivestar_dk', array('rating' => $node->extra_data['editor_rating_overall'], 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css'), 'class' => 'review-posts-item-rating'));
                  echo '<div class="review-posts-item-rating">' . $stars . ' <span class="review-posts-item-rating-number">' . $editor_overall_rating . '</span></div>';
              ?>
              <div class="review-posts-item-content">
                <?php echo dk_shorten_body($node->extra_data['pros_and_cons']['The bottom line']); ?>
              </div>
            
          <?php endif; ?>  <!-- end of else of if ($page): -->
           
        
      <?php // if ($page) { echo gv_blocks_getAboutTheAuthor($node->uid); } ?>
        
  </div> <!-- main-content -->
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
