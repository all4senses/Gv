(function ($) {

  Drupal.behaviors.gv_requestquote_page_v2 = {
    
    attach: function (context, settings) {
       
        $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="company"]').hint();
       
       
       
       
        $('input[id="firstname"], input[id="lastname"], input[id="email"]').blur(function () { 
          
          console.log($(this).val());
          
          (jQuery).ajax({
            
                url: '/request/capture', 
                data: {
                        op: 'set',
                        url: window.location.href,
                        email: $('input[id="email"]').val(),
                        fname: $('input[id="firstname"]').val(),
                        lname: $('input[id="lastname"]').val()
                        }, 
                    type: 'POST', 
                    dataType: 'json'
                    /*
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('The header is arrived!');
                                }
                                return false;
                            } 
                     */
            }); // end of (jQuery).ajax
        
        });



        $(window).unload( function () { 
          
          console.log('before unload send');
          
          (jQuery).ajax({
            
                url: '/request/capture', 
                data: {
                        op: 'exit',
                        url: window.location.href,
                        //async: false,
                        email: $('input[id="email"]').val(),
                        fname: $('input[id="firstname"]').val(),
                        lname: $('input[id="lastname"]').val()
                        }, 
                    type: 'POST', 
                    dataType: 'json'
            }); // end of (jQuery).ajax
            
            console.log('after unload send');
          
        });
        
        
       
        $('input[id="phone_1"], input[id="phone_2"]').keyup(function (event) { 

            var l = $(this).val().length;
            if( !(event.keyCode == 8                                // backspace
                || event.keyCode == 9
                || event.keyCode == 46                              // delete
                || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
              
                || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                || (event.keyCode >= 96 && event.keyCode <= 105))   // number on keypad
                ) {
                    event.preventDefault();     // Prevent character input
            }
            else {
              if (l >= 3 
                  && !(event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 46 || (event.keyCode >= 35 && event.keyCode <= 40) ) 
                  ) {
                      console.log('this.val = ' + $(this).val());
                      console.log('event.keyCode = ' + event.keyCode);
                      console.log('event.keyCode = ' + event.which);
                      console.log('event.char = ' + String.fromCharCode(event.keyCode));
                      //event.preventDefault();
                      if (l > 3) {
                        event.preventDefault();
                        //$(this).val($(this).val() + String.fromCharCode(event.keyCode));
                      }
                      if ($(this).attr('id') == 'phone_1') {
                        //$('input[id="phone_2"]').val('');
                        $('input[id="phone_2"]').focus();
                      }
                      else {
                        //$('input[id="phone_3"]').val('');
                        $('input[id="phone_3"]').focus();
                      }
                  }
            }
        });
        

        $('input[id="phone_1"], input[id="phone_2"]').keydown(function (event) { 

            var l = $(this).val().length;
            if( !(event.keyCode == 8                                // backspace
                || event.keyCode == 9
                || event.keyCode == 46                              // delete
                || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
              
                || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                || (event.keyCode >= 96 && event.keyCode <= 105))   // number on keypad
                ) {
                    event.preventDefault();     // Prevent character input
            }
            else {
              if (l >= 3 
                  && !(event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 46 || (event.keyCode >= 35 && event.keyCode <= 40) ) 
                  ) {
                      console.log('this.val = ' + $(this).val());
                      console.log('event.keyCode = ' + event.keyCode);
                      console.log('event.keyCode = ' + event.which);
                      console.log('event.char = ' + String.fromCharCode(event.keyCode));
                      event.preventDefault();
                  }
            }
        });
        
        
        
        $('input[id="phone_3"]').keydown(function (event) { 
          
            var l = $(this).val().length;
            if( !(event.keyCode == 8                                // backspace
                || event.keyCode == 9
                || event.keyCode == 46                              // delete
                || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
              
                || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                || (event.keyCode >= 96 && event.keyCode <= 105))   // number on keypad
                ) {
                    event.preventDefault();     // Prevent character input
            }
            else {
              if (l >= 4 
                  && !(event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 46 || (event.keyCode >= 35 && event.keyCode <= 40) ) 
                  ) {
                  event.preventDefault();
              }
            }
        });
       
        jQuery.validator.addMethod("notEqualsTo", function(value, element, param) {
          return !(this.optional(element) || value === param);
        //}, jQuery.format("You must not enter {0}"));
        }, "All fields with are required");


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
				 	focusFirstInput: true,
          textSubmit : 'Submit & Get Quotes',
          textNext: 'Submit & Get Quotes',
          
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
              ,first_step: "phones_amt q_type buying_time"
            },
            errorPlacement: function(error, element) {
              if (element.attr("name") == "phones_amt" || element.attr("name") == "q_for" || element.attr("name") == "buying_time" || element.attr("name") == "q_type" )
                //error.insertAfter( $(".last_radio", element.parent()) );
                ////error.insertAfter("#buying_time");
                error.insertAfter("#on_error");
              
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
             
              firstname: {
                required: true,
                notEqualsTo: 'First'
							},
              lastname: {
                required: true,
                notEqualsTo: 'Last'
							},
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
             
             //Works
             firstname: Drupal.t('All fields with * are required'),
             lastname: Drupal.t('All fields with * are required'),
             
             
             // Works!
             /*
             firstname: {
               notEqualsTo: Drupal.t("xxxx")
             },
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
    
    
    }
  };

}(jQuery));