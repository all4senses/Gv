// Browser selector <html> tag
function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);

// jQuery Selector Cache
!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);


// ==== Main Menu =================================================================================
	$window = $$(window);
	$this = $$(this);
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

	$$('.hero-header').on('click, touchstart',function(){
		var clicks = $$('.main-menu-item.first').data('clicks');

		$$('.solution-nav').removeClass('open');
		$$('.main-menu-item.first').data('clicks', !clicks);
	});







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

	$$('.get-quote-form').submit(function(e){
		console.log('submit');
		e.preventDefault();
		$$('.get-quote-form').form('submit', '/request');
	});

   
   


















