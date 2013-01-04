(function ($) {

  Drupal.behaviors.gv_newsletterSubscribe_fieldHints = {
    attach: function (context, settings) {
      
      $('#gv-misc-newslettersubscribe-form input[id="edit-email"]').each(function(){
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
      });
      
      $('#gv-misc-newslettersubscribe-form input[id="edit-email"]').focus(function(){
        
        if ($(this).val() == $(this).attr('title')) {
          $(this).val('');
          $(this).removeClass('blur');
        }
        
      });
      
      $('#gv-misc-newslettersubscribe-form input[id="edit-email"]').blur(function(){
        
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
        
      });
      
    }
  };

}(jQuery));