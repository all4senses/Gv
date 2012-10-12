(function ($) {

  Drupal.behaviors.gv_review_fieldHints = {
    attach: function (context, settings) {
      
      //$('input[id="edit-field-r-fname-temp"], input[id="edit-field-r-lname-temp"], input[id="edit-field-r-email-temp"], input[id="edit-pros"], input[id="edit-cons"]').hint();
      
      $('input[id="edit-field-r-fname-temp"], input[id="edit-field-r-lname-temp"], input[id="edit-field-r-email-temp"], input[id="edit-pros"], input[id="edit-cons"]').each(function(){
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
      });
      
      //$('input[id="edit-pros"]').val($('input[id="edit-pros"]').attr('title'));
      
      $('input[id="edit-field-r-fname-temp"], input[id="edit-field-r-lname-temp"], input[id="edit-field-r-email-temp"], input[id="edit-pros"], input[id="edit-cons"]').focus(function(){
        
        if ($(this).val() == $(this).attr('title')) {
          $(this).val('');
          $(this).removeClass('blur');
        }
        
      });
      
      $('input[id="edit-field-r-fname-temp"], input[id="edit-field-r-lname-temp"], input[id="edit-field-r-email-temp"], input[id="edit-pros"], input[id="edit-cons"]').blur(function(){
        
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
        
      });
      
    }
  };

}(jQuery));