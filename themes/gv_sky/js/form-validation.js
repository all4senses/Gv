(function($){

	$.fn.form = function($arg, $url) {
		var prepare = false;
		var next = false;
		var back = false;
		var submit = false;
		
		if ( $arg === "prepare" ) {var prepare = true;} 
		if ( $arg === "next" ) {var next = true;} 
		if ( $arg === "back" ) {var back = true;} 
		if ( $arg === "submit" ) {var submit = true;} 


		
		if (prepare) {
			this.find('.step-one').addClass('show');

			this.find('.fieldset').not('.radio, .checkbox').each(function(){

				if ( $(this).hasClass('required') ) {
					$(this).find('.input').not('.phone, .email').on('change keydown', function(){
						if ( $(this).val() === "" || $(this).val() === null) {
							$(this).parents('.fieldset').removeClass('valid');
						} else{
							$(this).parents('.fieldset').addClass('valid').removeClass('error');
						}
					});
				} else {
					$(this).addClass('valid');
				}
			});

			this.find('.fieldset.radio').each(function(){
				$(this).find('.input-button').click(function(){
					$(this).siblings().removeClass('checked');
					$(this).addClass('checked');
					$(this).find('.input').prop('checked', true);
					$(this).parents('.fieldset').addClass('valid').removeClass('error');
				});
			});

			this.find('.fieldset.checkbox').each(function(){
				$(this).find('.input-button').click(function(){
					if ( !$(this).hasClass('checked') ) {
						$(this).addClass('checked');
						$(this).find('.checkbox').prop('checked', true);
						$(this).find('.input').prop('checked', true);
						$(this).parents('.fieldset').addClass('valid').removeClass('error');
					} else {		
						$(this).removeClass('checked');
						$(this).find('.input').prop('checked', false);
						if ( !$(this).hasClass('checked') && !$(this).siblings().hasClass('checked') ) {
							$(this).parents('.fieldset').removeClass('valid');
						} else {
							$(this).parents('.fieldset').addClass('valid');
						}
					}
				});
			});


			this.find('.phone').each(function(){
				$(this).keydown(function (event) {
		            if( !(     event.keyCode === 8                                // backspace
		                    || event.keyCode === 9 								// tab
		                    || event.keyCode === 16 								// shift
		                    || event.keyCode === 17 								// ctrl
		                    || event.keyCode === 18 								// alt
		                    || event.keyCode === 46                              // delete
		                    || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end

		                    || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
		                    || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
		                  
		                    || (event.keyCode === 32 || event.keyCode === 189 || event.keyCode === 190 || event.keyCode === 173)    // space, dash, dot
		                 )   
		              ) {
		                    event.preventDefault();     // Prevent character input
			            }
				});
				$(this).change(function(){
					if ( $(this).val() === "" || $(this).val().length < 7 ) {
						$(this).parents('.fieldset').removeClass('valid');
					} else {
						$(this).parents('.fieldset').addClass('valid').removeClass('error');
					}
				});
			});

			this.find('.email').each(function(){
				$(this).on('change keydown', function(){
				    var email = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

					if ( $(this).val() === "" || !email.test($(this).val()) ) {
						$(this).parents('.fieldset').removeClass('valid');
					} else {
						$(this).parents('.fieldset').addClass('valid').removeClass('error');
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
					console.log('invalid');
					console.log($(this).attr('class'));

				} else {
					$(this).removeClass('error');
				}
			});

			if ( problem ) {
				proceed = false;
				console.log('stop');
			} else {
				proceed = true;
				console.log('proceed');
			}

			if ( proceed ) {
				if ( next ) {
					var $currentStep = this.find('.step.show');
					var $nextStep = $currentStep.next();
					console.log($currentStep);
					console.log($nextStep);

					$currentStep.removeClass('show');
					$nextStep.addClass('show');
				}

				if ( submit ) {
					var $currentStep = this.find('.step.show');
					var $form = this.parent();
					var $results = this.find('.results');
					var $loading = '<div class="loading"><div class="loading-title">Processing your information...</div><div class="loading-gif"></div></div>';
					var data = this.serialize();

					$form.addClass('final');
					$results.html($loading);
					$currentStep.removeClass('show');

					$.post($url, data, function(data){
						$results.html('<div class="results-success">' + data.data + '</div>')
					}, 'json')
							.fail(function(){
								$results.html('<div class="loading-title">An unknown error has occured on the server, please contact customer support for help.</div>')
							});

				}
			}
		}








		if (back) {
			var $currentStep = this.find('.step.show');
			var $previousStep = $currentStep.prev();

			$currentStep.removeClass('show');
			$previousStep.addClass('show');
		}


	}

}(jQuery))