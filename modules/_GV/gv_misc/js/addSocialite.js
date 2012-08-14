(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       
       $('#block-views-news-block').one('mouseenter', function()
        //$('#main').one('mouseenter', function()
        {
          console.log($(this));
          console.log($(this)[0]);
          
          //Socialite.load($(this)[0]);
          ////Socialite.load($(this));
          
          Socialite.load('#main');
          
        });
    
    }
  };

}(jQuery));