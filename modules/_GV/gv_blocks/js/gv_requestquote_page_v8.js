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
				 	//focusFirstInput: true,
          textSubmit : 'Get My Free Quote',
          textNext: "Let's Get Started",
          
          //inAnimation : {height: 'show'},
          //outAnimation: {height: 'hide'},
//          inAnimation : {left: 100},
//          outAnimation: {left: 100},
//				inDuration : 700,
//					outDuration: 700,
          //easing: 'slide',// 'easeOutBounce',
          //easing: 'easeOutBounce',
          //easing: 'slide',
          //easing: 'easeOutExpo',
          
          
          validationOptions: {
            groups: {
              username: "firstname lastname email phone_1 phone_2 phone_3"
              ,first_step: "phones_amt q_for q_type buying_time"
            },
            errorPlacement: function(error, element) {
              if (element.attr("name") == "phones_amt" || element.attr("name") == "q_for" || element.attr("name") == "buying_time" || element.attr("name") == "q_type" )
                //error.insertAfter( $(".last_radio", element.parent()) );
                ////error.insertAfter("#buying_time");
                ////error.insertAfter("#on_error");
                error.insertAfter(".step");
              
                //alert(error.html() +  ': ' + $(".question", element.parent()).html() );
              else if(element.attr("name") == "firstname" || element.attr("name") == "lastname"  || element.attr("name") == "company" || element.attr("name") == "email" || element.attr("name") == "phone_1" || element.attr("name") == "phone_2" || element.attr("name") == "phone_3")
                //alert(error.html() +  ': ' + element.prev().html());
                error.insertAfter("#phone");
                //alert(Drupal.t('All fields with * are required'));
              else
                error.insertAfter(element);
            },
//            showErrors: function(errorMap, errorList) {
//              alert("Your form contains " + this.numberOfInvalids());
//              console.log(this);
//              console.log(this.invalidElements());
//              
//              this.defaultShowErrors();
//            },
            rules: {
              
//              http://docs.jquery.com/Plugins/Validation#List_of_built-in_Validation_methods    
//                        
              // Rules from jquery.validate.js              
              /*
              classRuleSettings: {
                required: {required: true},
                email: {email: true},
                url: {url: true},
                date: {date: true},
                dateISO: {dateISO: true},
                dateDE: {dateDE: true},
                number: {number: true},
                numberDE: {numberDE: true},
                digits: {digits: true},
                creditcard: {creditcard: true}
              },
              */
              
              
              phones_amt: "required",
              q_for: "required",
              q_type: "required",
              buying_time: "required",
              connection: "required",
             
              phone_1: {
                number: true,
                minlength: 3,
                maxlength: 3
							},
              phone_2: {
                number: true,
                minlength: 3,
                maxlength: 3
							},
              phone_3: {
                number: true,
                minlength: 4,
                maxlength: 4
							}
              // works
              /* 
							myemail: {
								required: true,
								email: false,
                number: true
							}
              */
						},
						messages: {
              
              // Rules from jquery.validate.js
              /*
              messages: {
                required: "This field is required.",
                remote: "Please fix this field.",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Please enter a valid date.",
                dateISO: "Please enter a valid date (ISO).",
                number: "Please enter a valid number.",
                digits: "Please enter only digits.",
                creditcard: "Please enter a valid credit card number.",
                equalTo: "Please enter the same value again.",
                accept: "Please enter a value with a valid extension.",
                maxlength: $.validator.format("Please enter no more than {0} characters."),
                minlength: $.validator.format("Please enter at least {0} characters."),
                rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
                range: $.validator.format("Please enter a value between {0} and {1}."),
                max: $.validator.format("Please enter a value less than or equal to {0}."),
                min: $.validator.format("Please enter a value greater than or equal to {0}.")
              },   
              */
             
              // Doesn't work... Used snipped above for it.
              //required: Drupal.t('All fields with * are required'),
              
              
              // Works!
              /*
              phones_amt: Drupal.t('Make your choice!'),
              q_for: Drupal.t('Make your choice!'),
              buying_time: Drupal.t('Make your choice!'),
              connection: Drupal.t('Make your choice!'),
              */
             
              email: {
                //required: Drupal.t("We need your email address to contact you"),
                email: Drupal.t("Email format must be name@domain.com")
              }
            }
          },
				 	formOptions :{
						//success: function(data){alert('Success!'); $("#status").fadeTo(50,1,function(){ $(this).html("You are now registered!").fadeTo(5000, 0); })},
            //success: function(data){$('#requestQuoteFormWrapper .sending').hide('clip'); $("#requestQuoteFormWrapper .success").append(data.data); $("#requestQuoteFormWrapper .success").show('clip');},
            
            success: function(data){$('#requestQuoteFormWrapper .sending').hide(); $("#requestQuoteFormWrapper .success").append(data.data); $("#requestQuoteFormWrapper .success").show();},
						
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide('clip'); $("#requestQuoteFormWrapper .sending").append('Data is sendingt: ' + $.param(data)); $("#requestQuoteFormWrapper .sending").show('clip'); },//function(data){$("#data").html("data sent to the server: " + $.param(data));},
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide('clip'); $("#requestQuoteFormWrapper .sending").append('<p>Please wait a moment while processing your request.</p>'); $("#requestQuoteFormWrapper .sending").show('clip'); },
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