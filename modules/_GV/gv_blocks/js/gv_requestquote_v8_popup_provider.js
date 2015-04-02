(function ($) {

  Drupal.behaviors.gv_requestquote_v8_popup_provider = {
    attach: function (context, settings) {
      
        
        jQuery(".quote-trigger").click(function(){
            
            jQuery("body").css('overflow', 'hidden');

            jQuery.fn.popup("provider_quote");
           
       
            


        // Prepare form
        jQuery('.provider-quote-form').form('prepare');

        jQuery('.provider-quote-form .next').click(function(){
          jQuery('.provider-quote-form').form('next');
        });

        jQuery(".provider-quote-form .close, .popup-overlay").click(function(){
            jQuery.fn.popup("close");
        });

        jQuery(".provider-popup-control-button").click(function(){
            jQuery(this).parents('form').submit();
        });

        jQuery('.provider-quote-form').submit(function(e){
            e.preventDefault();
            jQuery('.provider-quote-form').form('submit', '/request');
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