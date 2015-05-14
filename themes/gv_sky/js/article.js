/* ==========================================================================
   Newsletter Block Relocation & Logic
   ========================================================================== */

	// $$('.article').after($$('#subscribe'));
	$$('#subscribe').appendTo($$('.article'));

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



	$$('#subscribe #edit-email').on('change keydown', function(){
	    var email = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    var $this = jQuery(this);

		if ( $this.val() === "" || !email.test($this.val()) ) {
			$this.removeClass('valid');
		} else {
			$this.addClass('valid').removeClass('error');
		}
	});

	var $submitButton = $$('#subscribe #edit-submit');

	$submitButton.on('click', function(e){
		e.preventDefault();

		if ( $$('#subscribe #edit-email').hasClass('valid') ) {
			$$('#gv-misc-newslettersubscribe-form').submit();
		} else {
			$$('#subscribe #edit-email').addClass('error');
		}
	});


	$$('#subscribe').hover(function(){
		$$('#subscribe').addClass('hover');
	}, function(){
		$$('#subscribe').removeClass('hover');
	});


	// Mobile Scroll trigger
	var mobile = $$('html').hasClass('mobile');
	var $subscribeScroll = $$('#subscribe').offset().top;
	var $height = innerHeight;

	if ( mobile ) {	
		$window.on('scroll', function(){
			var $height = innerHeight;
			var scrolledBefore = window.pageYOffset < $subscribeScroll - ($height/2);
			var scrolledAt = window.pageYOffset > $subscribeScroll - ($height/2);
			var scrolledIn = window.pageYOffset < $subscribeScroll - ($height/2) + $$('#subscribe').height();
			var scrolledAfter = window.pageYOffset > $subscribeScroll - ($height/2) + $$('#subscribe').height();

			if ( scrolledAt && scrolledIn ) {
				$$('#subscribe').addClass('hover');
			}
			if ( scrolledAfter || scrolledBefore ) {
				$$('#subscribe').removeClass('hover');
			}
		});
	}





























/* ==========================================================================
   Window Scroll tracking for social share box
   ========================================================================== */

	// var $fixedToggle = false;
	// var $height = $window.height();
	
	// $window.resize(function(){
	// 	$height = $window.height();
	// });

	// if ($height >= 900) {
	// 	$$('.social-share').addClass('show');
	// }
	
	// $window.scroll(function(){
	// 	var $scroll = $window.scrollTop();
	// 	var $scrollRequired = 860 - $height;

	// 	if ($scroll >= $scrollRequired && $fixedToggle == false && $height <= 900) {
	// 		$$('.social-share').addClass('show');
	// 		$fixedToggle = true;
	// 	} 
	// 	if ($scroll < $scrollRequired && $fixedToggle == true && $height <= 900) {
	// 		$$('.social-share').removeClass('show');
	// 		$fixedToggle = false;
	// 	}
	// });






















/* ==========================================================================
   Table wrapper add
   ========================================================================== */

   // $$('table').wrap('<div class="table-wrap" />');






















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





