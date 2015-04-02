<?php if ($is_admin){ ?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php } ?>
	<?php print render($title_suffix); ?>
	<?php print $content ?>
<?php if ($is_admin){ ?>
	</div> <!-- /.block -->
<?php } ?>  

