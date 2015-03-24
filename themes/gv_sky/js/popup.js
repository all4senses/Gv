(function($){

	var $popup_overlay = '<div class="popup-overlay"></div>';
	var $popup = '<div class="popup"><div class="popup-close"></div><div class="popup-inner"></div></div>';
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
				
			}


			if (demo) {
				
			}


			if (exit) {
				$$('.popup, .popup-overlay').addClass('show', 'noanimate', 'exit');
				// $('.popup-inner').load('#exitIntent');
			}


			if (close) {
				$('.popup, .popup-overlay').removeClass('show', 'noanimate', 'quote', 'demo', 'exit');
				$$("body").css('overflow', 'visible');
				popOpen = false;
			}

		} else {
			return;
		}

	}

}(jQuery))