(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_exitIntent_forPpcBuPage = {
    attach: function (context, settings) {
       
       
       
       // Exit intent functionality.
       
        var turned_off = null; //true;
        var turned_off_suppressed = null;
        
        $(".visit-site-btn, table .company a, table a.logo, table a.link").click(function(){
            turned_off = true;
            turned_off_suppressed = true;
        });
        
        
        // Quick hack for prevent scrolling down of colorbox popup window on press the tab key in the Company field (first step)
//        jQuery('.exit-intent-ppc input[id="company"]').keydown(function (event) { 
//            
//            //console.log(jQuery(this).val());
//            console.log(event.keyCode);
//   
//            if(event.keyCode == 9){ // Tab
//              jQuery(this).blur();
//              jQuery('.exit-intent-ppc #phones_amt-button').focus();
//              event.preventDefault();     // Prevent character input
//            }
//
//        }); 
        
        
        jQuery('.exit-intent-ppc').keydown(function (event) { 

            // Stop changing focus on the last element in the form section
            if(event.keyCode == 9 && (event.target.id == "phones_amt-button" || event.target.id == "phone") ) {
              event.preventDefault();     // Prevent character input
            }
        }); 
        
       
        $(document).on('mouseleave', function(e) {
            
            if (!turned_off && e.pageY - $(window).scrollTop() <= 1) {    
                turned_off = true;
                  // Disable page scrolling
                  // Other ways of scrolling disabling - 
                  // http://stackoverflow.com/questions/4770025/how-to-disable-scrolling-temporarily
                  // http://stackoverflow.com/questions/19817899/jquery-or-javascript-how-to-disable-window-scroll-without-overflowhidden
                  
          
                  // Uncomment to stop scrolling.
                  $$("body").css('overflow', 'hidden');
      
                  $.fn.popup("exit");
            }
        });
        
        
        $(".exit-intent-ppc .no").click(function(){
            $.fn.popup("close");
        });
        
       
       
       
       
        $('.exit-intent-ppc input[name="referrer"]').val(document.referrer);
        $('.exit-intent-ppc input[name="url"]').val(document.URL);
       
       
       
       
        $('input[id="phone"]').keydown(function (event) { 
            
            //console.log($(this).val());
            //console.log(event.keyCode);
            
            //var l = $(this).val().length;
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

        });        
        
        $('.exit-intent-ppc input[id="firstname"], .exit-intent-ppc input[id="lastname"]').keydown(function (event) { 
            
            //console.log($(this).val());
            //console.log(event.keyCode);
            
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
        
        
       // jQuery.validator.addMethod("notEqualsTo", function(value, element, param) {
       //    return !(this.optional(element) || value === param);
       //  }, "All fields with * are required");


        // Click on a label will click on a radio button.
        $(".exit-intent-ppc .label_after").click(function(){
          $(this).prev().click();
        });
        
        
        
        $(".exit-intent-ppc #first_step .next_custom").click(function(){
          // $(".exit-intent-ppc .multipartForm").formwizard("next");
        });
        
        $(".exit-intent-ppc #second_step .next_custom").click(function(){
          amt_choosen = $('.exit-intent-ppc select').val();
          if (amt_choosen == '') {
            //console.log('bad');
            $("#second_step .err").show();
          }
          else {
            // $(".exit-intent-ppc .multipartForm").formwizard("next");
          }
        });
        
        
        
        $(".exit-intent-ppc .back_custom").click(function(){
          // $(".exit-intent-ppc .multipartForm").formwizard("back");
        });
        
    //     $(".exit-intent-ppc .multipartForm").formwizard({ 
				//  	formPluginEnabled: true,
				//  	validationEnabled: true,
    //       textSubmit : 'Send me my Free Quote',
    //       textNext: "Next",
          
          
          
    //       validationOptions: {
    //         groups: {
    //           username: "firstname lastname email phone"
    //           // ,first_step: "phones_amt q_for q_type buying_time"
    //           ,first_step: "q_for q_type buying_time"
    //         },
    //         errorPlacement: function(error, element) {
    //           if (element.attr("name") == "phones_amt" || element.attr("name") == "q_for" || element.attr("name") == "buying_time" || element.attr("name") == "q_type" )
    //             //error.insertAfter( $(".last_radio", element.parent()) );
    //             ////error.insertAfter("#buying_time");
    //             ////error.insertAfter("#on_error");
    //             error.insertAfter(".exit-intent-ppc .step");
              
    //             //alert(error.html() +  ': ' + $(".question", element.parent()).html() );
    //           else if(element.attr("name") == "firstname" || element.attr("name") == "lastname"  || element.attr("name") == "company" || element.attr("name") == "email" || element.attr("name") == "phone")
    //             //alert(error.html() +  ': ' + element.prev().html());
    //             error.insertAfter(".exit-intent-ppc #phone");
    //             //alert(Drupal.t('All fields with * are required'));
    //           else
    //             error.insertAfter(element);
    //         },

    //         rules: {
                            
    //           q_for: "required",
    //           q_type: "required",
    //           buying_time: "required",
    //           connection: "required",
             
    //          firstname: {
    //             required: true,
    //             minlength: 2,
    //             notEqualsTo: $('input[id="firstname"]').attr('title')
				// 			},
    //           lastname: {
    //             required: true,
    //             minlength: 2,
    //             notEqualsTo: $('input[id="lastname"]').attr('title')
				// 			},
    //           phone: {
    //             required: true,
    //             //number: true,
    //             minlength: 10,
    //             maxlength: 15,
    //             notEqualsTo: $('input[id="phone"]').attr('title')
				// 			}

				// 		},
				// 		messages: {
              
        
             
    //           //Works
    //           firstname: Drupal.t('First Name is required'),
    //           lastname: Drupal.t('Last Name is required'), //Drupal.t('All fields with * are required'),
    //           phone: Drupal.t('Enter a valid phone number'),
    //           //company: Drupal.t('Company name is required'),


             
    //           email: {
    //             email: Drupal.t("Email format must be name@domain.com")
    //           }
    //         }
    //       },
				//  	formOptions :{
            
    //         success: function(data){
    //           $('.exit-intent-ppc .sending').hide(); 
    //           $('.exit-intent-ppc .multipartForm').html('');
    //           $(".exit-intent-ppc .success").append(data.data); 
    //           $(".exit-intent-ppc .success").show();
              
    //           setTimeout(
    //                 function(){
    //                   $.fn.popup("close");
    //                   turned_off = true;
    //                 },
    //                15000
    //              ); 
               
    //         },
						
    //         beforeSubmit: function(data){
    //           $('.exit-intent-ppc .multipartForm .control').html(''); 
    //           $('.exit-intent-ppc .multipartForm #Navigation').hide();
    //           $(".exit-intent-ppc .sending").append('<div class="wait"><p><strong>Please wait</strong> a moment while processing your request...</p></div>'); 
    //           $(".exit-intent-ppc .sending").show(); 
    //         },
            
            
    //         dataType: 'json',
				// 		resetForm: true
				//  	}	
				//  }
				// );
    
    
    
    
      // $(".exit-intent-ppc").removeClass('hidden'); 
    

    
    }
  };

}(jQuery));