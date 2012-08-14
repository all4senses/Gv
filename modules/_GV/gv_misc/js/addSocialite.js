(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       //$('#header').one('mouseenter', function()
       $('body').one('mouseenter', function()
        {
          Socialite.load('.social-buttons');
        });
    
    }
  };

}(jQuery));
