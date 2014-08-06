<?php

if($view_mode == 'home_teaser_rotated') {
    
    
    if (!empty($node->extra_data['home_teaser_rotated_image_beautify'])) {
      echo $node->extra_data['home_teaser_rotated_image_beautify'] . /*$extra_data['home_teaser_image_beautify'] .*/ '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">' . date('F j\t\h \<\s\p\a\n\>Y\<\/\s\p\a\n\>', $node->created) . '</div>';
    }
//    else {
//      echo $extra_data['teaser_main_image_beautify'] . /*$extra_data['home_teaser_image_beautify'] .*/ '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">' . date('F j\t\h \<\s\p\a\n\>Y\<\/\s\p\a\n\>', $node->created) . '</div>';
//    }
    

    return;
  }

?>

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes . ($view_mode == 'teaser' ? ' with_thumb' : ''); ?> clearfix"<?php print $attributes; ?>>
<?php else: ?>
  
    <?php 
    
        

        /*
        if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
          $share_title = $node->metatags['title']['value'];
        }
        else {
          $share_title = $title;
        }

        echo '<div class="float share">' . gv_blocks_getSocialiteButtons($url, $share_title) . '</div>';
        */
    ?>
<?php endif; ?>
           
      <?php if ($page): ?>
        <div class="main-content" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
      <?php endif; ?>
      
  
    
          <?php 
          
            $url = 'http://getvoip.com'. url('node/' . $node->nid);
            
            if ($page) {
              echo '<h1 ',  $title_attributes, /*'property="dc:title v:summary"',*/ 'property="v:summary"', (!$node->status ? ' class="not-published"' : ''), ' >', $title, '</h1>';
            }
            elseif ($view_mode == 'teaser') {
              echo '<h2 ',  $title_attributes, (!$node->status ? ' class="not-published"' : ''), ' ><a href="' . $url .'">' . $title . '</a></h2>';
            }
            elseif ($view_mode == 'side_block_teaser') {
              echo '<h4><a href="' . $url .'">' . $title . '</a></h4>';
            }
            
          
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
                //$delimiter = $page ? '<span class="delim">|</span>' : '<span class="delim">/</span>';
                //$created_str = date('F d, Y \a\t g:ia', $node->created);
                //$created_str = $page ? date('F d, Y \a\t g:ia', $node->created) : date('F d, Y', $node->created);
                
                $created_rdf = preg_replace('|(.*)content=\"(.*)\"\s(.*)|', '$2', $date); //date('Y-m-d\TH:i:s', $node->created); 
                
                if ($view_mode != 'side_block_teaser') {
                  $authorExtendedData = gv_misc_loadUserExtendedData($node->uid);
                  $author_name = $authorExtendedData->realname;
                  $author_gplus_profile = $authorExtendedData->field_u_gplus_profile_value;
                
                  /*
                  $author = user_load($node->uid);
                  $author_name = $author->realname;
                  $author_gplus_profile = @$author->field_u_gplus_profile['und'][0]['safe_value'];
                  */

                  $author_url = url('user/' . $node->uid);
                  $author_title = t('!author\'s profile', array('!author' => $author_name));

                  global $language;
                  $gplus_profile = ($author_gplus_profile) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $author_gplus_profile . '?rel=author">(G+)</a>' : '';
                }
                
                if (!empty($extra_data['guest_author'])) {
                  
                  if ($view_mode == 'side_block_teaser') {
                    $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  $created_str .
                              '</span>';
                  }
                  else {
                    $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By ' .
                                  $extra_data['guest_author'] 
                                  /*. $gplus_profile */.
                                  $delimiter . $created_str .
                              '</span>';
                  }
                  
                }
                elseif ($node->uid) {

                  if ($view_mode == 'side_block_teaser') {
                    $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  $created_str .
                              '</span>';
                  }
                  else {
                    $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By ' .
                                  (!$page ? $author_name : '<a href="' . $author_url . '" title="' . $author_title . '" class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' . $author_name . '</a>') 
                                  /*. $gplus_profile */.
                                  $delimiter . $created_str .
                              '</span>';
                  }

                }
                else {
                  $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By:<span class="username">Guest' . $delimiter . $created_str .
                               '</span>';

                }

                echo '<span class="submitted">', $submitted, '</span>';
            }
          
          ?>
    
    

    

        <div class="content<?php echo ($view_mode == 'teaser' ? ' teaser' : ''), '" ', $content_attributes; ?>>
          
           <?php $editor_overall_rating = number_format($node->extra_data['editor_rating_overall'] * 0.05, 1); ?>
          
           <?php if ($page): 
             
              // Top share post links.
              echo gv_blocks_getSidebarShareStaticBlock($node, '<span>Share:</span>', 'top bottom');
             
            ?>
            <div id="phone-top">
              <div class="phone photo">
                <?php
                
                  if (isset($node->field_p_image['und'][0]['uri'])) {
                    echo '<a class="zoom" title="' . $node->field_p_image['und'][0]['title'] . '" href="/' . gv_misc_getPathFromStreamUri($node->field_p_image['und'][0]['uri']) . '">' . theme('image_style', array( 'path' =>  $node->field_p_image['und'][0]['uri'], 'style_name' => 'phone_page_main', 'alt' => $node->field_p_image['und'][0]['alt'], 'title' => $node->field_p_image['und'][0]['title'], 'attributes' => array('rel' => 'v:photo'))) . '</a>'; 
                    
                  }
                ?>
              </div>
                
              <div class="pros-and-cons">
                <div>
                  <div class="title good">THE GOOD</div><?php /*dpm($node);*/ echo $node->extra_data['pros_and_cons']['The good']; ?>
                </div>
                <div>
                  <div class="title bad">THE BAD</div><?php echo $node->extra_data['pros_and_cons']['The bad']; ?>
                </div>
                <div>
                  <div class="title bottom">THE BOTTOM LINE</div><?php echo $node->extra_data['pros_and_cons']['The bottom line']; ?>
                </div>
                
              </div>
             
              <div class="bottom-clear"></div>

 
              <?php 
              /*
              <div class="share">

                      <div class="others">
                        <!-- ADDTHIS BUTTON BEGIN -->
                        <script type="text/javascript">
                        var addthis_config = {
                            //pubid: "all4senses"
                        }
                        var addthis_share =
                        {
                          // ... members go here
                          url: "<?php echo $url?>"
                        }
                        </script>

                        <div class="addthis_toolbox addthis_default_style" addthis:url="<?php echo $url?>">
                          <a href="http://addthis.com/bookmark.php?v=250&amp;pub=all4senses"></a>
                          <a class="addthis_button_email" title="E-mail this page link"><?php echo t('Email This Post'); ?></a>
                          <a class="addthis_button_tumblr"></a>
                          <a class="addthis_button_hackernews"></a>
                          <a class="addthis_button_digg"></a>
                          <a class="addthis_button_reddit"></a>
                          <a class="addthis_button_stumbleupon"></a>

                          <a class="addthis_button_compact"></a>
                        </div>
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pub=all4senses"></script>
                        <!-- ADDTHIS BUTTON END -->

                      </div>

                
                      <div class="main">
                          <?php //echo gv_blocks_getSocialiteButtons($url, $title); ?> 
                      </div> <!-- main share buttons -->

              </div>
              
              */ ?>
              
             </div>
              
                      
              <div class="data tabs">
                    <ul class="data-tabs-ul">
                      <li><a id="tab1" class="a-tab" href="#tabs-1">Editor's Review</a></li>
                      <li><a id="tab2" class="a-tab" href="#tabs-2">Technical Specs</a></li>
                      <?php if ($node->extra_data['downloads']): ?><li><a id="tab3" class="a-tab" href="#tabs-3">Downloads</a></li><?php endif; ?>
                      <?php if ($node->extra_data['in_the_box']): ?><li><a id="tab4" class="a-tab" href="#tabs-4">In the Box</a></li><?php endif; ?>
                      <li><a id="tab5" class="a-tab" href="#user-reviews">User Reviews</a></li>
                    </ul>
                
                
                    <div id="tabs-1">
                      
                      <div class="gv_votes editor phone">
                        <?php echo 
                                //'<div class="caption"><span><span property="v:reviewer">Editor</span>\'s Overall Rating:</span> <span property="v:rating">' , $editor_overall_rating, '</span>' /* render($content['gv_rating_overall'])*/ , '<div class="bottom-clear"></div></div>', 
                                render($node->editor->content['gv_ratings']); 
                        ?>
                        <div class="rate-other">
                          <?php echo '<div class="voters editor"><div class="count" property="v:count">' . (!empty($node->gv_voters) ? $node->gv_voters : 1) . '</div></div>';?>
                        </div>
                        
                        <div class="total">
                        <?php 

                            echo '<div class="caption">OVERALL SCORE</div>
                            <span class="count" rel="v:rating">
                              <span typeof="v:Rating">
                                <span property="v:worst" content="0"></span>
                                <span property="v:value">' . $editor_overall_rating . '</span>
                                <span property="v:best"  content="0"></span>
                              </span>
                            </span><div class="stars-rating">' . theme('gv_misc_fivestar_static', array('rating' => $editor_overall_rating * 20, 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css'))) . '</div>'; 

                        ?>
                      </div>
                        
                        
                      </div>
                      <?php 
                        echo @$node->extra_data['body_summary'];
                        
                        
                        //global $user;
                        //if ($user->uid == 1) 
                          {
                          if (!empty($node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Pros']['value']) && !empty($node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Cons']['value'])) {
                            echo '<div id="top-pros-cons">',
                                    '<div id="top-pros">',
                                      '<div class="title">OUR TOP 5 <span>PROS</span></div>', $node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Pros']['value'], '</div>',
                                    '<div id="top-cons">',
                                      '<div class="title">OUR TOP 5 <span>CONS</span></div>', $node->extra_data['our_top_5_pros_and_cons']['Our Top 5 Cons']['value'], '</div>',
                                  '</div>';
                          }
                        }
                        echo render($content['body']); 

                        //dpm($content);
                        //dpm($node);
                      ?>
                      
                      <div class="bottom-clear"></div>
                    </div>
                    <div id="tabs-2">
                      <?php echo $node->specs; ?>
                    </div>
                    <?php if ($node->extra_data['downloads']): ?>
                      <div id="tabs-3">
                        <?php echo $node->extra_data['downloads']; ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($node->extra_data['in_the_box']): ?>
                      <div id="tabs-4">
                        <?php echo $node->extra_data['in_the_box']; ?>
                      </div>
                    <?php endif; ?>
                    <div id="user-reviews">
                      <?php if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                            <div class="gv_votes users_overall"><?php echo '<div class="caption">' . t('Overall Consumer Ratings') . '</div>' . render($content['gv_ratings']); ?></div>
                            <div class="overall"> 
                              <div class="text">
                                <?php 
                                  //echo '<div class="voters"><div class="title">' . t('Number of Reviews') . ':</div><div class="count" property="v:count">' . $node->gv_voters . '</div></div>';
                                  echo '<div class="voters"><div class="title">' . t('Number of Reviews') . ':</div><div class="count">' . $node->gv_voters . '</div></div>';
                                ?>
                                <?php echo '<div class="recommend"><div class="title">' . t('Would recommend') . ': </div><div class="data">' . $node->gv_recommend . '% ' . t('of all voters') . '</div></div>'; ?>
                                <div class="overall title"><?php $node->field_p_name['und'][0]['value'] . ' ' . t('Overall Rated:'); ?></div>
                              </div>
                              <div class="star-big">
                                <?php 
                                  //echo '<div class="count" content="' . $node->gv_rating_overall . '" property="v:rating">' . $node->gv_rating_overall . '</div>' . '<div class="descr">' . t('Out of 5 stars') . '</div>';
                                  echo '<div class="count" content="' . $node->gv_rating_overall . '" >' . $node->gv_rating_overall . '</div>' . '<div class="descr">' . t('Out of 5 stars') . '</div>';
                                ?>
                              </div>
                            </div>

                      <?php endif; // end of if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                        <div class="bottom-clear"></div>
              
                      <?php echo $node->addPhoneReviewForm; ?>
                        
                      <div class="bottom-clear"></div>
                      
                      <?php if ($node->userReviews): ?> 

                        <div class="reviews">
                          <div class="header">
                              <h2 class="button"><?php echo $node->field_p_name['und'][0]['value'], ' ', t('User Reviews'); ?></h2>
                          </div>
                          <?php echo $node->userReviews; // . '<br/>' . l('Rate it', 'voip-phone-submit-user-review', array('attributes' => array('target' => '_blank'), 'query' => array('id' => $node->nid)));  ?>
                        </div>

                      <?php endif; ?>

                    </div> <!-- <div id="user-reviews"> -->
                
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
          
          
              <div class="phone photo teaser">
                <?php
                  if (isset($node->field_p_image['und'][0]['uri'])) {
                    echo '<a href="' . $node_url . '">' . theme('image_style', array( 'path' =>  $node->field_p_image['und'][0]['uri'], 'style_name' => 'phone_teaser_main', 'alt' => $node->field_p_image['und'][0]['alt'], 'title' => $node->field_p_image['und'][0]['title'], 'attributes' => array('rel' => 'v:photo'))) . '</a>'; 
                  }
                ?>
              </div>
              <?php
                  $stars = theme('gv_misc_fivestar_static', array('rating' => $node->extra_data['editor_rating_overall'], 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css')));
                  echo '<div class="rating">' . $stars . ' <span class="count">(' . $editor_overall_rating . ')</span></div>';
              ?>
              <h3<?php //print $title_attributes; ?> property="dc:title v:summary">
                  <a href="<?php print $node_url; ?>">
                    <?php print $node->field_p_name['und'][0]['value']; ?>
                  </a>
              </h3>
            
          <?php endif; ?>  <!-- end of else of if ($page): -->
           
             
      <?php if ($page): ?>
        </div> <!-- content -->
      <?php endif; ?>
        

        
        
      <?php  if ($page): ?>
    
        <footer>
          <div class="share">
              <?php 
                //echo gv_blocks_getSidebarShareStaticBlock($node, '<span>Share:</span>');
                //echo gv_blocks_getSidebarShareStaticBlock($node, '<span>Share This Post:</span>', 'bottom');
              echo gv_blocks_getSidebarShareStaticBlock($node, '', 'bottom');
              ?> 
          </div>
          
        </footer>
    
        
        <?php 
  //      global $user;
  //      if ($user->uid) 
        {  
          echo gv_blocks_getAboutTheAuthor($node->uid); 
        }
        
      ?>
        
      <?php endif;  ?>
        
  </div> <!-- main-content -->
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
