(function ($) {

  Drupal.behaviors.gv_addSocialite = {
    attach: function (context, settings) {
       
//        console.log('point 1');
//        var loadButtons = function() {
//          console.log('in func');
//          console.log($(this));
//          Socialite.load('.social-buttons');
//          $('#header').unbind('mouseenter', loadButtons);
//          $('#all-content').unbind('mouseenter', loadButtons);
//        };
//        console.log('point 2');
//        $('#header').bind('mouseenter', loadButtons);
//        $('#all-content').bind('mouseenter', loadButtons);
       
       var buttonLoaded = false;
       //$('#header').one('mouseenter', function()
       //$('body').one('mouseenter', function()
       //$('#bshadow').one('mouseover', function()
       $('#main').one('mouseenter', function()
       {
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        });
        
        $('#header').one('mouseenter', function()
        {
          if (!buttonLoaded) {
            buttonLoaded = true;
            Socialite.load('.social-buttons');
          }
        });
       
    }
  };

}(jQuery));
