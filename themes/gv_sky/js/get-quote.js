!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);

$window = $$(window);

// ==== Get Quote popup =================================================================================
	jQuery('.get-quote-form').form('prepare');
	var $target = '';
	var $animate = ''; 
	var open = true;

	if ( $$('body').hasClass('front') ) {

		$target = $$('.section.two');
		var $showAfter = $target.offset().top + 50;

	} else {

		$target = $$('.chart').not('.sticky-table');
		var $showAfter = ($target.offset().top + $target.height()) - $window.height();
		$animate = 'animate';
		open = false;
	}
	$$('.get-quote').addClass($animate);

	var $displayed = false;
	
	$window.scroll(function(){
		var $scrolled = $window.scrollTop();
		
		if ( $scrolled > $showAfter && !$displayed) {
			$$('.get-quote').addClass('show');
			if (!open) {
				$$('.get-quote').addClass('closed');
			}
			$displayed = true;
		}
	});



	$$('.get-quote-title').click(function(){
		
		if (open) {
			jQuery(this).parent().addClass('closed');
		} else {
			jQuery(this).parent().removeClass('closed');
		}

		open = !open;

	});

	$$('.get-quote-form-button').click(function(){
		$$('.get-quote-form').submit();
	});

	$$('.get-quote-form').submit(function(e){
		console.log('submit');
		e.preventDefault();
		$$('.get-quote-form').form('submit', '/request');
	});
