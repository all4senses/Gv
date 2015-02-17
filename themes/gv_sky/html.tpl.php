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
<script type="text/javascript" src="http://localhost:48626/takana.js"></script>
     <script type="text/javascript">
       takanaClient.run({host: 'localhost:48626'});
     </script>  
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  
  <?php if (!isset($top)) { print $scripts; } ?>
  <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6005656184574&amp;value=0" /></noscript>
  
</body>

</html>