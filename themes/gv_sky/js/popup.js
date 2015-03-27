(function($){

	var $popup_overlay = '<div class="popup-overlay"></div>';
	var $popup = '<div class="popup"><div class="popup-close"></div><div class="popup-content"></div></div>';
	$('body').prepend($popup_overlay + $popup);	

	var popOpen = false;

	$.fn.popup = function($arg) {
		var quote = false;
		var demo = false;
		var exit = false;
		var close = false;
		
		if ( $arg == "quote" ) {
			var quote = true;
		} 
		if ( $arg == "demo" ) {
			var demo = true;
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
			if ( $$('.popup').hasClass('demo') || $$('.popup').hasClass('quote') ) {
				$('.popup-request').appendTo('.popup-request-container');
				$('.popup-request .step.show').removeClass('show');
				$('.popup-request .step-one').addClass('show');
			}
			$$('.popup, .popup-overlay').removeClass('show quote demo exit');
			$$("body").css('overflow', 'visible');
			popOpen = false;
		}

		if ( popOpen == false ) {
			
			if (quote) {
				$$('.popup, .popup-overlay').addClass('show quote');
				$('.popup-request').appendTo($('.popup-content'));
				popOpen = true;
				
			}


			if (demo) {
				$$('.popup, .popup-overlay').addClass('show demo');
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