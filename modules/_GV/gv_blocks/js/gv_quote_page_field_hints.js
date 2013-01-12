(function ($) {

  Drupal.behaviors.gv_quotePage_fieldHints = {
    attach: function (context, settings) {
      
      //$('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"]').hint();
      
      $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"]').each(function(){
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
      });
      
      //$('input[id="edit-pros"]').val($('input[id="edit-pros"]').attr('title'));
      
      $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"]').focus(function(){
        
        if ($(this).val() == $(this).attr('title')) {
          $(this).val('');
          $(this).removeClass('blur');
        }
        
      });
      
      $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"]').blur(function(){
        
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
        
      });
      
    }
  };

}(jQuery));