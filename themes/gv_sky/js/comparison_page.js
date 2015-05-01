// Sidebar Append

	$$('.top-providers').prependTo('.field-name-field-preface-bottom > .field-items');










// Sticky Table Head

	var $windowOffset = $window.scrollTop();
	var $tableOffset = $$('.chart').not('.sticky-table').offset().top;
	var $tableHeight = $$('.chart').not('.sticky-table').height();
	var $theadHeight = $$('.chart thead').height();
	var $tableEnd = ($tableOffset + $tableHeight) - $theadHeight;
	var $topHideAmount = $tableEnd - $windowOffset;

	if ( $$('.chart').hasClass('horizontal') ) {
		var $tableSticky = '<table class="chart horizontal sticky-table"></table>';
	}

	if ( $$('.chart').hasClass('vertical') ) {
		var $tableSticky = '<table class="chart vertical sticky-table"></table>';
	}
	
	if ( $$('.chart').hasClass('cols4') ) {
		var $cols = 'cols4'
	}
	if ( $$('.chart').hasClass('cols5') ) {
		var $cols = 'cols5'
	}
	if ( $$('.chart').hasClass('cols6') ) {
		var $cols = 'cols6'
	}
	if ( $$('.chart').hasClass('cols7') ) {
		var $cols = 'cols7'
	}
	if ( $$('.chart').hasClass('cols8') ) {
		var $cols = 'cols8'
	}

	$$('.chart').before($tableSticky);
	$$('.chart thead').clone().addClass('sticky-table-thead').appendTo('.sticky-table');

	if ( $tableOffset - $windowOffset < 0 && $windowOffset - $tableEnd < 74 ) {
		$$('.sticky-table').addClass('show');
	}

	$$('.sticky-table').addClass($cols);


	$window.scroll(function(){
		var $windowOffset = $window.scrollTop();
		var $tableOffset = $$('.chart').not('.sticky-table').offset().top;
		var $tableHeight = $$('.chart').not('.sticky-table').height();
		var $theadHeight = $$('.chart thead').height();
		var $tableEnd = ($tableOffset + $tableHeight) - $theadHeight;
		var $topHideAmount = $tableEnd - $windowOffset;
		
		if ( $tableOffset - $windowOffset < 0 ) {

			if ( $windowOffset < $tableEnd ) {
				$$('.sticky-table').addClass('show');
			}

		} else {
			$$('.sticky-table').removeClass('show');
		}

		// ==== Horizontal =================================================================================
		if ( $$('.chart').hasClass('horizontal') ) {
			
			if ( $windowOffset >= $tableEnd && $windowOffset - $tableEnd < 74 ) {
				$$('.sticky-table').css('top', $topHideAmount);
			}

			if ( $windowOffset - $tableEnd < 0 ) {
				$$('.sticky-table').css('top', 0);
			}

			if ( $windowOffset - $tableEnd > 74 ) {
				$$('.sticky-table').removeClass('show');
			}

		}

		// ==== Vertical =================================================================================
		if ( $$('.chart').hasClass('vertical') ) {

			if ( $windowOffset >= $tableEnd && $windowOffset - $tableEnd < 168 ) {
				$$('.sticky-table').css('top', $topHideAmount);
			}

			if ( $windowOffset - $tableEnd < 0 ) {
				$$('.sticky-table').css('top', 0);
			}

			if ( $windowOffset - $tableEnd > 168 ) {
				$$('.sticky-table').removeClass('show');
			}

		}
	});
	







/* ==========================================================================
   Vertical chart mobile version markup
   ========================================================================== */


for (var i = 1; i <= $$('.vertical-tbody-reviews-item-rating').length; i++) {
	var n = i +1;
	$$('.vertical-thead-logos-item:nth-child('+ n +') .vertical-thead-logos-item-logo').first().clone().appendTo('.vertical-mobile-tbody-row:nth-child('+ i +') .vertical-mobile-tbody-row-logo');
	$$('.vertical-tbody-option:nth-child(15) .vertical-item:nth-child('+ n +') div:first').clone().addClass('vertical-mobile-tbody-row-price-text').appendTo('.vertical-mobile-tbody-row:nth-child('+ i +') .vertical-mobile-tbody-row-price');
};










/* ==========================================================================
   Reviews List Additional Markup
   ========================================================================== */


// Tempoarary Unwrapping until alex removes all unneccessary 'views' wraps
$$('.reviews-filter-sort').unwrap().unwrap();
// $$('.reviews-filter').unwrap();
$$('.reviews-list-item').unwrap();



$$('.reviews-filter').before('<div class="reviews-title">Customer Reviews</div>');

$$('.reviews-list-item').wrapAll('<div class="reviews-list" />');

$$('.reviews-list').after('<div class="reviews-load">Load More</div>')

$$('.reviews-list, .reviews-filter, .reviews-title').wrapAll('<div class="reviews" />');







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
