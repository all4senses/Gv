
<div class="profile"<?php print $attributes; ?>>  
  <?php 
 
    $is_reviewer = strpos($_SERVER['REQUEST_URI'], 'reviewers/') !== FALSE ? TRUE : FALSE;
  
    print render($user_profile['metatags']);
    
    $user_name = @$user_profile['field_u_fname'][0]['#markup'] . ' ' . @$user_profile['field_u_lname'][0]['#markup'];
    
    echo '<h1 id="user-caption">Meet' . ($is_reviewer ? ' our reviewer' : '') . ': ' , $user_name, '</h1>', render($user_profile['user_picture']), render($user_profile['field_u_bio']),  '<div class="bottom-clear"></div>';
    
    if (!$is_reviewer) {
      $articles = $user_profile['field_u_fname']['#object']->name == 'guest' ? views_embed_view('articles','block_all_by_guest') : views_embed_view('articles','block_all_by_author');

      if ($articles) {
        echo '<div id="articles-caption">', t('Read some of !author\'s latest articles below:', array('!author' => @$user_profile['field_u_fname'][0]['#markup'])), '</div>', $articles;
      }
    }
    
    ?>
  
 </div>
