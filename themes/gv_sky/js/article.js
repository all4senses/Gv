/* ==========================================================================
   Newsletter Block Relocation & Logic
   ========================================================================== */

	$$('.related-posts').after($$('#subscribe'));

	var $cat = $$('.article-meta-category').data('category');
	var $subscribeText;

	switch ($cat) {
		case 'voip':
			$subscribeText = 'Join 100k readers and get exclusive VoIP industry headlines delivered to your inbox.';
			break;
		case 'business':
			$subscribeText = 'Join 100k business owners and get actionable strategies and exclusive tips delivered to your inbox.';
			break;
		case 'cloud':
			$subscribeText = 'Join 100k readers and get the latest cloud tech headlines delivered to your inbox.';
			break;
	}

	$$('.subscribe-text').html($subscribeText);

	var $submitButton = $$('#gv-misc-newslettersubscribe-form').find('#edit-submit');

	$submitButton.on('click', function(e){
		e.preventDefault();
		var clicks = $submitButton.data('clicks');

		if (clicks) {
			$$('#gv-misc-newslettersubscribe-form').submit();
		} else {
			$$('.form-item-email').addClass('show');
			$submitButton.val('Subscribe');
		}
		$submitButton.data('clicks', !clicks)
	});







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





