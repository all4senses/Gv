<?php 
  if ($page) {
    drupal_add_js('/sites/all/themes/gv_sky/js/article.js');
  }

  $class_thumb_presented = NULL;
  $return = FALSE;

  
  
  
  // The last var - time, if it's bigger thanarticles update time, the article will be updated
  // Used for update thumbnails, vars. etc
  if ($page) {
    //dpm(time());
    // 1424468002 - newer date
    $update_timestamp = 1424468002; // Update only in the page mode,  to decrease the updating time of the whole page and update only the main article, not teasers.
  }
  else {
    // older date - to skip updating
    $update_timestamp = 1421703309;
  }
  $extra_data = $teaser_data = gv_misc_updateArticleExtraData($node, TRUE, $update_timestamp); 
  // $extra_data = $teaser_data = gv_misc_updateArticleExtraData($node, TRUE, 1424424340); // 1424424340 - update fixing huge images thumbs with IM default settings, https://www.google.ru/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#newwindow=1&q=imagemagick+resize+increases+file+size
  
  
//  global $user;
//  if ($user->uid == 1) 
  {
    
    if ($page) {
      if($updated_body = gv_misc_UpdateNodeBody_add_GvVideoGoogleSnippetWrapper_ifVideoPresented($node, /*$update_timestamp*/1424634167, $extra_data)) {
        $content['body'][0]['#markup'] = check_markup($updated_body, 'full_html'/*$format_id = NULL, $langcode = '', $cache = FALSE*/); //$node->body[0]['value'];
      }
    }
    
    
  }
  
  $extra_data['guest_author'] = $author_name = !empty($extra_data['guest_author']) ? $extra_data['guest_author'] : NULL;
 
  if($view_mode == 'side_block_teaser') {
      
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
  <div class="article-page-wrapper">
  <div class="article"> 
<?php endif; ?>

 
  
 
          

      <?php if (!$page): ?>
        <?php 
          if ($view_mode == 'side_block_teaser' && !empty($teaser_data['side_block_main_image'])) {
            echo $teaser_data['side_block_main_image_beautify']; 
          }
        ?>
      <?php endif; ?>
      <?php 
        // $category = $node->field_blog_category['und'][0]['value'];

        if (isset($node->field_blog_category[LANGUAGE_NONE])) {
          $category = $node->field_blog_category[LANGUAGE_NONE][0]['value'];
        } else {
          $category = '';
        }

        if ($category == 'VoIP & Unified Communications') {
          $category_text = 'VoIP & UC';
          $category_class = 'voip';
        }
        if ($category == 'Cloud Computing & Web Services') {
          $category_text = 'Cloud Computing';
          $category_class = 'cloud';
        }
        if ($category == 'Business Insights & Tips') {
          $category_text = 'Business Insights';
          $category_class = 'business';
        }
        if ($category == NULL) {
          $category_text = '';
          $category_class = 'hide';
        }

      ?>

          <?php if (current_path() == 'blog') {     // Blog Page Only
            // if ($view_mode != 'side_block_teaser') {
              echo '<div class="blog-posts-item-category ' . $category_class . '" data-category="' . $category_class . '">' . $category_text . '</div>';
            // }
            echo '<div class="blog-posts-item-img">' . $extra_data['teaser_main_image_beautify'] . '</div>';
            echo '<div class="blog-posts-item-wrap">';
          } ?>

          <?php $submitted = '<div class="' . ( current_path() == 'blog' ? 'blog-posts-item-meta' : ( $page ? 'article-meta' : 'latest-blog-posts-list-item-date')) . '">'; ?>
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
                  
                  $submitted .= '<div property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  '<div class="article-meta-category ' . $category_class . '" data-category="' . $category_class . '">' . $category_text . '</div>' .
                                  (!$extra_data['guest_author'] ? '<div class="article-meta-author"><a class="article-meta-author-link" href="' . $author_url . '" title="' . $author_title . '" class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' . $author_name . '</a>' /*. $gplus_profile*/ : '<div class="article-meta-author guest-author">' . $author_name) . '</div>' .
                                  ($node->type == 'article' ? '' : '<div class="article-meta-date">' . $created_str . '</div>') .
                               '</div></div>';
                }
                else {
                  $submitted .= '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  'By' .
                                  '<span class="username">' .
                                    'Guest' .
                                  '</span>' .
                                  ($node->type == 'article' ? '' : '<span class="delim">|</span><span class="nw">' . $created_str . '</span>') .
                               '</span></div>';
                  
                }
                
                // echo $submitted;
              }
              else {
                  if ($view_mode == 'side_block_teaser') {
                    echo $submitted;
                    echo date('F d\t\h, Y', $node->created);;
                  }
                  elseif ($paths_with_latest_article) {
                    // Home page articles teasers.
                    $type_cations = array('blog_post' => 'Blog', 'news_post' => 'News', 'article' => 'Article');
                    echo ($_SERVER['REQUEST_URI'] != '/' ? $type_cations[$node->type] . ' - ' : '') . 'By <span class="author">' , $author_name, '</span>' /*l($author_name, 'user/' . $node->uid, array('attributes' => array('title' => $author_name . '\'s profile', 'class' => 'username')))*/, ' / ', date('F d, Y', $node->created) /*gv_misc_elapsed_time($node->created)*/;
                  }
                  else {
                    if ($node->type == 'article') {
                      echo $submitted;
                      echo '<div class="blog-posts-item-meta-author">' . $author_name . '</div>';
                      echo '<div class="blog-posts-item-meta-date">' . $created_str . '</div>';
                    }
                    else {
                      echo $submitted;
                      echo '<div class="blog-posts-item-meta-author">' . $author_name . '</div>';
                      echo '<div class="blog-posts-item-meta-date">' . $created_str . '</div>';
                    }
                  }
              }
              
            ?>
          <?php if (!$page): ?>
          </div>
          <?php endif; ?>

          <?php print render($title_prefix); ?>
          
              <?php if ($page): ?>
              <h1 class="article-title<?php 
              elseif ($view_mode == 'side_block_teaser'): ?>
              <h4 class="latest-blog-posts-list-item-title<?php 
              else: ?>
              <h2 class="blog-posts-item-title<?php 
                endif;  
                
                $custom_classes = array();

                if (!$node->status) {
                  $custom_classes[] = 'not-published';
                }
                if (!empty($node->field_invisible['und'][0]['value'])) {
                  $custom_classes[] = 'invisible-in-lists';
                }
                if (!empty($custom_classes)) {
                  echo ' ' . implode(' ', $custom_classes);
                }
                 
                // $title_shorter = dk_shorten_title($title);
                $title_shorter = $title;
                

                ?>"><?php if (!isset($node->title_no_link) && !$page): ?><a class="<?php echo ( current_path() == 'blog' ? 'blog-posts-item' : 'latest-blog-posts-list-item' ) ?>-title-link" href="<?php print $node_url; ?>"><?php print $title_shorter; ?></a>
                <?php else: ?><?php print $title; ?><?php endif; ?>
             <?php if ($page): ?></h1>
             <?php elseif ($view_mode == 'side_block_teaser'): ?></h4>
             <?php else: ?></h2>
             <?php endif; ?> 

          <?php //print render($title_suffix);
          if ($page) {
            echo $submitted;
          }
           ?>  

            
            


      <?php if (!$page): ?>
      <div class="<?php echo ( current_path() == 'blog' ? 'blog-posts-item' : 'latest-blog-posts-list-item' ) ?>-content"<?php print $content_attributes; ?>>
      <?php endif; ?>

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
              echo gv_blocks_getSidebarShareStaticBlock($node);
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
                // echo $extra_data['teaser_main_image_beautify'] . $extra_data['teaser_only'];  // Old Blog Page thumb rendering
                echo $extra_data['teaser_only'];
                

                // if (strlen($extra_data['teaser_only']) < 120 ) {
                //   // $content_shortened = substr($extra_data['teaser_only'], 0, 176);
                //   $content_shortened = $extra_data['teaser_only'];
                // } else {
                //   $content_shortened = substr($extra_data['teaser_only'], 0, 120) . '...';
                // }

                // echo $content_shortened;

              } else {
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
      <?php echo (  (current_path() == 'blog' && !empty($extra_data['read_more_html']) ) ? $extra_data['read_more_html'] : ''); ?>
      <?php if (current_path() == 'blog') { // blog-posts-item-wrap ?>
        </div>
      <?php } ?>
      <?php // echo print_r($extra_data) ?>
      </div> <!-- End of content wrap -->


  


<?php if ($page): ?>
      

      <aside class="sidebar" role="complementary">
      <?php 
        echo gv_blocks_getAboutTheAuthor($node->uid); 
        echo gv_blocks_getTop5Providers_article('bu'); 
        echo '<div class="scroll-detector"></div>';
      ?>
      </aside>
      <?php      
      
      // Warning! To work correctly, in node_view additionally added their css files, because they are mot pulled in where kust called here, in template file.
      if (!empty($extra_data['show_exit_intent_v2'])) {
        echo gv_blocks_get_exitIntent_v2();
      }
      elseif (!empty($extra_data['show_exit_intent_v3'])) {
        echo gv_blocks_get_exitIntent_v3();
      }
      
      ?>
      <?php echo gv_blocks_getSidebarRelatedArticlesBlock(NULL, $node, NULL, $extra_data); ?>


  </div> <!-- article-page-wrapper -->
      
  </div>  <!-- main-content -->
  
<?php endif; ?>
    
    
  
  
    

<?php if (!$page): ?>
  </article>
<?php endif; ?>

  


