(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_exitIntent_pdf = {
    attach: function (context, settings) {
              
       // Exit intent functionality.
       
        var turned_off = null; //true;
        var turned_off_suppressed = null;

        $$('.pdf-button').on('click', function(){
            $$("body").addClass('opened-popup');
            $.fn.popup("exit_pdf");
            $('#exitIntentPDF').form('prepare');
        });


        // Prepare form

        $('#exitIntentPDF .next').click(function(){
          $('#exitIntentPDF').form('next');
        });

        $$(".popup-overlay").click(function(){
            $.fn.popup("close");
        });

        $$('#exitIntentPDF').children('form').submit(function(e){
            e.preventDefault();
            $('#exitIntentPDF').form('submit', '/request');
        });
        
       
       
       
       
        $('#exitIntentPDF').find('input[name="referrer"]').val(document.referrer);
        $('#exitIntentPDF').find('input[name="url"]').val(document.URL);
       
              
        
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
        

    }
  };

}(jQuery));