(function ($) {

  Drupal.behaviors.gv_review_fieldHints = {
    attach: function (context, settings) {
      
      $('input[id="edit-field-r-fname"], input[id="edit-field-r-lname"], input[id="edit-field-r-email"], input[id="edit-pros"], input[id="edit-cons"]').hint();
    
    }
  };

}(jQuery));