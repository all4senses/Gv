(function ($) {

  Drupal.behaviors.gv_quotePage_fieldHints = {
    attach: function (context, settings) {
      
      //$('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"]').hint();
      
      // Init set.
      $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"], input[id="q-title"]').each(function(){
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
      });
      
      //$('input[id="edit-pros"]').val($('input[id="edit-pros"]').attr('title'));
      // Focus.
      $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"], input[id="q-title"]').focus(function(){
        
        if ($(this).val() == $(this).attr('title')) {
          $(this).val('');
        }
        $(this).removeClass('blur');
        
      });
      
      // Blur.
      $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"], input[id="q-title"]').blur(function(){
        
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
        
      });
      
    }
  };

}(jQuery));