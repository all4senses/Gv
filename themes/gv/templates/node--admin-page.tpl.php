<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <!-- <div class="inside"> -->
<?php else: ?>
  <div class="main-content"> 
<?php endif; ?>
          

      <?php if (!$page): ?>
        <header>
      <?php endif; ?>

        <?php print $user_picture; ?>

        <?php print render($title_prefix); ?>

          <?php if ($page): ?>
          <h1<?php else: ?>
          <h2<?php endif; ?><?php print /*$title_attributes;*/ preg_replace('/datatype=""/', '', $title_attributes); ?>>
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

        <!--
          <span class="submitted">
            <?php 
              /*
              $created_str = '<span class="delim">|</span>' . date('F d, Y \a\t g:sa', $node->created); 
              global $user;
              if ($user->uid && $node->uid) {
                print preg_replace('/(<span.*>)(.*)(<a.*a>)(.*)(<\/span>)/', "$1By$3$created_str$5", $submitted);
              }
              elseif (!$node->uid) {
                print preg_replace('/(<span.*>)(.*)(<span.*span>)(.*)(<\/span>)/', "$1By $3 $created_str$5", $submitted);
              }
              // Make a link for an authors profile from just a Name.
              else {
                print preg_replace('/(<span.*>)(.*)<span(.*)(about=")(.*)(".*)>(.*)<\/span>.*(<\/span>)/', "$1By<a href=" . '"$5"' . "$3$4$5$6>$7</a>$created_str$8", $submitted);
              }
              */
            ?>
          </span>
        -->

      <?php if (!$page): ?>
        </header>
      <?php endif; ?>



      <div class="content <?php echo ($page ? 'page' : 'teaser'); ?>"<?php print $content_attributes; ?>>
        <?php
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          hide($content['field_topics']);
          print render($content);
        ?>
      </div>


    
      <div class="bottom-clear"></div>
 

  

<?php if (!$page): ?>
  <!-- </div> --> <!-- /.inside -->
  <!-- <div class="shadow"></div> -->
  </article> <!-- /.node -->
<?php else: ?>
  </div> <!-- <div class="main-content"> -->
<?php endif; ?>

 <?php 
 
 global $user;
 if ($user->uid == 1):
 ?>
  
  <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone"></a>
<a class="addthis_button_linkedin_counter"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true, "ui_language":"en_us"};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-50253baf64925d35"></script>
<!-- AddThis Button END -->

 <?php endif; ?>

