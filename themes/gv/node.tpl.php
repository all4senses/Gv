<?php if (!$page): ?>

  <?php if ($node->type == 'preface'): ?>
    <?php if (in_array('administrator', $user->roles)): ?>
      <div class="tabs-wrapper clearfix"><h2 class="element-invisible">Primary tabs</h2>
        <ul class="tabs primary clearfix">
          <li class="active"><a class="active" href="/<?php echo $_GET['q']; ?>">View<span class="element-invisible">(active tab)</span></a></li>
          <li><a href="<?php echo url('node/' . $node->nid . '/edit', array('query' => array('destination' => $_GET['q']))); ?>">Edit</a></li>
          <!--<li><a href="<?php //echo url('node/' . $node->nid . '/devel', array('query' => array('destination' => $_GET['q']))); ?>">Devel</a></li>-->
        </ul>
      </div>
    <?php endif; ?> <!-- if (in_array('administrator', $user->roles))-->
  <?php else: ?> <!-- if ($node->type == 'preface') -->
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="inside">
    
    <header>
  <?php endif; ?> <!-- if ($node->type != 'preface') -->
  
<?php endif; ?> <!-- if (!$page) -->
    

      <?php print $user_picture; ?>
  

          <?php print render($title_prefix); ?>
        
            <?php if ($page || $node->type == 'preface'): ?>
            <h1
            <?php else: ?>
            <h2
            <?php endif; ?>

            <?php print $title_attributes; ?>>
              <?php if (!isset($node->title_no_link) && !$page): ?>
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
              <?php else: ?>
                <?php print $title; ?>
              <?php endif; ?>
            
            <?php if ($page || $node->type == 'preface'): ?>
            </h1>
            <?php else: ?>
            </h2>
            <?php endif; ?> 
        
        

          <?php print render($title_suffix); ?>

  
      <?php if ($display_submitted): ?>
        <span class="submitted"><?php print $submitted; ?></span>
      <?php endif; ?>

    <?php if (!$page && $node->type != 'preface'): ?>
      </header>
    <?php endif; ?>
    

  <div class="content <?php echo ($page || $node->type == 'preface') ? 'page' : 'teaser'; ?>"<?php print $content_attributes; ?>>
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

  <?php print render($content['comments']); ?>

<?php if (!$page && $node->type != 'preface'): ?>
  </div> <!-- /.inside -->
  <div class="shadow"></div>
  </article> <!-- /.node -->
<?php endif; ?>
