(function ($) {

  Drupal.behaviors.gv_review_fieldHints = {
    attach: function (context, settings) {
      
      $('input[id="edit-pros"], input[id="edit-cons"]').hint();
    
    }
  };

}(jQuery));