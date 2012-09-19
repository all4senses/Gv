<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <!-- <div class="inside"> -->
<?php else: ?>
  <div class="main-content"> 
<?php endif; ?>

 
  
 
          

      <?php if (!$page): ?>
        <header>
      <?php endif; ?>

        <?php //print $user_picture; ?>

        <?php print render($title_prefix); ?>

          <?php if ($page): ?>
          <h1 <?php print ' ' . /*$title_attributes*/ /*preg_replace('/datatype=".*"/', '', $title_attributes);*/ preg_replace('/datatype=""/', '', $title_attributes); ?>>
          <?php else: ?>
          <h2 <?php print ' ' . /*$title_attributes*/ /*preg_replace('/datatype=".*"/', '', $title_attributes);*/ preg_replace('/datatype=""/', '', $title_attributes); ?>>
          <?php endif; ?>

            
            <?php if (!isset($node->title_no_link) && !$page): ?>
              <a href="<?php print $node_url; ?>">
                <?php print $title; ?>
              </a>
            <?php else: ?>
              <?php print $title; ?>
            <?php endif; ?>

          <?php if ($page): ?>
          </h1>
          <?php else: ?>
          </h2>
          <?php endif; ?> 

        <?php print render($title_suffix); ?>


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
                  
                  
                  
                  $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                  t('By') . ':' .
                                  //'<a href="' . $author_url . '" title="View user profile." class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' .
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


      <?php if (!$page): ?>
        </header>
      <?php endif; ?>



      <div class="content <?php echo ($page ? 'page' : 'teaser'); ?>"<?php print $content_attributes; ?>>
        <?php
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          hide($content['field_topics']);
          
          
          if (!$page) {
            
            // TODO: Temporary check. Should be removed after all articles resave.
            if (isset($node->field_a_teaser['und'][0]['value']) && $node->field_a_teaser['und'][0]['value']) {
              echo $node->field_a_teaser['und'][0]['value'];
            }
            else {
              $teaser_data = gv_misc_getArticleTeaserData('all', $content['body'][0]['#markup'], $node->nid);
              echo $teaser_data['teaser'];
            }
            
            hide($content['body']);
          }
          
          if (isset($content['field_topics']) && (!isset($content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) || !$content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) ) {
            hide($content['metatags']['keywords']);
            gv_misc_pushTagsToMetatags('keywords', $content['field_topics']);
          }
          print render($content);
        ?>
      </div>



      <?php if ($page): ?>
    
                  <footer>

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
                        
                            <?php if(1): ?>

                              <?php 
                                echo gv_blocks_getSocialiteButtons($url, $title); 
                              ?> 

                            <?php else: ?> 
        

                                <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
                                <script type="IN/Share" data-url="<?php echo $url?>" data-counter="right" data-showzero="true"></script>

                                <script type="text/javascript">
                                  (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/plusone.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                  })();
                                </script>
                                <g:plusone size="medium" href="<?php echo $url?>"></g:plusone>

                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=138241656284512";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-like" data-href="<?php echo $url?>" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>

                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                            <?php endif; // Of else of if($user->uid == 1) ?> 
                        
                      </div> <!-- main share buttons -->

                    </div>


                    <?php 
                      $tags = NULL;
                      
                      switch ($node->type) {
                        case 'news_post':
                          $target = 'news';
                          $target_tags_field = 'field_tags_news';
                          break;
                        case 'blog_post':
                          $target = 'blog';
                          $target_tags_field = 'field_tags_blog';
                          break;
                        case 'article':
                          $target = 'articles';
                          $target_tags_field = 'field_tags_articles';
                          break;
                      }
                      dpm($content);
                      global $user;
                      if ($user->uid != 1) {
                        
                        foreach (element_children($content['field_topics']) as $key) {
                          $tags .= ($tags ? '<div class="delim">|</div>' : '') . l(t($content['field_topics'][$key]['#title']), $target . '/tags/' . str_replace(' ', '-', drupal_strtolower($content['field_topics'][$key]['#title'])));
                        }
                        
                      }
                      else {
                        foreach ($$target_tags_field['und'] as $key => $value) {
                          $tags .= ($tags ? '<div class="delim">|</div>' : '') . l(t($content['field_topics'][$key]['#title']), 'taxonomy/term/' . $value['tid']);
                        }
                      }
                      if ($tags) {
                        echo '<div class="topics"><div class="title">' . t('TAGS:') . '</div>' . $tags . '<div class="bottom-clear"></div></div>';
                      }
                      //print render($content['field_topics']); 
                      //print render($content['links']);
                    ?>
                  </footer>
    
    
      <?php endif; ?>
    
      <div class="bottom-clear"></div>
 

  
  
  <?php if ($page && $node->type != 'news_post'): ?>
      
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

  <?php endif; ?>
  
    
  <?php //print render($content['comments']); ?>

<?php if (!$page): ?>
  <!-- </div> --> <!-- /.inside -->
  <!-- <div class="shadow"></div> -->
  </article> <!-- /.node -->
<?php endif; ?>


