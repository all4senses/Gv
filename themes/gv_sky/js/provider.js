
// Tab Functionality

		// $$('#tab-0-c, #tab-0').addClass('active');
$$('.provider-box-data-tabs-item').click(function(){
	var $tabNum = jQuery(this).prop('id');
	var $assocTab = '#' + $tabNum + '-c';

	$$('.provider-box-data-tabs-item').removeClass('active');
	$$('.provider-box-data-content-section').removeClass('active');

	jQuery(this).addClass('active');
	$$($assocTab).addClass('active');

});





// Tempoarary Unwrapping until alex removes all unneccessary 'views' wraps
$$('.reviews-filter-sort').unwrap().unwrap();
$$('.reviews-filter').unwrap();
$$('.reviews-list-item').unwrap();




// Sticky Sidebar
var $tabsScroll = $$('.provider-box-data-tabs').offset().top;

$window.scroll(function(){
	
	var $windowScroll = $window.scrollTop();
	var $scrollDiff = $windowScroll - $tabsScroll + 20;

	if ( $scrollDiff > 0 ) {
		$$('.provider-box-data-tabs').css('padding-top', $scrollDiff);
	}
	if ( $scrollDiff < 0 ) {
		$$('.provider-box-data-tabs').css('padding-top', 0);
	}
	if ( ($scrollDiff - 70) > 0 ) {
		$$('.provider-box-data-tabs').addClass('move');
		$$('.provider-box-provider-sticky').addClass('show');
	}
	if ( ($scrollDiff - 70) < 0 ) {
		$$('.provider-box-data-tabs').removeClass('move');
		$$('.provider-box-provider-sticky').removeClass('show');
	}

});











/* ==========================================================================
   AJAX Loading
   ========================================================================== */





// reviews-filter
$$('body').data('sort', 'created');
$$('body').data('order', 'DESC');
$$('body').data('page', 1);

$$('.reviews-filter-object-option.rating').click(function(){
	
	jQuery(this).siblings().removeClass('active');
	jQuery(this).addClass('active');
	$$('.reviews-list').addClass('disabled');

	$$('body').data('sort', 'field_r_rating_overall_value');

	jQuery.get('', 
		
		{sort_by: $$('body').data('sort'), sort_order: $$('body').data('order'), items_per_page: 10}, 
		
		function(data){
			var $loadedReviews = $$(data).find('.reviews-list-item');
			$$('.reviews-list').removeClass('disabled').html($loadedReviews);
		}
	);
});

$$('.reviews-filter-object-option.date').click(function(){
	
	jQuery(this).siblings().removeClass('active');
	jQuery(this).addClass('active');
	$$('.reviews-list').addClass('disabled');

	$$('body').data('sort', 'created');

	jQuery.get('', 
		
		{sort_by: $$('body').data('sort'), sort_order: $$('body').data('order'), items_per_page: 10}, 
		
		function(data){
			var $loadedReviews = $$(data).find('.reviews-list-item');
			$$('.reviews-list').removeClass('disabled').html($loadedReviews);
		}
	);
});

$$('.reviews-filter-object-option.asc').click(function(){
	
	jQuery(this).siblings().removeClass('active');
	jQuery(this).addClass('active');
	$$('.reviews-list').addClass('disabled');

	$$('body').data('order', 'ASC');

	jQuery.get('', 
		
		{sort_by: $$('body').data('sort'), sort_order: $$('body').data('order'), items_per_page: 10}, 
		
		function(data){
			var $loadedReviews = $$(data).find('.reviews-list-item');
			$$('.reviews-list').removeClass('disabled').html($loadedReviews);
		}
	);
});

$$('.reviews-filter-object-option.desc').click(function(){
	
	jQuery(this).siblings().removeClass('active');
	jQuery(this).addClass('active');
	$$('.reviews-list').addClass('disabled');

	$$('body').data('order', 'DESC');

	jQuery.get('', 
		
		{sort_by: $$('body').data('sort'), sort_order: $$('body').data('order'), items_per_page: 10}, 
		
		function(data){
			var $loadedReviews = $$(data).find('.reviews-list-item');
			$$('.reviews-list').removeClass('disabled').html($loadedReviews);
		}
	);
});






// Reviews Load 
$$('.reviews-load').click(function(){
	$$(this).addClass('loading');
	var $pageNum = $$('body').data('page');
	$$('body').data('page', $pageNum + 1);

	jQuery.get('', 
		
		{sort_by: $$('body').data('sort'), sort_order: $$('body').data('order'), items_per_page: 5, page: $$('body').data('page')}, 
		
		function(data){
			var $loadedReviews = jQuery(data).find('.reviews-list-item');
			jQuery($loadedReviews).css('display', 'none').appendTo('.reviews-list').slideDown();
			$$('.reviews-load').removeClass('loading');
		}
	);
});