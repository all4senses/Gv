<!DOCTYPE html>

<?php 
  global $schema_org_type;
  $itemscope = ' itemscope itemtype="http://schema.org/' . ($schema_org_type ? $schema_org_type : 'WebPage') . '"';
?>

<html <?php echo $itemscope; ?> class="" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
  
<head>
  <title><?php global $altered_head_title; if ($altered_head_title) {print $altered_head_title;} else {print $head_title;} ?></title>
  <?php print $head; ?>
  
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  
  <?php print $styles; ?>
  <?php $args = arg(); 
        if ($args[0] == 'node' && (@$args[1] == 'add' || isset($args[2]) && $args[2] == 'edit')) { $top = TRUE; print $scripts; } 
  ?>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/global.css">
  <?php if ($is_front) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/home.css">
  <?php } ?>
  <?php if ( current_path() == 'blog' ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/blog.css">
  <?php } ?>
  <?php if ( strpos(request_path(), 'blog/') !== FALSE || strpos(request_path(), 'library/') !== FALSE ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/blog.css">
  <?php } ?>
  <?php if ( current_path() == 'node/add/review' ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/submit-review.css">
  <?php } ?>
  <?php if ($is_admin) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/admin.css">
  <?php } ?>
  <?php if ( strpos(request_path(), 'reviews/phone') !== FALSE ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/review.css">
  <?php } ?>
  <?php if ( current_path() == 'node/38' ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/about.css">
  <?php } ?>
  <?php if ( strpos(current_path(), 'user/') !== FALSE ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/team-member.css">
  <?php } ?>
  <?php if ( current_path() == 'node/62' ||  current_path() == 'node/91' ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/contact.css">
  <?php } ?>
  <?php if ( strpos(request_path(), 'reviews') !== FALSE && strpos(request_path(), 'reviews/phone') === FALSE ) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/provider.css">
  <?php } ?>
  <?php if ($is_front) {?>
    <link rel="stylesheet" href="/sites/all/themes/gv_sky/css/home.css">
  <?php } ?>

      <script type="text/javascript" src="http://localhost:48626/takana.js"></script>
     <script type="text/javascript">
       takanaClient.run({host: 'localhost:48626'});
     </script>





<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  
  <?php if (!isset($top)) { print $scripts; } ?>
  <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6005656184574&amp;value=0" /></noscript>
  
</body>

</html>