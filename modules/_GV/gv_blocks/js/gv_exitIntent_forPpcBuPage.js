(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_exitIntent_forPpcBuPage = {
    attach: function (context, settings) {
       
       var isIE = document.all && !window.atob;
       var isIE11 = window.navigator.msPointerEnabled;
       var isMobile = $$('html').hasClass('mobile');
       
       // Exit intent functionality.
       
        var turned_off = null; //true;
        var turned_off_suppressed = null;
        
        $(".visit-site-btn, table .company a, table a.logo, table a.link").click(function(){
            turned_off = true;
            turned_off_suppressed = true;
        });

        // if ( $.cookie('exit-bu') === 'off' ) {
        //     turned_off = true;
        // }
        
        $('.exit-intent-form').keydown(function (event) { 

            // Stop changing focus on the last element in the form section
            if(event.keyCode == 9 && (event.target.id == "phones_amt-button" || event.target.id == "phone") ) {
              event.preventDefault();     // Prevent character input
            }
        }); 

        if ( !isIE && !isIE11 && !isMobile && !turned_off ) {
            window.history.replaceState({id: 'gv_exit-init'}, '', '');
            window.history.pushState({id: 'gv_exit-control'}, '', '');

               
            $(window).on('popstate', function(e) {
                
                if (!turned_off && 'state' in window.history && window.history.state !== null && window.history.state.id !== 'gv_exit-control') {    
                    turned_off = true;

                      $$("body").addClass('opened-popup');
          
                      $.fn.popup("exit");
                      // $.cookie('exit-bu', 'off', {path:'/'});
                }
            });
        }

        if ( !isMobile ) {

            $(window).on('mouseleave', function(e) {
                
                if (!turned_off && e.pageY - $(window).scrollTop() <= 1) {    
                    turned_off = true;

                      $$("body").addClass('opened-popup');
          
                      $.fn.popup("exit");
                      // $.cookie('exit-bu', 'off', {path:'/'});
                }
            });
            
        }


        // Prepare form
        $('#exitIntent').form('prepare');

        $('.exit-intent-form .next').click(function(){
          $('.exit-intent-form').form('next');
        });

        $(".exit-intent-form .no, .popup-overlay").click(function(){
            $.fn.popup("close");
        });

        $('.exit-intent-form').submit(function(e){
            e.preventDefault();
            $('.exit-intent-form').form('submit', '/request');
        });
        
       
       
       
       
        $('.exit-intent-form input[name="referrer"]').val(document.referrer);
        $('.exit-intent-form input[name="url"]').val(document.URL);
       
              
        
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