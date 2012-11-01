<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

           
  <div class="main-content" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
    
        <?php if ($page): ?>
          <h1<?php //print $title_attributes; ?> property="dc:title v:summary">
                <?php 
                  print $title; 
                ?>
          </h1>
          <span class="submitted">
              <?php 

                $created_str = date('F d, Y \a\t g:ia', $node->created);
                $created_rdf = preg_replace('|(.*)content=\"(.*)\"\s(.*)|', '$2', $date); //date('Y-m-d\TH:i:s', $node->created); 


                $author = user_load($node->uid);
                $author_name = $author->realname;
                $author_url = url('user/' . $node->uid);
                $author_title = t('!author\'s profile', array('!author' => $author_name));

                global $language;

                if ($page) {

                  $gplus_profile = (isset($author->field_u_gplus_profile['und'][0]['safe_value']) && $author->field_u_gplus_profile['und'][0]['safe_value']) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $author->field_u_gplus_profile['und'][0]['safe_value'] . '?rel=author">(G+)</a>' : '';

                  if ($node->uid) {

                    $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                    t('By') . ':' .
                                    '<a href="' . $author_url . '" title="' . $author_title . '" class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' .
                                      $author_name .
                                    '</a>' . $gplus_profile .
                                    ($node->type == 'article' ? '' : '<span class="delim">|</span>' . $created_str) .
                                '</span>';


                  }
                  else {
                    $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                    t('By') . ':' .
                                    '<span class="username">' .
                                      t('Guest') .
                                    '</span>' .
                                    ($node->type == 'article' ? '' : '<span class="delim">|</span>' . $created_str) .
                                '</span>';

                  }

                  echo $submitted;
                }
                else {
                  if ($node->type == 'article') {
                    echo t('By') , ': ' , $author_name;
                  }
                  else {
                    echo $created_str;
                  }
                }

              ?>
            </span>

        <?php endif; ?>
    
        <?php /*else: ?>
          <header>
        
            <h2<?php //print $title_attributes; ?> property="dc:title v:summary">
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
        <?php endif;  ?>
    
          
            
            
            
        <?php if (!$page): ?>
          </header>
        <?php endif; */?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
           <?php $editor_overall_rating = number_format($node->extra_data['editor_rating_overall'] * 0.05, 1); ?>
          
           <?php if ($page): ?>
          
              <div class="phone photo">
                <?php
                  if (isset($content['field_p_image'][0]['#item']['uri'])) {
                    echo theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'phone_page_main', 'alt' => $content['field_p_image'][0]['#item']['alt'], 'title' => $content['field_p_image'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo'))); 
                  }
                ?>
              </div>
                
              <div class="pros-and-cons">
                <div>
                  <span>The good:</span><?php /*dpm($node);*/ echo $node->extra_data['pros_and_cons']['The good']; ?>
                </div>
                <div>
                  <span>The bad:</span><?php echo $node->extra_data['pros_and_cons']['The bad']; ?>
                </div>
                <div>
                  <span>The bottom line:</span><?php echo $node->extra_data['pros_and_cons']['The bottom line']; ?>
                </div>
                
              </div>
             
             
              
              <div class="bottom-clear"></div>


              
              
              
              <div class="share">

                      <?php $url = 'http://getvoip.com'. url('node/' . $node->nid); ?>

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
                          <?php echo gv_blocks_getSocialiteButtons($url, $title); ?> 
                      </div> <!-- main share buttons -->

              </div>
              
              
              
              
              
              
              
                      
              <div class="data tabs">
                    <ul>
                      <li><a href="#tabs-1">Editor's Review</a></li>
                      <li><a href="#tabs-2">Technical Specs</a></li>
                      <?php if ($node->extra_data['downloads']): ?><li><a href="#tabs-3">Downloads</a></li><?php endif; ?>
                      <?php if ($node->extra_data['in_the_box']): ?><li><a href="#tabs-4">In the Box</a></li><?php endif; ?>
                      <li><a href="#tabs-5">User Reviews</a></li>
                    </ul>
                    <div id="tabs-1">
                      
                      <div class="gv_votes editor">
                        <?php echo '<div class="caption"><span><span property="v:reviewer">Editor</span>\'s Overall Rating:</span> <span property="v:rating">' , $editor_overall_rating, '</span>' /* render($content['gv_rating_overall'])*/ , '<div class="bottom-clear"></div></div>' , render($node->editor->content['gv_ratings']); ?>
                        <div class="rate-other">
                          <?php if ($page): ?>
                            <div class="text"><?php echo '<div class="title">' , t('Date:') , '</div><div property="v:dtreviewed" content="' . date('Y-m-d', $node->created) . '">' , date('F j, Y', $node->created) , '</div>'; ?></div>
                            <?php /*<div class="text"><?php echo '<div class="title">' , t('Reviewer:') , '</div><div property="v:reviewer">Editor</div>'; ?></div> */?>
                          <?php endif; ?>
                          <div class="text"><?php echo '<div class="title">' . t('Recommend') . ': </div><div class="data">' . $node->editor->gv_recommend . '</div>'?></div>
                        </div>
                      </div>
                      <?php echo render($content['body']); ?>
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
                    <div id="tabs-5">
                      <?php if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                            <div class="gv_votes users_overall"><?php echo '<div class="caption">' . t('Overall Consumer Ratings') . '</div>' . render($content['gv_ratings']); ?></div>
                            <div class="overall"> 
                              <div class="text">
                                <?php echo '<div class="voters"><div class="title">' . t('Number of Reviews') . ':</div><div class="count" property="v:count">' . $node->gv_voters . '</div></div>'; ?>
                                <?php //echo render($content['gv_recommend']); ?>
                                <?php echo '<div class="recommend"><div class="title">' . t('Would recommend') . ': </div><div class="data">' . $node->gv_recommend . '% ' . t('of all voters') . '</div></div>'; ?>
                                <div class="overall title"><?php $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/ . ' ' . t('Overall Rated:'); ?></div>
                              </div>
                              <div class="star-big">
                                <?php echo /*render($content['gv_rating_overall'])*/ '<div class="count" content="' . $node->gv_rating_overall . '" property="v:rating">' . $node->gv_rating_overall . '</div>' . '<div class="descr">' . t('Out of 5 stars') . '</div>'; ?>
                              </div>
                            </div>

                      <?php endif; // end of if (isset($content['gv_ratings']) && $content['gv_ratings']): ?>

                        <div class="bottom-clear"></div>
              
                      <?php echo $node->userReviews . '<br/>' . l('Rate it', 'voip-phone-submit-user-review', array('attributes' => array('target' => '_blank'), 'query' => array('id' => $node->nid))); ?>
                    </div>
                
              </div> <?php // End of <div class="data tabs"> ?>
              
              <?php echo render($content['metatags']); ?>
          
          
              
              
              
              
          <?php else: ?> <!-- Else of if ($page): -->
          
              <div class="phone photo">
                <?php
                  if (isset($content['field_p_image'][0]['#item']['uri'])) {
                    echo theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $content['field_p_image'][0]['#item']['alt'], 'title' => $content['field_p_image'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo'))); 
                  }
                ?>
                
              </div>
              <?php
                  $stars = theme('gv_misc_fivestar_static', array('rating' => $node->extra_data['editor_rating_overall'], 'stars' => 5, 'tag' => 'overall', 'widget' => array('name' => 'stars', 'css' => 'stars.css')));
                  echo '</div>' . $out . ' <div class="count">(' . $editor_overall_rating . ')</div>';
              ?>
              <h2<?php //print $title_attributes; ?> property="dc:title v:summary">
                  <a href="<?php print $node_url; ?>">
                    <?php print $title; ?>
                  </a>
              </h2>
              <?php //echo render($content['body']); ?>
          
          
          
          <?php endif; ?>  <!-- if ($page): -->
           
              
          <?php //echo render($content); ?>
          
        </div> <!-- content -->

        
        
      <?php /* if ($page): ?>
    
        <footer>
        </footer>
    
      <?php endif; */ ?>
        
      

  </div> <!-- main-content -->
  
  <?php if ($page): ?>
    <div class="shadow"></div>  
  <?php endif; ?>
  
  
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
