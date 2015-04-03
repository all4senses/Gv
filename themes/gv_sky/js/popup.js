(function($){

	var $popup_overlay = '<div class="popup-overlay"></div>';
	var $popup = '<div class="popup"><div class="popup-close"></div><div class="popup-content"></div></div>';
	$('body').prepend($popup_overlay + $popup);	
	$('.popup-close').click(function(){
		$.fn.popup('close');
	});

	var popOpen = false;

	$.fn.popup = function($arg) {
		var quote = false;
		var provider_demo = false;
		var provider_quote = false;
		var exit = false;
		var close = false;
		
		if ( $arg == "quote" ) { // Comparison Chart Popup
			var quote = true;
		} 
		if ( $arg == "provider_demo" ) { // Provider Page Demo/Quote Popup
			var provider_demo = true;
		}  
		if ( $arg == "provider_quote" ) { // Provider Page Demo/Quote Popup
			var provider_quote = true;
		} 
		if ( $arg == "exit" ) {
			var exit = true;
		} 
		if ( $arg == "close" ) {
			var close = true;
		} 


		if (close && popOpen) {

			if ( $$('.popup').hasClass('exit') ) {
				$('.popup-content').empty();
			}
			if ( $$('.popup').hasClass('quote') ) {
				$('.popup-request').appendTo('.popup-request-container');
				$('.popup-request .step.show').removeClass('show');
				$('.popup-request .step-one').addClass('show');
			}
			if ( $$('.popup').hasClass('provider_demo') ) {
				$('.provider-demo').appendTo('.provider-demo-container');
				$('.provider-demo .step.show').removeClass('show');
				$('.provider-demo .step-one').addClass('show');
			}
			if ( $$('.popup').hasClass('provider_quote') ) {
				$('.provider-quote').appendTo('.provider-quote-container');
				$('.provider-quote .step.show').removeClass('show');
				$('.provider-quote .step-one').addClass('show');
			}
			$$('popup-content').find('input').val('');
			$$('.popup, .popup-overlay').removeClass('show quote provider_demo provider_quote exit');
			$$("body").css('overflow', 'visible');
			popOpen = false;
		}

		if ( popOpen == false ) {
			
			if (quote) {
				$$('.popup, .popup-overlay').addClass('show quote');
				$('.popup-request').appendTo($('.popup-content'));
				popOpen = true;
				
			}


			if (provider_demo) {
				$$('.popup, .popup-overlay').addClass('show provider_demo');
				$('.provider-demo').appendTo($('.popup-content'));
				popOpen = true;
				
			}



			if (provider_quote) {
				$$('.popup, .popup-overlay').addClass('show provider_quote');
				$('.provider-quote').appendTo($('.popup-content'));
				popOpen = true;
				
			}


			if (exit) {
				$$('.popup, .popup-overlay').addClass('show exit');
				$('#exitIntent').appendTo($('.popup-content'));
				popOpen = true;
			}


		}

	}

}(jQuery))