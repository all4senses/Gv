(function ($) {

  Drupal.behaviors.gv_preventEnterOnEditField = {
    attach: function (context, settings) {

        //console.log('Tabs!');
        $(".field-type-number-integer input").click(function(){
          console.log('Test');
        });
        
        $('.field-type-number-integer input').keydown(function (event) { 
            
            console.log($(this).val());
            console.log(event.keyCode);
            
            /*
            if( !(     event.keyCode == 8                                // backspace
                    || event.keyCode == 9
                    || event.keyCode == 46                              // delete
                    || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end

                    || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                    || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
                  
                    || (event.keyCode == 32 || event.keyCode == 189 || event.keyCode == 190 || event.keyCode == 173)    // space, dash, dot
                 )   
              ) {
                    event.preventDefault();     // Prevent character input
            }
            */
           
           

        });   

    }
  };

}(jQuery));