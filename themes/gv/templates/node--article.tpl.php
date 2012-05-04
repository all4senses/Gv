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
                dpm($node);
                dpm($content);
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
          hide($content['field_tags']);
          print render($content);
        ?>
      </div>



      <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
        <footer>
          <?php print render($content['field_tags']); ?>
          <?php print render($content['links']); ?>
        </footer>
      <?php endif; ?>

  </div> <!-- main-content -->
 
  
  <?php print render($content['comments']); ?>

<?php if (!$page): ?>
  </div> <!-- /.inside -->
  <div class="shadow"></div>
  </article> <!-- /.node -->
  
<?php endif; ?>
