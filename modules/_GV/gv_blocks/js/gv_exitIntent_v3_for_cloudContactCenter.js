(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_exitIntent_v3_for_cloudContactCenter = {
    attach: function (context, settings) {
       
       
       
       
       
       
        // More efficient way of preventing losing focus and breaking colorbox on tab key,
        // when this function prevent exiting and hiding colorbox caused by pressing tab
        jQuery('body').keydown(function (event) { 
          
          if (event.keyCode == 9) {
            /*  
            console.log(event);
            console.log("event.target.id = " + event.target.id);
            focused = $(':focus');
            console.log(focused);
            if(jQuery(focused).next(":tabbable").is(".multipartForm *")) {
              console.log("Next Focused Is child of .multipartForm");
            }
            
            if (cb_opened && (  !jQuery(focused).is("#colorbox *") || event.target.id == "phones_amt-button" || event.target.id == "phone")  ) {
              event.preventDefault();
            }
            */ 
            
            
            //if (cb_opened && (  !jQuery(event.target).is("#colorbox *") || event.target.id == "phones_amt-button" || event.target.id == "phone")  ) {
            if ($("#colorbox").css("display")=="block" && (  !jQuery(event.target).is("#colorbox *") || event.target.id == "phones_amt-button" || event.target.id == "phone")  ) {
              event.preventDefault();
              event.stopPropagation();
              event.stopImmediatePropagation();
              //console.log("Prevented Tab CC!");
              return false;
            }
            
          } // End of if (event.keyCode == 9) {
          
        });
       
        
       // Obsolete. Used above more efficient function jQuery('body').keydown(function (event) { .
       /*
       jQuery('#requestQuoteFormWrapper-ppc').keydown(function (event) { 
            
            //console.log(jQuery(this).val());
            //console.log(event.keyCode);
            //console.log(event);

            // Stop changing focus on the last element in the form section
            if(event.keyCode == 9 && (event.target.id == "phones_amt-button" || event.target.id == "phone") ) {
              event.preventDefault();     // Prevent character input
            }
            
       });
       */
       
       
       
       
       
       // Exit intent functionality.
       //console.log('xxx');
       
        var turned_off = null; //true;
        var turned_off_suppressed = null;
        
        $(".visit-site-btn, table .company a, table a.logo, table a.link").click(function(){
            //console.log('Exit intent is suppressed by clicking on provider links');
            //console.log(this);
            turned_off = true;
            turned_off_suppressed = true;
        });
        
        
        
        // 3 mins delay before turn on the exitIntent popup.
        /*
        setTimeout(
                    function(){
                      if (!turned_off_suppressed) {
                        turned_off = null; 
                        //console.log('popup is turned on');
                      }
                      else {
                        //console.log('popup is NOT turned on, because suppressed - clicked on some outer provider links before exit');
                      }
                      
                    },
                   5800 //180000
                 ); 
         */
       
        $(document).bind("mouseleave", function(e)
        {
            //console.log(e.pageY);
            
            //if (!turned_off && e.pageY <= 1)
            if (!turned_off && e.pageY - $(window).scrollTop() <= 1)
            {    
                turned_off = true;
                //now = new Date();           
                //for (i=0; i < times.length; i++)
                {
                    //if (now.getTime() > times[i][0] && now.getTime() < times[i][1])
                    {
                        //$.fn.colorbox({iframe:true, width:650, height:600, href: "get-popup-on-exit-intent", open: true});  
                        
                        ////$.fn.colorbox({iframe:true, width:650, height:400, href: 'get/iframe/exitIntent_lpV4', open: true});  
                        
                        
                        // Disable page scrolling
                        // Other ways of scrolling disabling - 
                        // http://stackoverflow.com/questions/4770025/how-to-disable-scrolling-temporarily
                        // http://stackoverflow.com/questions/19817899/jquery-or-javascript-how-to-disable-window-scroll-without-overflowhidden
                        
                
                        // Uncomment to stop scrolling.
                        $("body").css('overflow', 'hidden');
            
                        //console.log('a1...');
                        //console.log($.fn.colorbox);
                        
                        var cb1;
                        
                        cb1 = $.fn.colorbox({
                          inline:true, 
                          href:"#exitIntent", 
                          width:780, 
                          height:540
                          ,onClosed: function() {
                                //console.log('closed...');
                                $("body").css('overflow', 'inherit');
                                turned_off = true;
                               }
                        });  
                        
                        //console.log(cb1);
                        //$.fn.colorbox.close();
                        //console.log($.fn.colorbox);
                        //alert('test');
                    }    
                }
            }
        });
        
        
        $("#requestQuoteFormWrapper-ppc .no").click(function(){
            //console.log('Closedddddd');
            $.fn.colorbox.close();
        });
        
        
//        window.addEventListener("message", receiveMessage, false);
//        function receiveMessage(event) {
//            //alert('Message: ' + event.data);
//            if (event.data == 'close') {
//              $.fn.colorbox.close();
//            }
//        }
        
        
       
       
       
       
       
       
       
        $('#requestQuoteFormWrapper-ppc input[name="referrer"]').val(document.referrer);
        $('#requestQuoteFormWrapper-ppc input[name="url"]').val(document.URL);
       
        //$('select').selectmenu();
        $('#requestQuoteFormWrapper-ppc select').selectmenu({
          //style:'popup', 
          maxHeight: 300
          ,change: function( event, ui ) {
                      //console.log(ui.value);
                      //console.log($('#requestQuoteFormWrapper-ppc select').selectmenu("option" ));
                      //console.log($('#requestQuoteFormWrapper-ppc select').val());
                      if (ui.value != '') {
                        $("#second_step .err").hide();
                      }
                   }
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
        
        $('#requestQuoteFormWrapper-ppc input[id="firstname"], #requestQuoteFormWrapper-ppc input[id="lastname"]').keydown(function (event) { 
            
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
        $("#requestQuoteFormWrapper-ppc .label_after").click(function(){
          $(this).prev().click();
        });
        
        
        
        $("#requestQuoteFormWrapper-ppc #first_step .next_custom").click(function(){
          jQuery( "#requestQuoteFormWrapper-ppc select" ).selectmenu( "enable" );
          $("#requestQuoteFormWrapper-ppc .multipartForm").formwizard("next");
        });
        
        $("#requestQuoteFormWrapper-ppc #second_step .next_custom").click(function(){
          amt_choosen = $('#requestQuoteFormWrapper-ppc select').val();
          //console.log('amt_choosen = ' + amt_choosen);
          //console.log(('#requestQuoteFormWrapper-ppc select').val());
          if (amt_choosen == '') {
            //console.log('bad');
            $("#requestQuoteFormWrapper-ppc #second_step .err").show();
          }
          else {
            //console.log('good');
            
            $("#requestQuoteFormWrapper-ppc .multipartForm").formwizard("next");
            
            ////$('#requestQuoteFormWrapper-ppc .phone input').inputmask("mask", {"mask": "(999) 999-9999", "clearMaskOnLostFocus": false});
          }
        });
        
        
        
        
        // Turn on phone validator only on the event, because it cause all page js fail if is turned on on page loading!!!
            $('#requestQuoteFormWrapper-ppc .phone').one('mouseenter', function() {

      
                 $('#requestQuoteFormWrapper-ppc .phone input').unbind('blur');
                 $('#requestQuoteFormWrapper-ppc .phone input').blur(function(){
                    if ($(this).val() == '') {
                      //$(this).val($(this).attr('title'));
                      $(this).addClass('blur');
                    }
                    
                 });
                 $('#requestQuoteFormWrapper-ppc .phone input').inputmask("mask", {"mask": "(999) 999-9999", "clearMaskOnLostFocus": false});

            });
            
            
            
        
        
        
        $("#requestQuoteFormWrapper-ppc .back_custom").click(function(){
          $("#requestQuoteFormWrapper-ppc .multipartForm").formwizard("back");
        });
        
        $("#requestQuoteFormWrapper-ppc .multipartForm").formwizard({ 
				 	formPluginEnabled: true,
				 	validationEnabled: true,
				 	//focusFirstInput: true,
          textSubmit : 'Send me my Free Quote',
          textNext: "Next",
          
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
              username: "firstname lastname email phone"
              //,first_step: "phones_amt q_for q_type buying_time"
              ,first_step: "q_for q_type buying_time"
            },
            errorPlacement: function(error, element) {
              if (element.attr("name") == "phones_amt" || element.attr("name") == "q_for" || element.attr("name") == "buying_time" || element.attr("name") == "q_type" )
                //error.insertAfter( $(".last_radio", element.parent()) );
                ////error.insertAfter("#buying_time");
                ////error.insertAfter("#on_error");
                error.insertAfter("#requestQuoteFormWrapper-ppc .step");
              
                //alert(error.html() +  ': ' + $(".question", element.parent()).html() );
              else if(element.attr("name") == "firstname" || element.attr("name") == "lastname"  || element.attr("name") == "company" || element.attr("name") == "email" || element.attr("name") == "phone")
                //alert(error.html() +  ': ' + element.prev().html());
                error.insertAfter("#requestQuoteFormWrapper-ppc #phone");
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
                //notEqualsTo: $('input[id="phone"]').attr('title')
                notEqualsTo: '(___) ___-____'
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
              firstname: Drupal.t('First Name is required'),
              lastname: Drupal.t('Last Name is required'), //Drupal.t('All fields with * are required'),
              phone: Drupal.t('Enter a valid phone number'),
              //company: Drupal.t('Company name is required'),
              phones_amt: Drupal.t('Please select a value'),


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
            //success: function(data){$('#requestQuoteFormWrapper-ppc .sending').hide('clip'); $("#requestQuoteFormWrapper-ppc .success").append(data.data); $("#requestQuoteFormWrapper-ppc .success").show('clip');},
            
            success: function(data){
              $('#requestQuoteFormWrapper-ppc .sending').hide(); 
              $('#requestQuoteFormWrapper-ppc .multipartForm').html('');
              $("#requestQuoteFormWrapper-ppc .success").html(data.data); 
              $("#requestQuoteFormWrapper-ppc .success").show();
              
              //console.log('Start timer DEMO...');
              
              setTimeout(
                    function(){
                      //turned_off = null; 
                      //console.log('popup is turned offffff DEMO');
                      $.fn.colorbox.close();
                      turned_off = true;
                    },
                   15000
              ); 
               
            },
						
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper-ppc .multipartForm').hide('clip'); $("#requestQuoteFormWrapper-ppc .sending").append('Data is sendingt: ' + $.param(data)); $("#requestQuoteFormWrapper-ppc .sending").show('clip'); },//function(data){$("#data").html("data sent to the server: " + $.param(data));},
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper-ppc .multipartForm').hide('clip'); $("#requestQuoteFormWrapper-ppc .sending").append('<p>Please wait a moment while processing your request.</p>'); $("#requestQuoteFormWrapper-ppc .sending").show('clip'); },
            beforeSubmit: function(data){
              //$('#requestQuoteFormWrapper-ppc .multipartForm').hide();
              $('#requestQuoteFormWrapper-ppc .multipartForm .control').html(''); 
              $('#requestQuoteFormWrapper-ppc .multipartForm #Navigation').hide();
              $("#requestQuoteFormWrapper-ppc .sending").html('<div class="wait"><p><strong>Please wait</strong> a moment while processing your request...</p></div>'); 
              $("#requestQuoteFormWrapper-ppc .sending").show(); 
            },
            
            
            dataType: 'json',
						resetForm: true
				 	}	
				 }
				);
    
        //console.log($("#requestQuoteFormWrapper-ppc .multipartForm").formwizard("state"));
    
    
    
      $("#requestQuoteFormWrapper-ppc").removeClass('hidden'); 
    

    
    }
  };

}(jQuery));