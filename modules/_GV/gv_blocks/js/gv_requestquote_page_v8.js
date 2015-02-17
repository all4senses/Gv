(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_requestquote_page_v8 = {
    attach: function (context, settings) {
       
        $('input[name="referrer"]').val(document.referrer);
        $('input[name="url"]').val(document.URL);
       
        //$('select').selectmenu();
        $('select').selectmenu({
				//style:'popup', 
				maxHeight: 300
  			});
       
       
       
       
       
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
        
        $('input[id="firstname"], input[id="lastname"]').keydown(function (event) { 
            
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
        
        
       jQuery.validator.addMethod("notEqualsTo", function(value, element, param) {
          return !(this.optional(element) || value === param);
        //}, jQuery.format("You must not enter {0}"));
        }, "All fields with * are required");

        // Overriding the default Required message.
        jQuery.extend(jQuery.validator.messages, {
            required: Drupal.t('All fields with * are required')
        });

        // Click on a label will click on a radio button.
        $(".label_after").click(function(){
          $(this).prev().click();
        });
        
        $("#requestQuoteFormWrapper .multipartForm").formwizard({ 
				 	formPluginEnabled: true,
				 	validationEnabled: true,
          textSubmit : 'Get My Free Quote',
          textNext: "Let's Get Started",
          

          
          validationOptions: {
            groups: {
              username: "firstname lastname email phone"
              ,first_step: "phones_amt q_for q_type buying_time"
            },
            errorPlacement: function(error, element) {
              if (element.attr("name") == "phones_amt" || element.attr("name") == "q_for" || element.attr("name") == "buying_time" || element.attr("name") == "q_type" )
                error.insertAfter(".step");
              
              else if(element.attr("name") == "firstname" || element.attr("name") == "lastname"  || element.attr("name") == "company" || element.attr("name") == "email" || element.attr("name") == "phone")
                error.insertAfter("#phone");
              else
                error.insertAfter(element);
            },

            rules: {

              
              
              phones_amt: "required",
              q_for: "required",
              q_type: "required",
              buying_time: "required",
              connection: "required",
             
             firstname: {
                required: true,
                minlength: 2,
                notEqualsTo: $('input[id="firstname"]').attr('title')
							},
              lastname: {
                required: true,
                minlength: 2,
                notEqualsTo: $('input[id="lastname"]').attr('title')
							},
              phone: {
                required: true,
                //number: true,
                minlength: 10,
                maxlength: 15,
                notEqualsTo: $('input[id="phone"]').attr('title')
							}

						},
						messages: {
          
              //Works
              firstname: Drupal.t('First Name is required'),
              lastname: Drupal.t('Last Name is required'), //Drupal.t('All fields with * are required'),
              phone: Drupal.t('Enter a valid phone number'),
              //company: Drupal.t('Company name is required'),


             
              email: {
                //required: Drupal.t("We need your email address to contact you"),
                email: Drupal.t("Email format must be name@domain.com")
              }
            }
          },
				 	formOptions :{
            
            success: function(data){$('#requestQuoteFormWrapper .sending').hide(); $("#requestQuoteFormWrapper .success").append(data.data); $("#requestQuoteFormWrapper .success").show();},
						
            beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide(); $("#requestQuoteFormWrapper .sending").append('<div class="wait"><p><strong>Please wait</strong> a moment while processing your request...</p></div>'); $("#requestQuoteFormWrapper .sending").show(); },
            
            
            dataType: 'json',
						resetForm: true
				 	}	
				 }
				);
    
    
    
    
      $("#requestQuoteFormWrapper").removeClass('hidden'); 
    

    
    }
  };

}(jQuery));