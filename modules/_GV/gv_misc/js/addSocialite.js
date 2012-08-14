(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
        $('#main').one('mouseenter', function()
        {
          console.log($(this));
          console.log($(this)[0]);
          
          Socialite.load($(this)[0]);
        });
    
    }
  };

}(jQuery));