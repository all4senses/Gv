(function ($) {

  Drupal.behaviors.gv_relatedArticlesRotator = {
    attach: function (context, settings) {
       
      //$("#rotator > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true); // for a Version of UI > 1.9
      
      $("#rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 30000, true);
      //$("#rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 3000, true);
      
      // Pause on hover.
      $("#rotator").hover(  
          function() {  
            $("#rotator").tabs("rotate",0,true);  
          },  
          function() {  
            $("#rotator").tabs("rotate",30000,true);  
            //$("#rotator").tabs("rotate",3000,true);  
          }  
      );  
       
    }
  };

}(jQuery));
