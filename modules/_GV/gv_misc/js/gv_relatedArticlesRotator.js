(function ($) {

  Drupal.behaviors.vr_homeBannerRotator = {
    attach: function (context, settings) {
       
      //$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true); // for a Version of UI > 1.9
      $("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 30000, true);
       
      // Pause on hover.
      $("#featured").hover(  
          function() {  
            $("#featured").tabs("rotate",0,true);  
          },  
          function() {  
            $("#featured").tabs("rotate",30000,true);  
          }  
      );  
       
    }
  };

}(jQuery));
