/* ==========================================================================
   Window Scroll tracking for social share box
   ========================================================================== */

	var $fixedToggle = false;
	var $height = $window.height();
	
	$window.resize(function(){
		$height = $window.height();
	});

	if ($height >= 900) {
		$$('.social-share').addClass('show');
	}
	
	$window.scroll(function(){
		var $scroll = $window.scrollTop();
		var $scrollRequired = 860 - $height;

		if ($scroll >= $scrollRequired && $fixedToggle == false && $height <= 900) {
			$$('.social-share').addClass('show');
			$fixedToggle = true;
		} 
		if ($scroll < $scrollRequired && $fixedToggle == true && $height <= 900) {
			$$('.social-share').removeClass('show');
			$fixedToggle = false;
		}
	});






/* ==========================================================================
   Disqus Thread additional Markup
   ========================================================================== */

   $$('#disqus_thread').wrap('<div class="disqus-wrap" />');











/* ==========================================================================
   Social Links expand
   ========================================================================== */
   	
   	var $expandState = 'closed';

	$$('.social-share-item.expand').click(function(){

		if ( $expandState == 'closed' ) {
			$expandState = 'open'
			$$('.social-share-item.expand').addClass('open');
			$$('.social-share-items-hidden').addClass('show');
		} else {
			$expandState = 'closed'
			$$('.social-share-item.expand').removeClass('open');
			$$('.social-share-items-hidden').removeClass('show');
		}

	});

	// $$('.social-share-item.expand, .social-share-items-hidden').mouseenter(function(){
	// 		$$('.social-share-item.expand').addClass('open');
	// 		$$('.social-share-items-hidden').addClass('show');
	// })
	// .mouseleave(function(){
	// 		setTimeout(function(){
	// 			$$('.social-share-item.expand').removeClass('open');
	// 			$$('.social-share-items-hidden').removeClass('show');
	// 		}, 1000);
	// });





