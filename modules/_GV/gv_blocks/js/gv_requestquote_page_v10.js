(function ($) {


  Drupal.behaviors.gv_requestquote_page_v10 = {
    
    attach: function (context, settings) {
       
       
       
       
       
          /* ==========================================================================
             Main Section Height
             ========================================================================== */
 
 
          jQuery(document).ready(function($){


              var $windowHeightTrue = $(window).height();
              var $windowHeight = $windowHeightTrue - 87;


              if ($windowHeightTrue > 815) { //Check if window is lower than 1080px
                  $('.full-height').height($windowHeight); //Greater than 1080px
                  var $videoHeight = $windowHeight - 607; //Set Video VAR
              } else if ($windowHeightTrue < 815) {
                  $('.full-height').height(728); //Less than 1080px
                  var $videoHeight = 473; //Set Video VAR 473
              }

              $('.video').height($videoHeight);//Set Video Height

          });

            //$(window).on('resize', function(){
          $(window).resize(function(){
              var $windowHeightTrue = $(window).height();
              var $windowHeight = $windowHeightTrue - 87;

              if ($windowHeightTrue > 815) { //Check if window is lower than 1080px
                  $('.full-height').height($windowHeight); //Greater than 1080px
                  var $videoHeight = $windowHeight - 607; //Set Video VAR
              } else if ($windowHeightTrue < 815) {
                  $('.full-height').height(728); //Less than 1080px
                  var $videoHeight = 386; //Set Video VAR 473
              }

              $('.video').height($videoHeight);//Set Video Height

          });

       

        // Prepare form
        $('.lpv10-form').form('prepare');

        $('.lpv10-form .input').each(function(){
          $(this).focus(function(){
            $this.parents('.fieldset').addClass('focus');
          });

          $(this).blur(function(){
            $(this).parents('.fieldset').removeClass('focus');
          });


          $(this).keyup(function(){
            if ( $(this).val() === '' ) {
              $(this).parents('.fieldset').removeClass('filled');
            } else {
              $(this).parents('.fieldset').addClass('filled');
            }
          });
        });

        $('.lpv10-form .next').click(function(){
          $('.lpv10-form').form('next');
        });

        $('.lpv10-form .back').click(function(){
          $('.lpv10-form').form('back');
        });

        $('.lpv10-form .calculate').click(function(){
              $('.lpv10-form').form('next');

            if ( !$('.step.two .error').length ) {
              setTimeout(function() {
                do {
                  x= Math.floor((Math.random() * 5) + 1);
                } while (x < 3); 
                $('.title-second .number, .title-second .number2').html(x);
                $('.lpv10-form').form('next');
       
              }
              , 2000);
            }
          
        });

        $(".lpv10-form .submit").click(function(){
            $('.lpv10-form').submit();
        });

        $('.lpv10-form').submit(function(e){
            e.preventDefault();
            $('.lpv10-form').form('submit', '/request');
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

       




        $('input').blur(function () { 
                    
          (jQuery).ajax({
            
                url: '/request/capture', 
                data: {
                        op: 'set',
                        url: window.location.href,
                        
                        
                        email: $('.lpv10-form #email').val() != $('.lpv10-form #email').attr('placeholder') ? $('.lpv10-form #email').val() : '',
                        firstname: $('.lpv10-form #firstname').val() != $('.lpv10-form #firstname').attr('placeholder') ? $('.lpv10-form #firstname').val() : '',
                        lastname: $('.lpv10-form #lastname').val() != $('.lpv10-form #lastname').attr('placeholder') ? $('.lpv10-form #lastname').val() : '',
                        
                        website: $('.lpv10-form #website').val() != $('.lpv10-form #website').attr('placeholder') ? $('.lpv10-form #website').val() : '',
                        company: $('.lpv10-form #company').val() != $('.lpv10-form #company').attr('placeholder') ? $('.lpv10-form #company').val() : '',
                        
                        q_title: $('.lpv10-form #q-title').val() != $('.lpv10-form #q-title').attr('placeholder') ? $('.lpv10-form #q-title').val() : '',
                        
                        phone: $('.lpv10-form #phone').val() != $('.lpv10-form #phone').attr('placeholder') ? $('.lpv10-form #phone').val() : '',
                        
                        phones_amt: $('.lpv10-form input[name="phones_amt"]:checked').val(), //$('#phones_amt').val(),
                        
                        features: $('.lpv10-form input[name="features[]"]:checked').map(function(){
                                          return $(this).val();
                                        }).get().toString(),
                                
                        q_type: $('.lpv10-form #q_type').val(),
                        
                        q_for: $('.lpv10-form input[name="q_for"]:checked').val(),
                        
                        buying_time: $('.lpv10-form #buying_time').val(),
                        
                        source: $('.lpv10-form input[name="source"]').val(),
                        version: $('.lpv10-form input[name="version"]').val(),
                        referrer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
            }); // end of (jQuery).ajax
        
        });

        
    }
  };

}(jQuery));