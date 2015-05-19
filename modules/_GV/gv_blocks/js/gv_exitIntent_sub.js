(function ($) {

  Drupal.behaviors.gv_exitIntent_sub = {
    attach: function (context, settings) {
       
       var isIE = document.all && !window.atob;
       var isIE11 = window.navigator.msPointerEnabled;
       var isMobile = $('html').hasClass('mobile');
       
       // Exit intent functionality.
       
        var turned_off = null; //true;
        var turned_off_suppressed = null;
        
        $('.exit-intent-form').keydown(function (event) { 

            // Stop changing focus on the last element in the form section
            if(event.keyCode == 9 && (event.target.id == "phones_amt-button" || event.target.id == "phone") ) {
              event.preventDefault();     // Prevent character input
            }
        });

        // if ( $.cookie('exit-sub') === 'off' ) {
        //     turned_off = true;
        // } 

        // if ( !isIE && !isIE11 && !isMobile && !turned_off) {
        //     window.history.replaceState({id: 'gv_exit-init'}, '', '');
        //     window.history.pushState({id: 'gv_exit-control'}, '', '');

               
        //     $(window).on('popstate', function(e) {
                
        //         if (!turned_off && 'state' in window.history && window.history.state !== null && window.history.state.id !== 'gv_exit-control') {    
        //             turned_off = true;
        //             console.log(e);

        //               $$("body").addClass('opened-popup');
          
                      // $.fn.popup("subscribe");
                      // $.cookie('exit-sub', 'off', {path:'/'});
        //         }
        //     });
        // }

        if ( !isMobile ) {

            $(window).on('mouseleave', function(e) {
                
                if (!turned_off && e.pageY - $(window).scrollTop() <= 1) {    
                    turned_off = true;

                      $$("body").addClass('opened-popup');
          
                      $.fn.popup("subscribe");
                      // $.cookie('exit-sub', 'off', {path:'/'});
                }
            });
            
        }



        $(".popup-overlay").click(function(){
            $.fn.popup("close");
        });

        var $subscribeForm = $('#gv-misc-exitsubscribe-form');
        var $subscribeFormEmail = $subscribeForm.find('.form-text');
        var $subscribeFormSubmit = $subscribeForm.find('.form-submit');

        $subscribeFormEmail.on('change keydown', function(){
            var email = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            var $this = $(this);

            if ( $this.val() === "" || !email.test($this.val()) ) {
                $this.removeClass('valid');
            } else {
                $this.addClass('valid').removeClass('error');
            }
        });

        $subscribeFormSubmit.on('click',function(e){
            e.preventDefault();
            
            if ( $subscribeFormEmail.hasClass('valid') ) {
                //$subscribeForm.submit();
                
                (jQuery).ajax({
            
                url: '/subscr', 
                data: {
                        op: 'newsletter',
                        url: window.location.href,
                        email: $('#gv-misc-exitsubscribe-form input[name="email"]').val(), //$('input[id="email"]').val() != $('input[id="email"]').attr('title') ? $('input[id="email"]').val() : '',
                        referrer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('The header is arrived!');
                                    console.log(data);
                                    $.fn.popup("close");
                                    alert(data.message);
                                }
                                return false;
                            } 
            }); // end of (jQuery).ajax
            
            
            
            } else {
                $subscribeFormEmail.addClass('error');
            }            
        });
        

    }
  };

}(jQuery));