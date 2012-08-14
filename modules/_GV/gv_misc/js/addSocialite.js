(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       
       $('#header').one('mouseenter', function()
        {
          //Socialite.load($(this)[0]); // Works
          ////Socialite.load($(this)); // Works
          
          Socialite.load('.social-buttons');
          
        });
    
    }
  };

}(jQuery));