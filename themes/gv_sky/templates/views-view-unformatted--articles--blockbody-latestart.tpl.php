<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
// print_r($rows);
$half_count = ceil(count($rows)/2);
?>
<section class="resources">
	<div class="section-title">
		<h2 class="section-title-heading">
			Learn VoIP - <span class="section-title-heading-highlight">Additional Resources</span>
		</h2>
	</div>
	<ul class="resources-list resources-list_first">  
	<?php foreach ($rows as $id => $row): ?>
	  <?php 
	    if ($id == $half_count) {
	      echo '</ul><ul class="resources-list resources-list_second">';
	    }
	  ?>
	  <li class="resources-list-item">
	    <?php print $row; ?>
	  </li>
	<?php endforeach; ?>
	</ul>
</section>