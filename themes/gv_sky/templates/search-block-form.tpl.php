<div class="container-inline">
  <?php if (empty($variables['form']['#block']->subject)): ?>
    <h3 class="element-invisible"><?php print t('Search form'); ?></h3>
  <?php endif; ?>
  <?php print $search_form; ?>
</div>
