<?php if (!$page): ?>

    <?php if (in_array('administrator', $user->roles)): ?>
      <div class="tabs-wrapper clearfix"><h3 class="element-invisible">Primary tabs</h3>
        <ul class="tabs primary clearfix">
          <li class="active"><a class="active" href="/<?php echo $_GET['q']; ?>">View<span class="element-invisible">(active tab)</span></a></li>
          <li><a href="<?php echo url('node/' . $node->nid . '/edit', array('query' => array('destination' => $_GET['q']))); ?>">Edit</a></li>
          <!--<li><a href="<?php //echo url('node/' . $node->nid . '/devel', array('query' => array('destination' => $_GET['q']))); ?>">Devel</a></li>-->
        </ul>
      </div>
    <?php endif; ?> <!-- if (in_array('administrator', $user->roles))-->
  
<?php endif; ?> <!-- if (!$page) -->
    

  <?php //print $user_picture; ?>


  <?php 
      echo render($title_prefix); 
      
      // Define if this page should contain G+ provile link and authorship,
      // And if it's a ALL reviews page.
      $pages_with_gplus_author = array('/providers/reviews', '/news', '/blog');
      
      if (isset($_SERVER['REDIRECT_URL']) && in_array($_SERVER['REDIRECT_URL'], $pages_with_gplus_author)) {
        $current_is_with_gplus_author = TRUE;
        if ($_SERVER['REDIRECT_URL'] == '/providers/reviews') {
          $current_is_reviews =  TRUE;
        }
      }
      else {
        $current_is_with_gplus_author = FALSE;
        $current_is_reviews = FALSE;
      }
  
  ?>

    <h1 class="preface" <?php /*echo preg_replace('/datatype=""/', '', $title_attributes);*/ if ($current_is_reviews) {echo ' property="dc:title v:summary"';} else {echo preg_replace('/datatype=""/', '', $title_attributes);} ?>>
        <?php 
          echo $title; 
          // Add G+ provile link and authorship for some pages.
          if ($current_is_with_gplus_author) {
            //echo ' <a class="gplus" title="Google+ profile of Samantha Kleary" href="https://plus.google.com/u/0/111924926980254330731?rel=author">(G+)</a>';
            echo ' <a class="gplus" title="Google+ profile" href="https://plus.google.com/u/0/111924926980254330731?rel=author">(G+)</a>';
          }
        ?>
    </h1>

  <?php print render($title_suffix); ?>


  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>

  <div class="content page preface" 
    <?php 
    echo $content_attributes;
    if ($current_is_reviews) {
      echo ' xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate"';
    }
  ?>>
    
    <?php
      if ($current_is_reviews) {
        echo '<div id="all-reviews-snippet"><span id="count" property="v:count">99</span> Reviews for <span id="itemreviewed" property="v:itemreviewed">VoIP Providers</span><span class="rating-descr">, with average rating of <span id="rating" rel="v:rating"><span property="v:best">5</span></span></span>';
      }
      
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      
      if (@$node->field_display_type['und'][0]['value'] != 1) {
        hide($content['field_preface_bottom']);
      }

      print render($content);
    
      $url = 'http://getvoip.com' . ($_GET['q'] == 'home' ? '' : $_SERVER['REQUEST_URI']); // . ($_GET['q'] == 'home' ? '/' : (strpos($_GET['q'], 'node/') === FALSE ? ('/' . $_GET['q']) : url($_GET['q'])));
    ?>
    
     <div class="share">
       <div class="main">
        
        <?php global $user; if(/*$user->uid != */1): ?>
              
              <?php
              
                $share_title = NULL;
                
                if ($is_front) {
                  $share_title = gv_misc_metatag_getFrontTitle();
                }
                
                if (!$share_title) {
                  if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
                    $share_title = $node->metatags['title']['value'];
                  }
                  else {
                    $share_title = $title;
                  }
                }
                echo gv_blocks_getSocialiteButtons($url, $share_title); 
              
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
        
       </div><!-- main -->
      </div> <!-- share buttons -->
    <?php //endif; ?>
      
  </div>
