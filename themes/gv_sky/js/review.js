// Markup Preperation
$$('article').unwrap().wrapAll('<div class="review-posts" />');
$$('.hero-review').prependTo('#main');

if ($$('.phone-box-content-section-review-intro > p:nth-child(2)').length) {
	var $summary = $$('.phone-box-content-section-review-intro > p:nth-child(2)').clone().html();
	
	if ($summary.length >= 250 ) {
		$summary = $summary.substring(0, 250) + '...';
	}

	$$('.hero-review-content-summary').html($summary);
}









// Tab Functionality

		// $$('#tab-0-c, #tab-0').addClass('active');
$$('.phone-box-tabs-item').click(function(){
	var $tabNum = jQuery(this).prop('id');
	var $assocTab = '#' + $tabNum + '-c';

	$$('.phone-box-tabs-item').removeClass('active');
	$$('.phone-box-content-section').removeClass('active');

	jQuery(this).addClass('active');
	$$($assocTab).addClass('active');

});







// Read More Scroll Down

$$('.hero-review-content-more').click(function(){
	var $boxDistance = $$('.phone-box').offset().top - 20;

	$$('html, body').animate({ scrollTop: $boxDistance }, 400);
});




// Sticky Sidebar
var $tabsScroll = $$('.phone-box-tabs').offset().top;

$window.scroll(function(){
	
	var $windowScroll = $window.scrollTop();
	var $scrollDiff = $windowScroll - $tabsScroll + 20;

	if ( $scrollDiff > 0 ) {
		$$('.phone-box-tabs').css('margin-top', $scrollDiff);
	}
	if ( $scrollDiff < 0 ) {
		$$('.phone-box-tabs').css('margin-top', 0);
	}

});