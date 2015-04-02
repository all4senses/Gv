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
                        
                        
                        email: $('#email').val() != $('#email').attr('placeholder') ? $('#email').val() : '',
                        firstname: $('#firstname').val() != $('#firstname').attr('placeholder') ? $('#firstname').val() : '',
                        lastname: $('#lastname').val() != $('#lastname').attr('placeholder') ? $('#lastname').val() : '',
                        
                        website: $('#website').val() != $('#website').attr('placeholder') ? $('#website').val() : '',
                        company: $('#company').val() != $('#company').attr('placeholder') ? $('#company').val() : '',
                        
                        company: $('#q-title').val() != $('#q-title').attr('placeholder') ? $('#q-title').val() : '',
                        
                        phone: $('#phone').val() != $('#phone').attr('placeholder') ? $('#phone').val() : '',
                        
                        phones_amt: $('#phones_amt').val(),
                        q_type: $('#q_type').val(),
                        buying_time: $('#buying_time').val(),
                        
                        source: $('input[name="source"]').val(),
                        version: $('input[name="version"]').val(),
                        referrer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
            }); // end of (jQuery).ajax
        
        });

        
    }
  };

}(jQuery));