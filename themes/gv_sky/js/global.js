!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);

jQuery(document).ready(function($){
	var $window = $$(window);
	var $this = $$(this);

	$$('.solution-nav').insertAfter('.navigation');

	$$('.main-menu-item.first').click(function(){
		if (!$$('.solution-nav').hasClass('open')) {
			$$('.solution-nav').addClass('open');
		} else {
			$$('.solution-nav').addClass('close');
		}
	});













});
