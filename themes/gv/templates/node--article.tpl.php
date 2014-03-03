<?php 

  $class_thumb_presented = NULL;
  $return = FALSE;

  $extra_data = $teaser_data = gv_misc_updateArticleExtraData($node, TRUE, 1390188453);
  $extra_data['guest_author'] = $author_name = !empty($extra_data['guest_author']) ? $extra_data['guest_author'] : NULL;
              

  
      
  /*
  if($view_mode == 'side_block_teaser_onPrefaceBottomLatest') {
    
    $body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : $node->body[0]['value'];

    $teaser_data = gv_misc_getArticleTeaserData('all', $body, $node->nid, 270);

    $author_name = gv_misc_getNodeAuthor($node);
    
    //echo $teaser_data['main_image_html'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">By <span class="author">' . $author_name . '</span> / ' . date('F d, Y', $node->created) . '</div>' 
    echo $teaser_data['home_teaser_image'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">By <span class="author">' . $author_name . '</span> / ' . date('F d, Y', $node->created) . '</div>' 
            . '<div class="teaser">' . $teaser_data['teaser_only'] . '</div>';

    return;    
  }
  else
    */
  if($view_mode == 'home_teaser') {

    /*
    $body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : $node->body[0]['value'];
    $teaser_data = gv_misc_getArticleTeaserData('all', $body, $node->nid, 270);
    */
    $author_name = gv_misc_getNodeAuthor($node);
    /*
    echo $teaser_data['home_teaser_image'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">By <span class="author">' . $author_name . '</span> / ' . date('F d, Y', $node->created) . '</div>' 
            . '<div class="teaser">' . $teaser_data['teaser_only'] . '</div>';
    */
    echo $extra_data['home_teaser_image_beautify'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">By <span class="author">' . $author_name . '</span> / ' . date('F d, Y', $node->created) . '</div>' 
            . '<div class="teaser">' . $teaser_data['teaser_only_home'] . '</div>';

    return;
  }
  elseif ($view_mode == 'side_block_teaser_latestBlogsOnNews') {
    
    //$main_image = unserialize($node->field_main_image['und'][0]['value']);
    //echo '<div class="block-thumb">' . theme('gv_misc_image_style', array('style_name' => 'block_thumb', 'src' => $main_image['src'], 'path' => $main_image['uri'], 'alt' =>  (@$main_image['alt'] ? $main_image['alt'] : $title), 'title' => $title )) . '</div>' . l($node->title, 'node/' . $node->nid);
    
    echo '<div class="block-thumb">' . $extra_data['block_thumb_image_html_beautify'] . '</div>' . l($node->title, 'node/' . $node->nid);
    return;
  }
  elseif($view_mode == 'side_block_teaser') {
      
      // Hide thumbnails
      $teaser_data['side_block_main_image'] = NULL; //$teaser_data['side_block_main_image'] = NULL;
      
//      if (!empty($teaser_data['side_block_main_image'])) {
//        $class_thumb_presented = ' with_thumb';
//      }
      
  }
  elseif($view_mode == 'teaser') {
    
    //if ($field_main_image = unserialize($node->field_main_image['und'][0]['value'])) {
    if (!empty($extra_data['main_image'])) {
      $class_thumb_presented = ' with_thumb';
    }
    else {
      $class_thumb_presented = NULL;
    }
  }
  
  
?>


<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes . $class_thumb_presented; ?> clearfix"<?php print $attributes; ?>>
  <!-- <div class="inside"> -->
<?php else: ?>
  
    <?php 
    
      $url = 'http://getvoip.com'. url('node/' . $node->nid);
      
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

  <div class="main-content"> 
<?php endif; ?>

 
  
 
          

      <?php if (!$page): ?>
        <?php 
          if ($view_mode == 'side_block_teaser' && !empty($teaser_data['side_block_main_image'])) {
            echo $teaser_data['side_block_main_image_beautify'];  //echo $teaser_data['side_block_main_image']; 
          }
        ?>
        <header>
      <?php endif; ?>

          <?php print render($title_prefix); ?>
          
              <?php if ($page): ?>
              <h1
              <?php elseif ($view_mode == 'side_block_teaser'): ?>
              <h4
              <?php else: ?>
              <h2 
              <?php endif; ?>

                <?php print ' ' . /*$title_attributes*/ /*preg_replace('/datatype=".*"/', '', $title_attributes);*/ ''/*preg_replace('/datatype=""/', '', $title_attributes)*/; 
                
                $custom_classes = array();

                if (!$node->status) {
                  $custom_classes[] = 'not-published';
                }
                if (!empty($node->field_invisible['und'][0]['value'])) {
                  $custom_classes[] = 'invisible-in-lists';
                }
                if (!empty($custom_classes)) {
                  echo ' class="' . implode(' ', $custom_classes) . '"';
                }
                 
                //dpm($node);
                
                ?>><?php if (!isset($node->title_no_link) && !$page): ?><a href="<?php print $node_url; ?>"><?php print $title; ?></a>
                <?php else: ?><?php print $title; ?><?php endif; ?>
                
             <?php if ($page): ?>
               </h1>
             <?php elseif ($view_mode == 'side_block_teaser'): ?>
               </h4>
             <?php else: ?>
                </h2>
             <?php endif; ?> 

          <?php print render($title_suffix); ?>  
            
            
          <span class="submitted">
            <?php 
            
              //$created_str = date('F d, Y \a\t g:ia', $node->created);
              $created_str = date('F d, Y', $node->created);
              $created_rdf = preg_replace('|(.*)content=\"(.*)\"\s(.*)|', '$2', $date); //date('Y-m-d\TH:i:s', $node->created); 
              
              //$author = user_load($node->uid);
              //$author_name = $author->realname;
              
              $paths_with_latest_article = FALSE;
              if (!$page) {
                $paths_with_latest_articles = array('/compare-business-voip-providers', '/compare-residential-voip-providers', '/business-voip-features', '/sip-trunking-providers', '/canada-voip', '/internet-fax-service-providers');
                if ($_SERVER['REQUEST_URI'] == '/' || in_array(@$_SERVER['REDIRECT_URL'], $paths_with_latest_articles)) {
                  $paths_with_latest_article = TRUE;
                }
              }
              
              
              //if (!$extra_data['guest_author'] && ($page || $node->type == 'article' || $paths_with_latest_article) ) {
              if (empty($extra_data['guest_author'])) {
                $authorExtendedData = gv_misc_loadUserExtendedData($node->uid);
                $author_name = $authorExtendedData->realname;
              }
            
              if ($page) {
                
                /*
                global $user;
                if ($user->uid && $node->uid) {
                  $submitted = preg_replace('/(<span.*>)(.*)(<a.*a>)(.*)(<\/span>)/', "$1By$3$created_str$5", $submitted);
                }
                elseif (!$node->uid) {
                  $submitted = preg_replace('/(<span.*>)(.*)(<span.*span>)(.*)(<\/span>)/', "$1By $3 $created_str$5", $submitted);
                }
                // Make a link for an authors profile from just a Name.
                else {
                  $submitted = preg_replace('/(<span.*>)(.*)<span(.*)(about=")(.*)(".*)>(.*)<\/span>.*(<\/span>)/', "$1By<a href=" . '"$5"' . "$3$4$5$6>$7</a>$created_str$8", $submitted);
                }
                */
               
                if ($node->uid) {
                  
                  global $language;
                  
                  if (!$extra_data['guest_author']) {
                    $author_url = url('user/' . $node->uid);
                    //$gplus_profile = (isset($author->field_u_gplus_profile['und'][0]['safe_value']) && $author->field_u_gplus_profile['und'][0]['safe_value']) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $author->field_u_gplus_profile['und'][0]['safe_value'] . '?rel=author">(G+)</a>' : '';
                    $gplus_profile = ($authorExtendedData->field_u_gplus_profile_value) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $authorExtendedData->field_u_gplus_profile_value . '?rel=author">(G+)</a>' : '';
                    $author_title = t('!author\'s profile', array('!author' => $author_name));
                  }
                  
                  $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By' . ':' .
                                  //'<a href="' . $author_url . '" title="View user profile." class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' .
                          
                                  (!$extra_data['guest_author'] ? '<a href="' . $author_url . '" title="' . $author_title . '" class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' . $author_name . '</a>' . $gplus_profile : '<span class="guest-author">' . $author_name . '</span>') .
                          
                                  ($node->type == 'article' ? '' : '<span class="delim">|</span><span class="nw">' . $created_str . '</span>') .
                          
                               '</span>';
                  
                 
                }
                else {
                  $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By' . ':' .
                                  '<span class="username">' .
                                    'Guest' .
                                  '</span>' .
                                  ($node->type == 'article' ? '' : '<span class="delim">|</span><span class="nw">' . $created_str . '</span>') .
                               '</span>';
                  
                }
                
                echo $submitted;
              }
              else {
                  if ($view_mode == 'side_block_teaser') {
                    echo date('F d, Y', $node->created);;
                  }
                  elseif ($paths_with_latest_article) {
                    // Home page articles teasers.
                    $type_cations = array('blog_post' => 'Blog', 'news_post' => 'News', 'article' => 'Article');
                    echo ($_SERVER['REQUEST_URI'] != '/' ? $type_cations[$node->type] . ' - ' : '') . 'By <span class="author">' , $author_name, '</span>' /*l($author_name, 'user/' . $node->uid, array('attributes' => array('title' => $author_name . '\'s profile', 'class' => 'username')))*/, ' / ', date('F d, Y', $node->created) /*gv_misc_elapsed_time($node->created)*/;
                  }
                  else {
                    if ($node->type == 'article') {
                      echo 'By' , ': ' , $author_name;
                    }
                    else {
                      echo 'By' , ': ' , $author_name, ' / ', $created_str;
                    }
                  }
              }
              
            ?>
          </span>


      <?php if (!$page): ?>
        </header>
      <?php endif; ?>



      <div class="content <?php echo ($page ? 'page' : 'teaser'); ?>"<?php print $content_attributes; ?>>
        <?php
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          hide($content['field_topics']);
          
          
          switch ($node->type) {
            case 'news_post':
              $target = 'news';
              $target_tags = @$node->field_tags_news['und'];
              $field_tags_current = @$content['field_tags_news'];
              hide($content['field_tags_news']);
              break;
            case 'blog_post':
              $target = 'blog';
              $target_tags = @$node->field_tags_blog['und'];
              $field_tags_current = @$content['field_tags_blog'];
              hide($content['field_tags_blog']);
              break;
            case 'article':
              $target = 'articles';
              $target_tags = @$node->field_tags_articles['und'];
              $field_tags_current = @$content['field_tags_articles'];
              hide($content['field_tags_articles']);
              break;
            default:
              $target_tags = array();
              break;
          }
          
          
          if (!$target_tags) {
            $target_tags = array();
          }
          
          
          if ($page) {
            // Top share post links.
            //if ($user->uid == 1) {
              echo gv_blocks_getSidebarShareStaticBlock($node, '<span>Share:</span>', 'top bottom');
            //}
          }
          else {
            
            if ($view_mode == 'side_block_teaser') {
              echo $teaser_data['teaser_side_block'];
            }
            // $path_with_latest_article is defined above.
            elseif ($paths_with_latest_article) {
              // Show an other teaser on the home page.
              if (isset($extra_data['teaser_home'])) {
                echo $extra_data['teaser_home_beautify']; //echo $extra_data['teaser_home'];
              }
              else {
                echo $extra_data['teaser_block'];
              }
            }
            else {
              
              if ($class_thumb_presented) {
                //echo $extra_data['teaser_main_image'] . '<div class="teaser-content">' . $extra_data['teaser_only'] . '</div>';
                echo $extra_data['teaser_main_image_beautify'] . '<div class="teaser-content">' . $extra_data['teaser_only'] . '</div>';
              }
              else {
                echo $teaser_data['teaser_beautify']; //echo $teaser_data['teaser'];
              }
              
            }
            
            hide($content['body']);
          }
          
          /*
          if (isset($content['field_topics']) && (!isset($content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) || !$content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) ) {
            hide($content['metatags']['keywords']);
            gv_misc_pushTagsToMetatags('keywords', $content['field_topics']);
          }
          else {
            gv_misc_addMetatag('news_keywords', $content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']);
          }
          */
          
          $keyword_metatag_name = ($node->type == 'news_post') ? 'news_keywords' : 'keywords';
          
          if (isset($content['metatags']['keywords'])) {
            hide($content['metatags']['keywords']);
          }
          
          if (isset($content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) && $content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) {
            gv_misc_addMetatag($keyword_metatag_name, $content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']);
          }
//          elseif (@$content['field_topics']) {
//            gv_misc_pushTagsToMetatags($keyword_metatag_name, $content['field_topics']);
//          }
          
          echo render($content);
        ?>
      </div>



      <?php if ($page): ?>
    
                  <footer>
                    
                   
                    
                    <?php 
                      $tags = NULL;
                      foreach ($target_tags as $key => $value) {
                        $tags .= ($tags ? '<div class="delim">|</div>' : '') . l($field_tags_current[$key]['#title'], 'taxonomy/term/' . $value['tid']);
                      }

                      if ($tags) {
                        echo '<div class="topics"><div class="title">TAGS:</div>' . $tags . '<div class="bottom-clear"></div></div>';
                      }
                      
                    ?>


                    <div class="share">

                    <?php /*  

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
                              <?php 
//                                if ($user->uid != 1) {
//                                  echo gv_blocks_getSocialiteButtons($url, $title); 
//                                }
                              ?> 
                      </div> <!-- main share buttons -->
                    */  ?>
                      
                    <?php 
                      echo gv_blocks_getSidebarShareStaticBlock($node, '<span>Share This Post:</span>', 'bottom');
                    ?>  
                    
                    </div>
                    
                    
                    
                    <?php  
                      // Related articles.
                    /*
                      if (!empty($node->related_articles)) {
                        echo '<div class="related_articles"><h3>Recommended For You</h3>';
                          foreach ($node->related_articles as $nid => $article) {
                            if (!empty($article->field_main_image_value['src_themed_related'])) {
                              echo '<div><a href="' . url('node/' . $nid) . '"><img src="' . $article->field_main_image_value['src_themed_related'] . '" ' . (!empty($article->field_main_image_value['alt']) ? 'alt="' . $article->field_main_image_value['alt'] . '" ' : '') . (!empty($article->field_main_image_value['title']) ? 'title="' . $article->field_main_image_value['title'] . '" ' : '') . '/></a>', l($article->title, 'node/' . $nid) . '</div>';
                            }
                            else {
                              echo '<div>', l($article->title, 'node/' . $nid) . '</div>';
                            }
                          }
                        echo '</div>';
                      }
                     */ 
                      
                    ?>
                  </footer>
    
    
      <?php endif; ?>
    
      <div class="bottom-clear"></div>
 

  


<?php if ($page): ?>
  </div>  <!-- main-content -->
<?php endif; ?>
    
    
  
  <?php /*if ($page && $node->type != 'news_post'): ?>
      
  </div> <!-- main-content -->
  
      <div class="providers">
        <?php 
          $block_data = array('module' => 'views', 'delta' => 'providers-block_pick_bu', 'shadow' => TRUE);
          echo gv_blocks_getBlockThemed($block_data);
          $block_data = array('module' => 'views', 'delta' => 'providers-block_pick_re', 'shadow' => TRUE);
          echo gv_blocks_getBlockThemed($block_data);
          echo '<div class="bottom-clear"></div>';
        ?>
      </div>

  <?php endif; */?>
  
    
  <?php //print render($content['comments']); ?>

<?php if (!$page): ?>
  <!-- </div> --> <!-- /.inside -->
  <!-- <div class="shadow"></div> -->
  
  <?php
    // Related articles section
    /*
    if (isset($node->related_articles_teaser)) {
      $tags = NULL;
      foreach ($target_tags as $key => $value) {
        if (empty($field_tags_current[$key]['#title'])) {
          break;
        }
        $tags .= ($tags ? '<div class="delim">|</div>' : '') . l($field_tags_current[$key]['#title'], 'taxonomy/term/' . $value['tid']);
      }

      if ($tags) {
        echo '<div class="topics related"><div class="title">TAGS:</div>' . $tags . '<div class="bottom-clear"></div></div>';
      }
    }
    */
  ?>
  </article> <!-- /.node -->
<?php endif; ?>

  


