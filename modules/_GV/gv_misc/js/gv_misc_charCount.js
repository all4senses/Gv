(function ($) {

  Drupal.behaviors.gv_misc_countChar = {
    attach: function (context, settings) {
      
      $("#edit-metatags-description-value").charCount({
        allowed: 250,		
        warning: 150,
        counterText: 'Characters left: '	
      });
    
    
    }
  };

}(jQuery));