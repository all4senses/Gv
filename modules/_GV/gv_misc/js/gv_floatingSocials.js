(function ($) {

  Drupal.behaviors.gv_floatingSocials = {
    attach: function (context, settings) {
       
          
       $(".float.share").stickyfloat({ 
         duration: 200, 
         stickToBottom: true
         //,
         //startOffset: 300,
         ,offsetY: 150
       });

       
    }
  };

}(jQuery));
