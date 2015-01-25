(function ($) {


  Drupal.behaviors.gv_requestquote_v10_popup_provider = {
    
    attach: function (context, settings) {
       
       
       
         
       
        //$('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="phone"], input[id="company"], input[id="website"]').hint();
        //$('input[id="company"]').hint();
        
        //$('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="company"], input[id="phone"]').each(function(){
//        $('.popup-request.quote input[id="company"]').each(function(){
//          if ($(this).val() == '') {
//            $(this).val($(this).attr('title'));
//          }
//          if ($(this).val() == $(this).attr('title')) {
//            $(this).addClass('blur');
//          }
//        });
       
       
        //console.log('document.referrer = ' + document.referrer);
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
        
        
        
        
        
        $('.service-type .choice').click(function(){
          $(this).parent().find('.choice').removeClass('checked'); 
          $(this).addClass('checked').find('input').attr('checked',true);
          //console.log($("input[type='radio'][name='service']:checked").val());
        });
        
        $('.people .choice').click(function(){
          $(this).parent().find('.choice').removeClass('checked'); 
          $(this).addClass('checked').find('input').attr('checked',true);
          $('.people .error-warn').hide();
          var step2_amt_errors = false;
          //console.log($("input[type='radio'][name='people']:checked").val());
        });
        
        
        $('.top5 .choice-checkbox').click(function(){
          
          checkb = $(this).find('input');
          if ($(checkb).attr('checked')) {
              $(checkb).removeAttr('checked');
              //console.log('unchecked');
              $(this).removeClass('checked');
            }
          else {
            $(checkb).attr('checked', true); 
            $(this).addClass('checked');
            $('.checkboxes .error-warn').hide();
            step2_features_errors = false;
            //console.log('checked');
          }

          //console.log($("input[type='checkbox'][name='people']:checked").val());
        });
        
        
        
        
        $('.popup-request.quote .step.one .button.next').click(function(){
          if (step_ok(1)) {
            $(".popup-request.quote .multipartForm").formwizard("next");
          }
        });
        
        
        $('.popup-request.quote .step.three .button.next').click(function(){
          // Replace hint with empty value for Company
          company_title = $('.popup-request.quote input[id="company"]').attr('title');
          company_value = $('.popup-request.quote input[id="company"]').val();
          console.log('company title = ' + company_title);
          console.log('company value = ' + company_value);
          if(company_value == company_title) {
            console.log('Hinted company');
            $('.popup-request.quote input[id="company"]').val('');
          }
          $(".popup-request.quote .multipartForm").formwizard("next");
        });
        
        


        
        $('.popup-request.quote .step.two .button.next').click(function(){
          if (step_ok(2)) {
            //console.log('step2 check...');
            //$('.title-first').hide();
            //$('.step.two').hide();
         
            //$('.title-second').show();
            $(".popup-request.quote .multipartForm").formwizard("next");

            /* ==========================================================================
                Input Mask
                ========================================================================== */

             //console.log('turn off: ' + Drupal.settings['gv_turn_on_phone_input_mask']);
             if (typeof Drupal.settings['gv_turn_on_phone_input_mask'] === "undefined" || Drupal.settings['gv_turn_on_phone_input_mask'] == true) {
                $('.popup-request.quote .fieldset.phone input').inputmask("mask", {"mask": "(999) 999-9999"});
             }

             // Explicitely make the field of blur color text
             jQuery('.step.three .firstname input').blur();
             /* ========================================================================== */

          }
          
          
          
          
        });
        
//        $('.step.two .button.back').click(function(){
//          $(".popup-request.quote .multipartForm").formwizard("back");
//        });
        
        $('.step .back').click(function(){
          //$('.title-second').hide();
          $(".popup-request.quote .multipartForm").formwizard("back");
          // Quick hack for missed hint in the Compane field. It doesn't appear without this blur for some reason...
          $('.popup-request.quote input[id="company"]').focus();
          $('.popup-request.quote input[id="company"]').blur();
          //$('.title-first').show();
        });
        
        
        
        var step2_amt_errors = true;
        var step2_features_errors = true;
        function step_ok(step) {
          switch (step) {
            case 2:
              //step2_amt_errors = true;
              step2_features_errors = true;
              $('.people .choice :checked').each(function() {
                //allVals.push($(this).val());
                step2_amt_errors = false;
                //console.log('amt..');
                //console.log($(this).val());
              });
              $('.checkboxes .choice-checkbox :checked').each(function() {
                //allVals.push($(this).val());
                step2_features_errors = false;
                //console.log('feature..');
                //console.log($(this).val());
              });
              
              if (step2_amt_errors) {
                $('.people .error-warn').show();
                //console.log('step2_amt_errors - show warn');
//                return false;
              }
              else {
                $('.people .error-warn').hide();
                //console.log('NO step2_amt_errors - Hide Warn');
              }
              if (step2_features_errors) {
                $('.checkboxes .error-warn').show();
                //console.log('step2_features_errors - show warn');
//                return false;
              }
              else {
                $('.checkboxes .error-warn').hide();
                //console.log('NO step2_features_errors - Hide Warn');
              }
              if (!step2_amt_errors && !step2_features_errors) {
                //console.log('No Errors step 2');
                return true;
              }
              else {
                //console.log('Errors step 2');
                return false;
              }
             
            case 1:
              company_title = $('.popup-request.quote input[id="company"]').attr('title');
              company_value = $('.popup-request.quote input[id="company"]').val();
              console.log('company title = ' + company_title);
              console.log('company value = ' + company_value);
              if(company_value == company_title || company_value == '') {
                console.log('company Not filled');
                return false;
              }
              return true;

          }
        }
        
        
        // Highlight personal info input fields label on focus input
        //jQuery('.step.three .firstname input').blur();
        jQuery('.step.three input').focus(function(){jQuery(this).parent().parent().find('.question').css('color', '#f4ad49')});
        jQuery('.step.three input').blur(function(){jQuery(this).parent().parent().find('.question').css('color', 'gray')});
        
        
        
        
        // http://thecodemine.org/#
        
        $(".popup-request.quote .multipartForm").formwizard({ 
				 	formPluginEnabled: true,
				 	validationEnabled: true,
				 	//focusFirstInput: true,
          textSubmit : 'Show Me Results', // 'GET MY QUICK QUOTE',// 'Submit & Get Quotes',
          textNext: 'Find Me Solutions', // 'GET MY QUICK QUOTE',// 'Submit & Get Quotes',
          
          
          //inAnimation : {height: 'show'},
          //outAnimation: {height: 'hide'},
//          inAnimation : {left: 100},
//          outAnimation: {left: 100},
				  inDuration : 0, //700,
					outDuration: 0, //700,
          //easing: 'slide',// 'easeOutBounce',
          //easing: 'easeOutBounce',
          //easing: 'slide',
          //easing: 'easeOutExpo',
          
          
          validationOptions: {
            groups: {
              username: "firstname lastname email phone"
              ,first_step: "phones_amt q_type buying_time"
            },
            errorPlacement: function(error, element) {
              if (element.attr("name") == "phones_amt" || element.attr("name") == "q_for" || element.attr("name") == "buying_time" || element.attr("name") == "q_type" )
                //error.insertAfter( $(".last_radio", element.parent()) );
                ////error.insertAfter("#buying_time");
                ////error.insertAfter("#on_error");
                error.insertAfter(".step");
              
                //alert(error.html() +  ': ' + $(".question", element.parent()).html() );
              else if(element.attr("name") == "firstname" || element.attr("name") == "lastname"  || element.attr("name") == "company" || element.attr("name") == "email" || element.attr("name") == "phone")
                //alert(error.html() +  ': ' + element.prev().html());
                error.insertAfter("#email");
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
              
              
              //phones_amt: "required",
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
              /*
              ,
              company: {
                required: true,
                notEqualsTo: $('input[id="company"]').attr('title')
							}
              */
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
             firstname: Drupal.t('First Name is required'),
             lastname: Drupal.t('Last Name is required'), //Drupal.t('All fields with * are required'),
             phone: Drupal.t('Enter a valid phone number'),
             //company: Drupal.t('Company name is required'),
             
             // Works!
             /*
             firstname: {
               notEqualsTo: Drupal.t("xxxx")
             },
             */
              email: {
                required: Drupal.t("Email format: name@domain.com"),
                email: Drupal.t("Email format: name@domain.com")
              }
            }
          },
				 	formOptions :{
						//success: function(data){alert('Success!'); $("#status").fadeTo(50,1,function(){ $(this).html("You are now registered!").fadeTo(5000, 0); })},
            //success: function(data){$('#requestQuoteFormWrapper .sending').hide('clip'); $("#requestQuoteFormWrapper .success").append(data.data); $("#requestQuoteFormWrapper .success").show('clip');},
            
            success: function(data){
              $('.popup-request.quote .sending').hide(); 
              //console.log(data);
              $(".popup-request.quote .success").html(data.data); 
              $(".popup-request.quote .success").show();},
						
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide('clip'); $("#requestQuoteFormWrapper .sending").append('Data is sendingt: ' + $.param(data)); $("#requestQuoteFormWrapper .sending").show('clip'); },//function(data){$("#data").html("data sent to the server: " + $.param(data));},
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide('clip'); $("#requestQuoteFormWrapper .sending").append('<p>Please wait a moment while processing your request.</p>'); $("#requestQuoteFormWrapper .sending").show('clip'); },
            beforeSubmit: function(data){
              
              
              
              $('.popup-request.quote .multipartForm').hide(); 
              //$('.title-second').hide();
              //$('.title-loading').show();
              //$(".popup-request.quote .sending").html('<div class="wait"><p><strong>Please wait</strong> a moment while processing your request...</p></div>'); 
              $(".popup-request.quote .sending").show(); 
            },
            
            
            dataType: 'json',
						resetForm: true
				 	}	
				 }
				);
    
    
    }
  };

}(jQuery));