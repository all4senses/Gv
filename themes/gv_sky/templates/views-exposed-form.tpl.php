
<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>
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
      <div class="reviews-filter-object reviews-filter-sort">
        <?php 
          // a4s changes 
          $gv_sort_by = NULL;
          if(strpos($sort_by, 'selected="selected">Post date')) {
            $gv_sort_by = 'Post date';
          }
          elseif(strpos($sort_by, 'selected="selected">Rating')) {
            $gv_sort_by = 'Rating';
          }

          // dk version
          $dk_sort_by = '<span class="reviews-filter-object-title">Sort By</span>
                          <span class="reviews-filter-object-option date active">Date</span>
                          <span class="reviews-filter-object-option-divider"></span>
                          <span class="reviews-filter-object-option rating">Rating</span>
          ';
          


          // print $sort_by; 
          print $dk_sort_by; 
        
        ?>
      </div>
      <div class="reviews-filter-object reviews-filter-order">
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

          // dk version
          $dk_sort_order = '<span class="reviews-filter-object-title">Order By</span>
                          <span class="reviews-filter-object-option asc">Asc</span>
                          <span class="reviews-filter-object-option-divider"></span>
                          <span class="reviews-filter-object-option desc active">Desc</span>
          ';

          // print $sort_order; 
          print $dk_sort_order; 
        ?>
      </div>
    <?php endif; ?>
    