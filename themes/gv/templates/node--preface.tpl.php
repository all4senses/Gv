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


  <?php print render($title_prefix); ?>

    <h1 class="preface" <?php print /*$title_attributes*/preg_replace('/datatype=""/', '', $title_attributes); ?>>
        <?php print $title; ?>
    </h1>

  <?php print render($title_suffix); ?>


  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>

  <div class="content page preface"<?php print $content_attributes; ?>>
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      
      hide($content['field_preface_bottom']);
      print render($content);
    
      $url = 'http://getvoip.com' . ($_GET['q'] == 'home' ? '' : $_SERVER['REQUEST_URI']); // . ($_GET['q'] == 'home' ? '/' : (strpos($_GET['q'], 'node/') === FALSE ? ('/' . $_GET['q']) : url($_GET['q'])));
    ?>
    
     <div class="share">
       <div class="main">
        
        <?php 
              // No significant improvements with addthis buttons set... It bacame even slower.
              /*global $user; if($user->uid == 1): ?> 
         

              <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style ">
            <a class="addthis_button_linkedin_counter"></a>
            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
            <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:locale="en_US"></a>
            <a class="addthis_button_tweet"></a>
            </div>
            <script type="text/javascript">var addthis_config = {"data_track_addressbar":true, ui_language:"en", locale:"en_US"};</script>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-50253baf64925d35"></script>
            <!-- AddThis Button END -->

         <?php else: */?> 
         
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
        
        <?php //endif; ?> 
        
       </div><!-- main -->
      </div> <!-- share buttons -->
    <?php //endif; ?>
      
  </div>
