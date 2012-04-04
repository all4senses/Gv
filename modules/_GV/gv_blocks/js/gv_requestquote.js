(function ($) {

  Drupal.behaviors.gv_requestquote = {
    attach: function (context, settings) {
       
        $("#requestQuoteForm").formwizard({ 
				 	formPluginEnabled: true,
				 	validationEnabled: true,
				 	focusFirstInput: true,
          validationOptions: {
            errorPlacement: function(error, element) {
              console.log(this);
              console.log(element);
              console.log(error);
              console.log(error.html());
              if (element.attr("name") == "phones_amt" || element.attr("name") == "quote_for")
                //error.insertAfter( $(".last_radio", element.parent()) );
                alert(error.html() +  ': ' + $(".question", element.parent()).html() );
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
//              // Rules from jquery.validate.js              
//              classRuleSettings: {
//                required: {required: true},
//                email: {email: true},
//                url: {url: true},
//                date: {date: true},
//                dateISO: {dateISO: true},
//                dateDE: {dateDE: true},
//                number: {number: true},
//                numberDE: {numberDE: true},
//                digits: {digits: true},
//                creditcard: {creditcard: true}
//              },
              phones_amt: "required",
              quote_for: "required",
							surname: "required",
							myemail: {
								required: true,
								email: false,
                number: true
							}
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
              surname: Drupal.t("Please specify your nameeee"),
              myemail: {
                required: Drupal.t("Weeeee need your email address to contact you"),
                email: Drupal.t("Your email address must be in the format of name@domain.com")
              }
            }
          },
				 	formOptions :{
						success: function(data){$("#status").fadeTo(500,1,function(){ $(this).html("You are now registered!").fadeTo(5000, 0); })},
						beforeSubmit: function(data){$("#data").html("data sent to the server: " + $.param(data));},
						dataType: 'json',
						resetForm: true
				 	}	
				 }
				);
    
    
    }
  };

}(jQuery));