<!DOCTYPE html>

<?php 
  global $schema_org_type;
  $itemscope = ' itemscope itemtype="http://schema.org/' . ($schema_org_type ? $schema_org_type : 'WebPage') . '"';
?>

<!--[if lt IE 7]> <html <?php echo $itemscope; ?> class="ie6 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>    <html <?php echo $itemscope; ?> class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html <?php echo $itemscope; ?> class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]> <!--> <html <?php echo $itemscope; ?> class="" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
  
<head>
  <title><?php global $altered_head_title; if ($altered_head_title) {print $altered_head_title;} else {print $head_title;} ?></title>
  <?php print $head; ?>
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <?php 
    global $user;
    if ($user->uid == 1) {
      print $styles; 
    }
  ?>
  <?php $args = arg(); 
        if ($args[0] == 'node' && (@$args[1] == 'add' || isset($args[2]) && $args[2] == 'edit')) { $top = TRUE; print $scripts; } 
  ?>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>

<body <?php //echo $itemscope; ?> class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  
  <?php 
    if ($user->uid != 1) {
      print $styles; 
    }
    if (!isset($top)) { print $scripts; } 
  ?>
  <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6005656184574&amp;value=0" /></noscript>
  
</body>

</html>