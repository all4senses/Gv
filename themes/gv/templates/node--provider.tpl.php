<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

    
<?php

dpm($content);

?>

  <?php if ($page): ?>
    <div class="supertitle"><?php echo t('Our Take on !p Business VoIP Provider', array('!p' => isset($content['field_p_name'][0]['#markup']) ? $content['field_p_name'][0]['#markup'] : '' )) ?></div>
  <?php endif; ?>

        
  <div class="main-content">
    
    
        <?php if (!$page): ?>
          <header>
        
            <?php print render($title_prefix); ?>
            <h2<?php print $title_attributes; ?>>
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
            <?php print render($title_suffix); ?>
        
          </header>
        <?php endif; ?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
          
          
           <?php if ($page): ?>
             
              <?php
                if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                  echo '<div class="logo">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page')) . '</div>'; 
                }
                else {
                  echo render($title_prefix), '<h1', $title_attributes,'><a href="', $node_url, '>', $title, '</a></h1>', render($title_suffix);
                }
              ?>
              <div class="basic-info">
                <div class="title"><?php echo t('Company Contact Info:'); ?></div>
                <div><?php echo $content['i_availability']['#markup']; ?></div>
                <div><?php echo $content['i_web']['#markup']; ?></div>
                <div><?php echo $content['i_founded']['#markup']; ?></div>
                <?php echo isset($content['i_email']['#markup']) ? ('<div>' . $content['i_email']['#markup'] . '</div>') : ''; ?>
              </div>
          
          
              <?php $url = 'http://getvoip.com'. url('node/' . $node->nid); ?>
              <div class="share main">
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
              </div> <!-- main share buttons -->
                      
                      
                      
                      
          
          <?php endif; ?>  
           
              
          <?php
            // Hide already shown anr render the rest.
            hide($content['comments']);
            hide($content['links']);
            hide($content['field_tags']);
            
            hide($content['field_p_logo']);
            hide($content['i_availability']);
            hide($content['i_web']);
            hide($content['i_email']);
            hide($content['i_founded']);
            
            hide($content['reviews_entity_view_1']);

            echo render($content);
          ?>
          
        </div> <!-- content -->

        
        
      <?php if ($page): ?>
    
        <footer>

          <?php 
            if (isset($content['field_topics'])) {
              $tags = NULL;
              foreach (element_children($content['field_topics']) as $key) {
                $tags .= ($tags ? '<div class="delim">|</div>' : '') . l(t($content['field_topics'][$key]['#title']), 'articles/tags/' . str_replace(' ', '-', drupal_strtolower($content['field_topics'][$key]['#title'])));
              }
              if ($tags) {
                echo '<div class="topics"><div class="title">' . t('TAGS:') . '</div>' . $tags . '</div>';
              }
            }
            //print render($content['field_topics']); 
            //print render($content['links']);

          ?>
        </footer>
    
      <?php endif; ?>

  </div> <!-- main-content -->
  
  
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php else: ?>  
  <?php echo render($content['reviews_entity_view_1']); ?>
<?php endif; ?>
