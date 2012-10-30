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
   
        <?php else: ?>
          <header>
        
            <h2<?php //print $title_attributes; ?> property="dc:title v:summary">
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
        
          </header>
        <?php endif; ?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
          
          
           <?php if ($page): ?>
          
              <div class="phone photo">
                <?php
                  if (isset($content['field_p_image'][0]['#item']['uri'])) {
                    echo theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $content['field_p_image'][0]['#item']['alt'], 'title' => $content['field_p_image'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo'))); 
                  }
                ?>
              </div>
                
              <div class="pros-and-cons">
                <div>
                  <span>The good:</span><?php dpm($node); echo 'Good!'; ?>
                </div>
                <div>
                  <span>The bad:</span><?php echo 'Not bad!'; ?>
                </div>
                <div>
                  <span>The bad:</span><?php echo 'Not bad!'; ?>
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
                      <li><a href="#tabs-2">Editor's Rating</a></li>
                      <li><a href="#tabs-3">Technical Specs</a></li>
                      <li><a href="#tabs-4">User Reviews</a></li>
                    </ul>
                    <div id="tabs-1">
                      <?php echo render($content['body']); ?>
                    </div>
                    <div id="tabs-2">
                      <?php echo render($content['body']); ?>
                    </div>
                    <div id="tabs-3">
                      <?php echo render($content['body']); ?>
                    </div>
                    <div id="tabs-4">
                      <?php echo render($content['body']); ?>
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
          
              <?php echo render($content['body']); ?>
          
          
          
          <?php endif; ?>  <!-- if ($page): -->
           
              
          <?php //echo render($content); ?>
          
        </div> <!-- content -->

        
        
      <?php if ($page): ?>
    
        <footer>
        </footer>
    
      <?php endif; ?>
        
      

  </div> <!-- main-content -->
  
  <div class="shadow"></div>
  
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
