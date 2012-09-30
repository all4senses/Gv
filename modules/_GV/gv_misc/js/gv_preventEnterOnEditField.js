(function ($) {

  Drupal.behaviors.gv_preventEnterOnEditField = {
    attach: function (context, settings) {

        //console.log('Tabs!');
        $(".field-type-number-integer input").click(function(){
          //console.log('Test');
          // Because of too much data handling, editing the listing field get failed if there are more then 10 results on the page.
          if (jQuery('#edit-items-per-page').val() > 10) {
            alert('To change listing positions please set "Items per page" value to not more then 10.');
            event.preventDefault();
          }
        });
        
        $('.field-type-number-integer input').keydown(function (event) { 

            //console.log($(this).val());
            //console.log(event.keyCode);
            
            
            if( !(     event.keyCode == 8                                // backspace
                    || event.keyCode == 9
                    || event.keyCode == 46                              // delete
                    || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end

                    || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                    || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
                 )   
              ) {
                  //if (event.keyCode == 13) {
                  //  $(this).blur();
                  // }
                  // else {
                    event.preventDefault();     // Prevent character input
                  //}
            }
            
           
           

        });   

    }
  };

}(jQuery));