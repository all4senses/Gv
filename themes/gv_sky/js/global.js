// Browser selector <html> tag
function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);

// jQuery Selector Cache
!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);






$window = $$(window);
$this = $$(this);


// ==== Main Menu =================================================================================
	jQuery(document).ready(function($){ 
	  
		//$$('.solution-nav').insertAfter('.navigation');

		$$('.main-menu-item.first').on('click',function(){
      
			var clicks = $this.data('clicks');

			if (clicks) {
				$$('.solution-nav').removeClass('open');
			} else {
				$$('.solution-nav').addClass('open');
			} 

			$this.data('clicks', !clicks);
		});

		$$('.hero-header').on('click, touchstart',function(){
			var clicks = $$('.main-menu-item.first').data('clicks');

			$$('.solution-nav').removeClass('open');
			$$('.main-menu-item.first').data('clicks', !clicks);
		});
	});












// ==== Form Plugin (By Daniel) =================================================================================
(function($){

	$.fn.form = function($arg, $url) {
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

			this.find('.fieldset').not('.radio, .checkbox').each(function(){

				if ( $(this).hasClass('required') ) {
					$(this).find('.input').not('.phone, .email').on('change keydown', function(){
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
						$(this).find('.input').prop('checked', true);
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
		            if( !(     event.keyCode == 8                                // backspace
		                    || event.keyCode == 9 								// tab
		                    || event.keyCode == 16 								// shift
		                    || event.keyCode == 17 								// ctrl
		                    || event.keyCode == 18 								// alt
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
				$(this).change(function(){
					if ( $(this).val() == "" || $(this).val().length < 7 ) {
						$(this).parents('.fieldset').removeClass('valid');
					} else {
						$(this).parents('.fieldset').addClass('valid').removeClass('error');
					}
				});
			});

			this.find('.email').each(function(){
				$(this).on('change keydown', function(){
				    var email = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

					if ( $(this).val() == "" || !email.test($(this).val()) ) {
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
					// console.log('invalid');
					// console.log($(this).attr('class'));

				} else {
					$(this).removeClass('error');
				}
			});

			if ( problem ) {
				proceed = false;
				// console.log('stop');
			} else {
				proceed = true;
				// console.log('proceed');
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




























