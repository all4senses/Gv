
  <h1 class="preface" <?php /*echo preg_replace('/datatype=""/', '', $title_attributes);*/ if ($current_is_reviews) {echo ' property="dc:title v:summary"';} else {echo preg_replace('/datatype=""/', '', $title_attributes);} ?>>
      <?php 
        echo $title; 
      ?>
  </h1>

  <div class="content page preface" <?php echo $content_attributes;?>>
    
  <?php

    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);

    hide($content['field_preface_bottom']);

    echo render($content);
    
    echo 'teeeeeest';

    if (@$node->field_display_type['und'][0]['value'] == 1) {
      render($content['field_preface_bottom']);
    }
    
  ?>

     <div class="share">
       <div class="main">
        
              <?php
              
                if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
                  $share_title = $node->metatags['title']['value'];
                }
                else {
                  $share_title = $title;
                }

                $url = 'http://getvoip.com' . $_SERVER['REQUEST_URI']; 
                echo gv_blocks_getSocialiteButtons($url, $share_title); 
              
              ?> 

           </div> <!-- main -->
      </div> <!-- share buttons -->
    <?php //endif; ?>
      
  </div>
