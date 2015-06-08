!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);

// $window = $$(window);

// ==== Get Quote popup =================================================================================
	jQuery('.get-quote-form').form('prepare');
	// var $target = '';
	// var $animate = ''; 
	// var open = true;

	// if ( $$('body').hasClass('front') ) {

	// 	$target = $$('.section.two');
	// 	var $showAfter = $target.offset().top + 50;
	// 	// console.log($showAfter);

	// } else {

	// 	$target = $$('.chart').not('.sticky-table');
	// 	if ( $target.length ) {
	// 		var $showAfter = ($target.offset().top + $target.height()) - $window.height();
	// 	}
	// 	$animate = 'animate';
	// 	open = false;
	// }
	// $$('.get-quote').addClass($animate);

	// var $displayed = false;
	
	// $window.scroll(function(){
	// 	var $scrolled = $window.scrollTop();

	// 	if ( $scrolled > $showAfter && !$displayed) {
	// 		$$('.get-quote').addClass('show');
	// 		if (!open) {
	// 			$$('.get-quote').addClass('closed');
	// 		}
	// 		$displayed = true;
	// 	}
	// });



	// $$('.get-quote-title').click(function(){
		
	// 	if (open) {
	// 		jQuery(this).parent().addClass('closed');
	// 	} else {
	// 		jQuery(this).parent().removeClass('closed');
	// 	}

	// 	open = !open;

	// });
	$$('.get-quote-form input[name="referrer"]').val(document.referrer);
	$$('.get-quote-form input[name="url"]').val(document.URL);

	jQuery('.get-quote-form .input').each(function(){
		jQuery(this).focus(function(){
			jQuery(this).parents('.fieldset').addClass('focus');
		});
		jQuery(this).blur(function(){
			jQuery(this).parents('.fieldset').removeClass('focus');
		});

		jQuery(this).keyup(function(){
			if ( jQuery(this).val() === '' ) {
				jQuery(this).parents('.fieldset').removeClass('filled');
			} else {
				jQuery(this).parents('.fieldset').addClass('filled');
			}
		});
	});

	$$('.get-quote-form-button').click(function(){
		$$('.get-quote-form').submit();
	});

	$$('.get-quote-form').submit(function(e){
		// console.log('submit');
		e.preventDefault();
		$$('.get-quote').form('submit', '/request');
	});
