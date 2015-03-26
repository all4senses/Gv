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



		if ( popOpen == false ) {
			popOpen = true;
			
			if (quote) {
				$$('.popup, .popup-overlay').addClass('show quote');
				
			}


			if (demo) {
				$$('.popup, .popup-overlay').addClass('show demo');
				
			}


			if (exit) {
				$$('.popup, .popup-overlay').addClass('show exit');
				$('#exitIntent').appendTo($('.popup-content'));
			}


		} else {

			if (close) {
				$$('.popup, .popup-overlay').removeClass('show quote demo exit');
				$$("body").css('overflow', 'visible');
				popOpen = false;
				setTimeout(function(){ $$('.popup').empty(); }, 400);
			}

			return;
		}

	}

}(jQuery))