(function($){

	$.fn.form = function($arg) {
		var prepare = false;
		var next = false;
		var back = false;
		var submit = false;
		
		if ( $arg == "prepare" ) {var prepare = true;} 
		if ( $arg == "next" ) {var next = true;} 
		if ( $arg == "back" ) {var back = true;} 
		if ( $arg == "submit" ) {var submit = true;} 


		
		if (prepare) {
			this.find('.step-one').addClass('show');

			this.find('.fieldset').each(function(){

				if ( $(this).hasClass('required') ) {
					$(this).find('.input').change(function(){
						if ( $(this).val() == "" || $(this).val() == null) {
							$(this).parents('.fieldset').removeClass('valid');
						} else{
							$(this).parents('.fieldset').addClass('valid').removeClass('error');
						}
					});
				} else {
					$(this).addClass('valid');
				}
			});


			this.find('.phone').each(function(){
				$(this).keydown(function (event) {
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
			});
		}







		if (next || submit) {
			var proceed = false;
			var problem = false;
			var $required = this.find('.step.show').find('.fieldset.required');

			$required.each(function(){

				if ( !$(this).hasClass('valid') ) {
					problem = true;
					$(this).addClass('error');

				} else {
					$(this).removeClass('error');
				}
			});

			if ( problem ) {
				proceed = false;
			} else {
				proceed = true;
			}

			if ( proceed ) {

				if ( next ) {
					var $currentStep = this.find('.step.show');
					var $nextStep = $currentStep.next();

					$currentStep.removeClass('show');
					$nextStep.addClass('show');
				}

				if ( submit ) {
					var $currentStep = this.find('.step.show');
					var $results = this.find('.results');
					var $loading = '<div class="loading"><div class="loading-title">Processing your information...</div><div class="loading-gif"></div></div>';
					var data = this.serialize();

					$results.html($loading);
					$currentStep.removeClass('show');

					if ( this.hasClass('exit-intent-form') ) {
						$.get('/request', data, function(data){
							$results.html(data);
						});
					}

				}
			}
		}








		if (back) {
			var $currentStep = this.find('.step.show');
			var $previousStep = $currentStep.prev();

			$currentStep.removeClass('show');
			$previousStep.addClass('show');
		}








		// if (submit) {
		// 	var $currentStep = this.find('.step.show');
		// 	var $previousStep = $currentStep.prev();

		// 	$currentStep.removeClass('show');
		// 	$previousStep.addClass('show');
		// }


	}

}(jQuery))