(function ($) {

  Drupal.behaviors.gv_review_fieldHints = {
    attach: function (context, settings) {
      
      $('input[id="edit-field-r-fname-temp"], input[id="edit-field-r-lname-temp"], input[id="edit-field-r-email-temp"], input[id="edit-pros"], input[id="edit-cons"]').hint();
    
    }
  };

}(jQuery));