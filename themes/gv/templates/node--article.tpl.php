<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="inside">
<?php endif; ?>

  <?php if ($user_picture || $display_submitted || !$page): ?>
    
    <?php if (!$page): ?>
      <header>
    <?php endif; ?>

      <?php print $user_picture; ?>
  
        
        
        
      <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>>
          <?php if (!isset($node->title_no_link)): ?>
            <a href="<?php print $node_url; ?>">
              <?php print $title; ?>
            </a>
          <?php else: ?>
            <?php print $title; ?>
          <?php endif; ?>
        </h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
  
        
        
        
      <?php if ($display_submitted): ?>
        
        <span class="submitted">
          <?php 
            
            print $submitted;
            dpm($node);
            dpm($content);
            
            
          dpm(preg_replace('/(<span.*>)(.*)(<a.*) /', "$1By$3", $submitted));   
              
          ?>
          
          
          <span rel="sioc:has_creator" datatype="xsd:dateTime" content="2012-04-12T12:57:09-04:00" property="dc:date dc:created">
          Published by
          <a class="username" property="foaf:name" typeof="sioc:UserAccount" about="/users/root" xml:lang="" title="View user profile." href="/users/root">Super Boss</a>
          on Thu, 04/12/2012 - 12:57
          </span>
          
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

  <?php print render($content['comments']); ?>

<?php if (!$page): ?>
  </div> <!-- /.inside -->
  <div class="shadow"></div>
  </article> <!-- /.node -->
  
<?php endif; ?>
