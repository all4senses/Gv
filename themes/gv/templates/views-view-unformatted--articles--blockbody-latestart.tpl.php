<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
echo 'xxx';
dpm($rows);
$half_count = (int) count($rows)/2;
dpm('$half_count = ' . $half_count);
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="col one">  
<?php foreach ($rows as $id => $row): ?>
  <?php 
    if ($id == $half_count) {
      echo '</div><div class="col two">';
    }
  ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
</div>
