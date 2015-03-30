(function ($) {

  Drupal.behaviors.gv_requestdemo_block_v1 = {
    attach: function (context, settings) {
      
      
        jQuery(".demo-trigger").click(function(){
            
            jQuery("body").css('overflow', 'hidden');

            jQuery.fn.popup("provider_demo");
           
       
            


        // Prepare form
        jQuery('.provider-demo-form').form('prepare');

        jQuery('.provider-demo-form .next').click(function(){
          jQuery('.provider-demo-form').form('next');
        });

        jQuery(".provider-demo-form .close, .popup-overlay").click(function(){
            jQuery.fn.popup("close");
        });

        jQuery(".step-three .provider-demo-control-button").click(function(){
            jQuery('.provider-demo-form').submit();
        });

        jQuery(".provider-popup-control-button").click(function(){
            jQuery(this).parents('form').submit();
        });

        jQuery('.provider-demo-form').submit(function(e){
            e.preventDefault();
            jQuery('.provider-demo-form').form('submit', '/request');
        });


        $('input[name="referrer"]').val(document.referrer);
        $('input[name="url"]').val(document.URL);

        
        $('input[id="firstname"], input[id="lastname"]').keydown(function (event) { 
            
            if( 
                    (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                    || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
                    || (event.keyCode == 186) // :
                    || (event.keyCode == 191) // /
                    || (event.keyCode == 190) // .
              ) {
                    event.preventDefault();     // Prevent character input
            }

        });
      });
    
    }
  };

}(jQuery));