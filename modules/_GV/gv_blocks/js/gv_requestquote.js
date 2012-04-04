(function ($) {

  Drupal.behaviors.gv_requestquote = {
    attach: function (context, settings) {
       
        $("#demoForm").formwizard({ 
				 	formPluginEnabled: true,
				 	validationEnabled: true,
				 	focusFirstInput: true,
          validationOptions: {
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
  
							surname: "required",
							myemail: {
								required: true,
								email: false,
                number: true
							}
						},
						messages: {
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