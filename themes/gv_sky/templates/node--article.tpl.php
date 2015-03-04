<?php 


  $class_thumb_presented = NULL;
  $return = FALSE;

  
  
  
  $extra_data = $teaser_data = gv_misc_updateArticleExtraData($node, TRUE, 1421703309);
  
  global $user;
  if ($user->uid == 1) {
    gv_misc_UpdateNodeBody_add_GvVideoGoogleSnippetWrapper_ifVideoPresented($node, 1421703309);
  }
  
  
  $extra_data['guest_author'] = $author_name = !empty($extra_data['guest_author']) ? $extra_data['guest_author'] : NULL;
              
 
  if($view_mode == 'home_teaser') {

   
    $author_name = gv_misc_getNodeAuthor($node);
    
    echo $extra_data['home_teaser_image_beautify'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">By <span class="author">' . $author_name . '</span> / ' . date('F d, Y', $node->created) . '</div>' 
            . '<div class="teaser">' . $teaser_data['teaser_only_home'] . '</div>';

    return;
  }
  elseif($view_mode == 'home_teaser_rotated') {

    if (!empty($extra_data['home_teaser_rotated_image_beautify'])) {
      echo $extra_data['home_teaser_rotated_image_beautify'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">' . date('F j\t\h \<\s\p\a\n\>Y\<\/\s\p\a\n\>', $node->created) . '</div>';
    }
    elseif (!empty($extra_data['home_teaser_image_beautify'])) {
      echo $extra_data['home_teaser_image_beautify'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">' . date('F j\t\h \<\s\p\a\n\>Y\<\/\s\p\a\n\>', $node->created) . '</div>';
    }
    else {
      echo $extra_data['teaser_main_image_beautify'] . '<h3>'. l($node->title, 'node/' . $node->nid) . '</h3><div class="submitted">' . date('F j\t\h \<\s\p\a\n\>Y\<\/\s\p\a\n\>', $node->created) . '</div>';
    }
    
    return;
  }
  elseif ($view_mode == 'side_block_teaser_latestBlogsOnNews') {
    
    
    echo '<div class="block-thumb">' . $extra_data['block_thumb_image_html_beautify'] . '</div>' . l($node->title, 'node/' . $node->nid);
    return;
  }
  elseif($view_mode == 'side_block_teaser') {
      
      // Hide thumbnails
      $teaser_data['side_block_main_image'] = NULL; 

  }
  elseif($view_mode == 'teaser') {
    
    if (!empty($extra_data['main_image'])) {
      $class_thumb_presented = ' with_thumb';
    }
    else {
      $class_thumb_presented = NULL;
    }
  }
  
  
?>


<?php if (!$page): ?>
  <article>
<?php else: ?>
  
    <?php 
    
      $url = 'http://getvoip.com'. url('node/' . $node->nid);
      
    ?>

  <div class="main-content"> 
<?php endif; ?>

 
  
 
          

      <?php if (!$page): ?>
        <?php 
          if ($view_mode == 'side_block_teaser' && !empty($teaser_data['side_block_main_image'])) {
            echo $teaser_data['side_block_main_image_beautify']; 
          }
        ?>
      <?php endif; ?>
       
          <div class="latest-blog-posts-list-item-date"><div class="icon-calendar"></div>
            <?php 
            
              $created_str = date('F d, Y', $node->created);
              $created_rdf = preg_replace('|(.*)content=\"(.*)\"\s(.*)|', '$2', $date); //date('Y-m-d\TH:i:s', $node->created); 
              
              
              $paths_with_latest_article = FALSE;
              if (!$page) {
                $paths_with_latest_articles = array('/compare-business-voip-providers', '/compare-residential-voip-providers', '/business-voip-features', '/sip-trunking-providers', '/canada-voip', '/internet-fax-service-providers');
                if ($_SERVER['REQUEST_URI'] == '/' || in_array(@$_SERVER['REDIRECT_URL'], $paths_with_latest_articles)) {
                  $paths_with_latest_article = TRUE;
                }
              }
              
              
              if (empty($extra_data['guest_author'])) {
                $authorExtendedData = gv_misc_loadUserExtendedData($node->uid);
                $author_name = $authorExtendedData->realname;
              }
            
              if ($page) {
                
                
               
                if ($node->uid) {
                  
                  global $language;
                  
                  if (!$extra_data['guest_author']) {
                    $author_url = url('user/' . $node->uid);
                    $gplus_profile = ($authorExtendedData->field_u_gplus_profile_value) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $authorExtendedData->field_u_gplus_profile_value . '?rel=author">(G+)</a>' : '';
                    $author_title = t('!author\'s profile', array('!author' => $author_name));
                  }
                  
                  $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By' .
                          
                                  (!$extra_data['guest_author'] ? '<a href="' . $author_url . '" title="' . $author_title . '" class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' . $author_name . '</a>' /*. $gplus_profile*/ : '<span class="guest-author">' . $author_name . '</span>') .
                          
                                  ($node->type == 'article' ? '' : '<span class="delim">|</span><span class="nw">' . $created_str . '</span>') .
                          
                               '</span>';
                  
                 
                }
                else {
                  $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By' .
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
                    echo date('F d\t\h, Y', $node->created);;
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
                      echo 'By <span class="author">' , $author_name, '</span><span class="delim"> / </span>', $created_str;
                    }
                  }
              }
              
            ?>
          </div>

          <?php print render($title_prefix); ?>
          
              <?php if ($page): ?>
              <h1 
              <?php elseif ($view_mode == 'side_block_teaser'): ?>
              <h4 class="latest-blog-posts-list-item-heading"
              <?php else: ?>
              <h2 
              <?php endif; ?>

                <?php print ' '; 
                
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
                 
                $title_shorter = dk_shorten_title($title);
                

                ?>><?php if (!isset($node->title_no_link) && !$page): ?><a class="latest-blog-posts-list-item-heading-link" href="<?php print $node_url; ?>"><?php print $title_shorter; ?></a>
                <?php else: ?><?php print $title; ?><?php endif; ?>
                
             <?php if ($page): ?>
               </h1>
             <?php elseif ($view_mode == 'side_block_teaser'): ?>
               </h4>
             <?php else: ?>
                </h2>
             <?php endif; ?> 

          <?php print render($title_suffix); ?>  
            
            


      <?php if (!$page): ?>
      <?php endif; ?>



      <div class="latest-blog-posts-list-item-content <?php echo ($page ? 'page' : 'teaser'); ?>"<?php print $content_attributes; ?>>
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
              echo gv_blocks_getSidebarShareStaticBlock($node, '<span>Share:</span>', 'top bottom');
          }
          else {
            
            if ($view_mode == 'side_block_teaser') {
              if (strlen($title) < 36 ) {
                $content_shortened = substr($teaser_data['teaser_side_block'], 0, 176);
              } else {
                $content_shortened = substr($teaser_data['teaser_side_block'], 0, 156) . '...';
              }
              echo $content_shortened;
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
                echo $extra_data['teaser_main_image_beautify'] . $extra_data['teaser_only'];
              }
              else {
                echo $teaser_data['teaser_beautify']; //echo $teaser_data['teaser'];
              }
              
            }
            
            hide($content['body']);
          }
          
          
          $keyword_metatag_name = ($node->type == 'news_post') ? 'news_keywords' : 'keywords';
          
          if (isset($content['metatags']['keywords'])) {
            hide($content['metatags']['keywords']);
          }
          
          if (isset($content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) && $content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) {
            gv_misc_addMetatag($keyword_metatag_name, $content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']);
          }

          
          
          echo render($content);
        ?>
      </div>



      <?php if ($page): ?>
    
                  <footer>
                    
                   
                    
                    <?php 
                      $tags = NULL;
                      foreach ($target_tags as $key => $value) {
                        $tags .= ($tags ? '<div class="delim">|</div>' : '') . l($field_tags_current[$key]['#title'], 'taxonomy/term/' . $value['tid'], array('attributes' => array('rel' => 'nofollow')));
                      }

                      if ($tags) {
                        echo '<div class="topics"><div class="title">TAGS:</div>' . $tags . '<div class="bottom-clear"></div></div>';
                      }
                      
                    ?>


                    <div class="share">

                      
                    <?php 
                      echo gv_blocks_getSidebarShareStaticBlock($node, '', 'bottom');
                    ?>  
                    
                    </div>
                    
                  </footer>
    
    
      <?php endif; ?>
     

  


<?php if ($page): ?>
      
      <?php 
      {  
        
        echo gv_blocks_getAboutTheAuthor($node->uid); 
      }
      
      
      // Warning! To work correctly, in node_view additionally added their css files, because they are mot pulled in where kust called here, in template file.
      if (!empty($extra_data['show_exit_intent_v2'])) {
        echo gv_blocks_get_exitIntent_v2();
      }
      elseif (!empty($extra_data['show_exit_intent_v3'])) {
        echo gv_blocks_get_exitIntent_v3();
      }
      

      ?>
      
  </div>  <!-- main-content -->
  
<?php endif; ?>
    
    
  
  
    

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>

  


