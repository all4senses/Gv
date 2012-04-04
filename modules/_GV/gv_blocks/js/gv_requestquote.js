(function ($) {

  Drupal.behaviors.gv_requestquote = {
    attach: function (context, settings) {
       
        $("#demoForm").formwizard({ 
				 	formPluginEnabled: true,
				 	validationEnabled: false,
				 	focusFirstInput : true,
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