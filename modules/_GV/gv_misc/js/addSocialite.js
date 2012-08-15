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
       
       
       //$('#header').one('mouseenter', function()
       //$('body').one('mouseenter', function()
       //$('#bshadow').one('mouseover', function()
       
       var buttonLoaded = false;
       var loadButtons2 = function() {
         console.log('xxx');
          if (!buttonLoaded) {
            buttonLoaded = true;            
            Socialite.load('.social-buttons');
          }
        };
       
       $('#header').one('mouseenter', loadButtons2);
       $('#all-content').one('mouseenter', loadButtons2);
       
    }
  };

}(jQuery));
