<div class="profile"<?php print $attributes; ?>>  
  <?php 
    $is_reviewer = strpos($_SERVER['REQUEST_URI'], 'reviewers/') !== FALSE ? TRUE : FALSE;
    // dpm($user_profile);
  
    print render($user_profile['metatags']);
    
    $user_name = @$user_profile['field_u_fname'][0]['#markup'] . ' ' . @$user_profile['field_u_lname'][0]['#markup'];
  ?>
  <div class="team-member">
    <div class="team-member-pic">
      <?php echo render($user_profile['user_picture']) ?>
    </div>

    <div class="team-member-details">
      <h1 class="team-member-details-name"><?php echo $user_name ?></h1>
      <ul class="team-member-details-meta">
        <li class="team-member-details-meta-item"><?php echo ( isset($user_profile['field_u_position']['#items']['0']['value']) ? $user_profile['field_u_position']['#items']['0']['value'] : 'GetVoIP Staff Member'); ?></li>
        <li class="team-member-details-meta-item"><?php echo 'Member for ' . $user_profile['summary']['member_for']['#markup'] ?></li>
      </ul>
    </div>
  </div>
  <div class="team-member-summary">
    <?php echo render($user_profile['field_u_bio']) ?>
  </div>
  <div class="latest-posts-list">
  <?php 
        
    if (!$is_reviewer) {
      $articles = $user_profile['field_u_fname']['#object']->name == 'guest' ? views_embed_view('articles','block_all_by_guest') : views_embed_view('articles','block_all_by_author');
      $load_more = '<div class="blog-posts-load">Load More</div>';
      // $articles = $view->preview('block_all_by_author', '[]');

      if ($articles) {
        echo '<h2 class="latest-posts-title">', t('Read some of !author\'s latest articles below:', array('!author' => @$user_profile['field_u_fname'][0]['#markup'])), '</h2>', $articles;
      }
    }
    
    ?>
  </div>
  <?php echo @$load_more ?>
 </div>
