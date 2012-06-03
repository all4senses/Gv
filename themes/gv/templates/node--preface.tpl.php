<?php if (!$page): ?>

    <?php if (in_array('administrator', $user->roles)): ?>
      <div class="tabs-wrapper clearfix"><h2 class="element-invisible">Primary tabs</h2>
        <ul class="tabs primary clearfix">
          <li class="active"><a class="active" href="/<?php echo $_GET['q']; ?>">View<span class="element-invisible">(active tab)</span></a></li>
          <li><a href="<?php echo url('node/' . $node->nid . '/edit', array('query' => array('destination' => $_GET['q']))); ?>">Edit</a></li>
          <!--<li><a href="<?php //echo url('node/' . $node->nid . '/devel', array('query' => array('destination' => $_GET['q']))); ?>">Devel</a></li>-->
        </ul>
      </div>
    <?php endif; ?> <!-- if (in_array('administrator', $user->roles))-->
  
<?php endif; ?> <!-- if (!$page) -->
    

  <?php print $user_picture; ?>


  <?php 
  
  dpm($title_attributes); 
  $tmp = preg_replace('/datatype=""/', '', $title_attributes);
  dpm($tmp);
  
  print render($title_prefix); 
  ?>

    <h1<?php print $title_attributes; ?>>
        <?php print $title; ?>
    </h1>

  <?php print render($title_suffix); ?>


  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>

  <div class="content page"<?php print $content_attributes; ?>>
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      print render($content);
    ?>
  </div>
