(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       console.log('teeeest');
       
       var buttonLoaded = false;

       $('#header').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        });
       $('.content.page').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        });
        
        $('.share').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        });

       
    }
  };

}(jQuery));
