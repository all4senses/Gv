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
	<div class="resources-box">
		<ul class="resources-box-list resources-box-list_first">  
		<?php foreach ($rows as $id => $row): ?>
		  <?php 
		    if ($id == $half_count) {
		      echo '</ul><ul class="resources-box-list resources-box-list_second">';
		    }
		  ?>
		  <li class="resources-box-list-item">
		    <?php print $row; ?>
		  </li>
		<?php endforeach; ?>
		</ul>
	</div>
	<div class="resources-more"><a class="resources-more-link" rel="nofollow" href="/library">View All</a></div>
</section>