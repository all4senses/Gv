!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);

// function($){
	var $window = $$(window);
	var $this = $$(this);

	$$('.solution-nav').insertAfter('.navigation');

	$$('.main-menu-item.first').on('click',function(){

		var clicks = $this.data('clicks');

		if (clicks) {
			$$('.solution-nav').removeClass('open');
		} else {
			$$('.solution-nav').addClass('open');
		} 

		$this.data('clicks', !clicks);
	});

	$$('.hero-header').on('click',function(){
			$$('.solution-nav').removeClass('open');
	});

// }
