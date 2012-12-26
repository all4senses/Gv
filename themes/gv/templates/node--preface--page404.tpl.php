  <div class="main-content page404"> 

          <!-- <h1><?php //print $title; ?></h1> -->

      <div class="content page preface">
        <?php
        
          drupal_set_title('Page Not Found | GetVoIP.com');
        
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          print render($content);
          
          // Get content of the Sitemap.
          $sitemap_body = cache_get('gv_sitemap_body');
          if (!$sitemap_body || empty($sitemap_body->data)) {
            $key = 'view-sitemap-page';
            $query = db_select('node', 'n');
            $query->join('field_data_field_preface_key', 'pk', "pk.entity_id = n.nid"); 
            $query->join('field_data_body', 'fb', "fb.entity_id = n.nid"); 
            $query->fields('fb', array('body_value'))
                  ->condition('n.type', 'preface')
                  ->condition('pk.field_preface_key_value', $key);
            $sitemap_body = $query->execute()->fetchField(); 
            
            // Remove preface text from a Sitemap body.
            if(preg_match('/.*(<table.*)/s', $sitemap_body, $matches)) {
              $sitemap_body = $matches[1];
            }

            cache_set('gv_sitemap_body', $sitemap_body);
          }
          else 
          {
            $sitemap_body = $sitemap_body->data;
          }
        ?>
        <div class="sitemap field-name-body"><?php echo $sitemap_body; ?></div>
        
      </div>
   
      

  </div> <!-- <div class="main-content"> -->

