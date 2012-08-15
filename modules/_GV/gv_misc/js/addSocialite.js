(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       var buttonLoaded = false;

       $('#header').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        });
       $('.content').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        });
        /*
        $('.share').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        });
        */
       
    }
  };

}(jQuery));
