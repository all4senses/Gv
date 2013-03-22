(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       console.log('teeeest');
       
       var buttonLoaded = false;

       $('#header').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
            console.log('teeeest 1');
          }
        });
       $('.content.page').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
            console.log('teeeest 2');
          }
        });
        
        $('.share').one('mouseenter', function() {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
            console.log('teeeest 3');
          }
        });

       
    }
  };

}(jQuery));
