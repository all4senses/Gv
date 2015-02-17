
<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>
<div class="views-exposed-form">
  <div class="views-exposed-widgets clearfix">
    
    <?php foreach ($widgets as $id => $widget): ?>
      <div id="<?php print $widget->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
        <?php if (!empty($widget->label)): ?>
          <label for="<?php print $widget->id; ?>">
            <?php print $widget->label; ?>
          </label>
        <?php endif; ?>
        <?php if (!empty($widget->operator)): ?>
          <div class="views-operator">
            <?php print $widget->operator; ?>
          </div>
        <?php endif; ?>
        <div class="views-widget">
          <?php print $widget->widget; ?>
        </div>
      </div>
    <?php endforeach; ?>
    
    <?php if (!empty($sort_by)): ?>
      <div class="views-exposed-widget views-widget-sort-by">
        <?php 
          // a4s changes 
          $gv_sort_by = NULL;
          if(strpos($sort_by, 'selected="selected">Post date')) {
            $gv_sort_by = 'Post date';
          }
          elseif(strpos($sort_by, 'selected="selected">Rating')) {
            $gv_sort_by = 'Rating';
          }
          print $sort_by; 
        
        ?>
      </div>
      <div class="views-exposed-widget views-widget-sort-order">
        <?php 
          // a4s changes 
          switch ($gv_sort_by) {
            case 'Post date':
              $sort_order = str_replace('>Asc<', '>Oldest<', $sort_order);
              $sort_order = str_replace('>Desc<', '>Newest<', $sort_order);
              break;
            
            case 'Rating':
              $sort_order = str_replace('>Asc<', '>Lowest Rating<', $sort_order);
              $sort_order = str_replace('>Desc<', '>Highest Rating<', $sort_order);
              break;
          }
          print $sort_order; 
        ?>
      </div>
    <?php endif; ?>
    
    
    <?php if (!empty($items_per_page)): ?>
      <div class="views-exposed-widget views-widget-per-page">
        <?php print $items_per_page; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($offset)): ?>
      <div class="views-exposed-widget views-widget-offset">
        <?php print $offset; ?>
      </div>
    <?php endif; ?>
    <div class="views-exposed-widget views-submit-button">
      <?php print $button; ?>
    </div>
    <?php if (!empty($reset_button)): ?>
      <div class="views-exposed-widget views-reset-button">
        <?php print $reset_button; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
