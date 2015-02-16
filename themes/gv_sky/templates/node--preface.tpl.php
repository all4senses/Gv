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
  

<!-- <a href="https://plus.google.com/+Getvoip?rel=author"></a> -->
  <?php 
     
      // Define if this page should contain G+ provile link and authorship,
      // And if it's a ALL reviews page.
      $pages_with_gplus_author_keys = array(/*'front', 'view-reviews-page_all_reviews', 'view-news-page', 'view-blog-page'*/);
      $current_is_reviews = FALSE;
      $current_is_with_gplus_author = FALSE;
      
      if (isset($node->field_preface_key['und'][0]['value']) && in_array($node->field_preface_key['und'][0]['value'], $pages_with_gplus_author_keys)) {
        $current_is_with_gplus_author = TRUE;
        if ($node->field_preface_key['und'][0]['value'] == 'view-reviews-page_all_reviews') {
          $current_is_reviews =  TRUE;
        }
      }
      
      
      //$url = 'http://getvoip.com' . ($_GET['q'] == 'home' ? '' : $_SERVER['REQUEST_URI']);

      
//      $url = 'http://getvoip.com' . ($_GET['q'] == 'home' ? '' : gv_misc_getOlderUrlForSharing($_SERVER['REQUEST_URI']));
//
//      $share_title = NULL;
//
//      if ($is_front) {
//        $share_title = gv_misc_metatag_getFrontTitle();
//      }
//
//      if (!$share_title) {
//        if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
//          $share_title = $node->metatags['title']['value'];
//        }
//        else {
//          $share_title = $title;
//        }
//      }
//
//      echo '<div class="float share">' . gv_blocks_getSocialiteButtons($url, $share_title) . '</div>';

  
  ?>

    <h1 class="preface"><?php 
          echo $title; 
          // Add G+ provile link and authorship for some pages.
          if ($current_is_with_gplus_author) {
            echo ' <a title="Google+ profile" href="https://plus.google.com/u/0/111924926980254330731?rel=author"></a>';
          }
        ?></h1>



  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>

  <div class="content page preface" 
    <?php 
    echo $content_attributes;
//    if ($current_is_reviews) {
//      echo ' xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate"';
//    }
  ?>>
    
    <?php
//      if ($current_is_reviews) {
//        echo '<div id="all-reviews-snippet">Total of <span id="count" property="v:count">99</span> Reviews for all <span id="itemreviewed" property="v:itemreviewed">VoIP Providers</span><span class="rating-descr" style="display: none;">, with top rating of <span id="rating" property="v:rating">5</span></span>';
//      }
      
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      
      if (@$node->field_display_type['und'][0]['value'] != 1) {
        hide($content['field_preface_bottom']);
      }

      print render($content);
    
      
    ?>
    
     <div class="share">
       <div class="main">
        
              <?php
//                if ($user->uid != 1) {
//                  
//                  $share_title = NULL;
//
//                  if ($is_front) {
//                    $share_title = gv_misc_metatag_getFrontTitle();
//                  }
//
//                  if (!$share_title) {
//                    if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
//                      $share_title = $node->metatags['title']['value'];
//                    }
//                    else {
//                      $share_title = $title;
//                    }
//                  }
//                  echo gv_blocks_getSocialiteButtons($url, $share_title); 
//
//                }
              ?> 

        
       </div><!-- main -->
      </div> <!-- share buttons -->
    <?php //endif; ?>
      
  </div>
