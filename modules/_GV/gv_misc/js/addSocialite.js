(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       
       Socialite.load('.social-buttons');
       /*
       $('#header').one('mouseenter', function()
        {
          Socialite.load('.social-buttons');
        });
        */
    
    }
  };

}(jQuery));