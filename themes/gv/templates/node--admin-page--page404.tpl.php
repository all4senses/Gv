  <div class="main-content page404"> 

          <!-- <h1><?php //print $title; ?></h1> -->

      <div class="content page"<?php print $content_attributes; ?>>
        <?php
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          print render($content);
          
          // Get content of the Sitemap.
          $key = 'view-sitemap-page';
          $query = db_select('node', 'n');
          $query->join('field_data_field_preface_key', 'pk', "pk.entity_id = n.nid"); 
          $query->join('field_data_body', 'fb', "fb.entity_id = n.nid"); 
          $query->fields('fb', array('body_value'))
                ->condition('n.type', 'preface')
                ->condition('pk.field_preface_key_value', $key);
          $sitemap_body = $query->execute()->fetchField(); 
          echo $sitemap_body;
    
        ?>
      </div>
   
      <div class="bottom-clear"></div>
  

  </div> <!-- <div class="main-content"> -->

