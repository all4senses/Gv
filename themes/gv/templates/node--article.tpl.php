<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="inside">
<?php endif; ?>

 
  <div class="main-content">
 
          
      <?php if ($user_picture || $display_submitted || !$page): ?>

        <?php if (!$page): ?>
          <header>
        <?php endif; ?>

          <?php print $user_picture; ?>


 
          <?php //if (!$page): ?>
          <?php print render($title_prefix); ?>
          
            <?php if (!$page): ?>
            <h2
            <?php else: ?>
            <h1
            <?php endif; ?>
              
              <?php print $title_attributes; ?>>
              <?php if (!isset($node->title_no_link) && !$page): ?>
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
              <?php else: ?>
                <?php print $title; ?>
              <?php endif; ?>
              
            <?php if (!$page): ?>
            </h2>
            <?php else: ?>
            </h1>
            <?php endif; ?> 
            
          
          <?php print render($title_suffix); ?>
          <?php //endif; ?>



          <?php if ($display_submitted): ?>

            <span class="submitted">
              <?php 
                $created_str = '<span class="delim">|</span>' . date('F d, Y \a\t g:sa', $node->created); 
                print preg_replace('/(<span.*>)(.*)(<a.*a>)(.*)(<\/span>)/', "$1By$3$created_str$5", $submitted);
                //dpm($node);
                //dpm($content);
              ?>
            </span>

          <?php endif; ?>

        <?php if (!$page): ?>
          </header>
        <?php endif; ?>

      <?php endif; ?>

      <div class="content"<?php print $content_attributes; ?>>
        <?php
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          hide($content['field_topics']);
          print render($content);
        ?>
      </div>



      <footer>
        
        <div class="share">
          
          <?php $url = 'http://getvoip.com'. url('node/' . $node->nid); ?>
          
          <div class="others">
            
          </div>
          
          <div class="main">
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
              js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=138241656284512";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like" data-href="<?php echo $url?>" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false"></div>

            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            
          </div> <!-- main share buttons -->
          
        </div>
        
        
        <?php 
          $tags = NULL;
          foreach (element_children($content['field_topics']) as $key) {
            $tags .= ($tags ? '<div class="delim>|</div>"' : '') . l(t($content['field_topics'][$key]['#title']), 'articles/topic/' . str_replace(' ', '-', drupal_strtolower($content['field_topics'][$key]['#title'])));
          }
          if ($tags) {
            echo '<div class="topics"><span class="title">' . t('TAGS:') . '</span>' . $tags . '</div>';
          }
          //print render($content['field_topics']); 
          //print render($content['links']);
        ?>
      </footer>

  </div> <!-- main-content -->
 
  
  <?php print render($content['comments']); ?>

<?php if (!$page): ?>
  </div> <!-- /.inside -->
  <div class="shadow"></div>
  </article> <!-- /.node -->
  
<?php endif; ?>
