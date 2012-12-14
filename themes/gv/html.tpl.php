<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]> <!--> <html class="" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
<head>
  <title><?php global $altered_head_title; if ($altered_head_title) {print $altered_head_title;} else {print $head_title;} ?></title>
  <?php print $head; ?>
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <?php print $styles; ?>
  <?php $args = arg(); 
        if ($args[0] == 'node' && ($args[1] == 'add' || isset($args[2]) && $args[2] == 'edit')) { $top = TRUE; print $scripts; } 
  ?>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body itemscope itemtype="http://schema.org/<?php global $schema_org_type; echo $schema_org_type ? $schema_org_type : 'WebPage'; ?>" class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  
  <?php if (!isset($top)) { print $scripts; } ?>
  
</body>

</html>