(function ($) {

  Drupal.behaviors.gv_floatingSocials = {
    attach: function (context, settings) {
       
       console.log('xxx');
       console.log($(".float.share"));
       
       console.log('length = ' + $(".float.share").length);
       
       if ($(".float.share").length) {
         
            $(".float.share").stickyfloat({ 
              duration: 200 
              //stickToBottom: true
              //,
              //,startOffset: 300
              //,offsetY: 450
            });
        
       }
       
    }
  };

}(jQuery));
