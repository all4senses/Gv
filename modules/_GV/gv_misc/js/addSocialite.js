(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
       
        var loadButtons = function() {
          Socialite.load('.social-buttons');
          $('#header').unbind('mouseenter', loadButtons);
          $('#all-content').unbind('mouseenter', loadButtons);
        };
        
        $('#header').bind('mouseenter', loadButtons);
        $('#all-content').bind('mouseenter', loadButtons);
       
       /*
       $('#header').one('mouseenter', function()
       //$('body').one('mouseenter', function()
       //$('#bshadow').one('mouseover', function()
        {
          Socialite.load('.social-buttons');
        });
        */
    }
  };

}(jQuery));
