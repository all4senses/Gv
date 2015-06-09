!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);

// $window = $$(window);

// ==== Get Quote popup =================================================================================
	jQuery('.get-quote-form').form('prepare');
	
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
