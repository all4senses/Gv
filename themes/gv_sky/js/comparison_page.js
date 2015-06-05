/* ==========================================================================
   Sidebar Append
   ========================================================================== */

	$$('.sidebar-wrap').prependTo('.field-name-field-preface-bottom > .field-items');
	$$('.pdf').appendTo('.sidebar-wrap');

















/* ==========================================================================
   Sticky Table Head
   ========================================================================== */

	var $windowOffset = $window.scrollTop();
	var $tableOffset = $$('.chart').not('.sticky-table').offset().top;
	var $tableHeight = $$('.chart').not('.sticky-table').height();
	var $theadHeight = $$('.chart thead').height();
	var $tableEnd = ($tableOffset + $tableHeight) - $theadHeight;
	var $topHideAmount = $tableEnd - $windowOffset;

	if ( !$$('.chart').data('sticky') ) {

		if ( $$('.chart').first().hasClass('horizontal') ) {
			var $tableSticky = '<table class="chart horizontal sticky-table"></table>';
		}

		if ( $$('.chart').first().hasClass('vertical') ) {
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

		$$('.chart').first().before($tableSticky);
		$$('.chart').first().children('thead').clone().addClass('sticky-table-thead').appendTo('.sticky-table');

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
			if ( $$('.chart').first().hasClass('horizontal') ) {
				
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
			if ( $$('.chart').first().hasClass('vertical') ) {

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
	}
	






















/* ==========================================================================
   Top Picks logos chart
   ========================================================================== */

var $topPicksProviders = $$('.top-picks').find('.vertical-thead-logos-item-logo-img');
var $logos = $$('.tbody-item-php-6');

for (var i = 1; i <= $topPicksProviders.length; i++) {
	var n = i-1;
	$topPicksProviders.eq(n).append( $logos.eq(n).find('.visit-provider-url').html() );
}



















/* ==========================================================================
   Vertical chart mobile version markup
   ========================================================================== */


for (var i = 1; i <= $$('.vertical-reviews-item-rating').length; i++) {
	var n = i +1;
	$$('.vertical-thead-logos-item:nth-child('+ n +') .vertical-thead-logos-item-logo').first().clone().appendTo('.vertical-mobile-row:nth-child('+ i +') .vertical-mobile-row-logo');
	$$('.vertical-option:nth-child(15) .vertical-item:nth-child('+ n +') div:first').clone().addClass('vertical-mobile-row-price-text').appendTo('.vertical-mobile-row:nth-child('+ i +') .vertical-mobile-row-price');
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
   Review Stars hover box
   ========================================================================== */
var businessPage = window.location.pathname === '/business';

if ( businessPage ) {

	var $hoverBoxMarkup = '<div class="rating_hover"><div class="rating_hover-loading"></div></div>',
		timeoutShow,
		timeoutHide,
		providerCache = {};

	$$('.rating-link').append($hoverBoxMarkup);


	$$('.rating-link').on('mouseenter', function(){
		var $this = jQuery(this);
		var $hoverBox = $this.children('.rating_hover');
		var $providerHREF = $this.attr('href');
		var $providerNID = $this.data('nid');

		$hoverBox.addClass('hover');
		clearTimeout(timeoutShow);
		clearTimeout(timeoutHide);

		if ( providerCache[$providerNID] === undefined ) {
			requestFullRating($providerHREF, $providerNID, $hoverBox);
		}

		timeoutShow = setTimeout(function() {
			if ( $hoverBox.hasClass('hover') ) {
				hideOthers($this);
				$hoverBox.stop().css('visibility', 'visible').animate({'opacity': 1}, 150);
			}
		}, 300);
	});


	$$('.rating-link').on('mouseleave', function(){
		var $this = jQuery(this);
		var $hoverBox = $this.children('.rating_hover');

		$hoverBox.removeClass('hover');
		clearTimeout(timeoutShow);
		clearTimeout(timeoutHide);


		timeoutHide = setTimeout(function() {
			if ( !$hoverBox.hasClass('hover') ) {
				$hoverBox.stop().animate({
					'opacity': 0
				}, 100, function(){
					jQuery(this).css('visibility', 'hidden');
				});
			}
		}, 200);
	});
}







function hideOthers($this){
	var $sibling = $$('.rating-link').not($this);

	$sibling.find('.rating_hover').stop().animate({
			'opacity': 0
		}, 100, function(){
			jQuery(this).css('visibility', 'hidden');
	});
}


function requestFullRating($providerHREF, $providerNID, $hoverBox){
	var $reviewBox,
		$userReviews,
		results;

	results = jQuery.get($providerHREF, {}, function(data){
		$reviewBox = jQuery(data).find('.provider-box-provider-review');
		$userReviews = jQuery(data).find('.reviews-list-item')
								.filter(function(index){
									return index < 3
								}).each(function(){
									var $this = jQuery(this);
									var $content = $this.find('p').first();
									var $contentParent = $this.find('.field-item');
									var $newContent; 
									
									if ( $content !== undefined ) {
										var $newContent = $content.html().substr(0, 100) + '...'; 
									}

									$contentParent.html('<p>' + $newContent + '</p>');
								});
		$reviewBox = '<div class="rating_hover-stars">' + $reviewBox.html() + '</div>';
		$userReviews = '<div class="rating_hover-reviews">' + $userReviews[0].innerHTML + $userReviews[1].innerHTML + '</div>';
		catchFullRating( $reviewBox + $userReviews, $providerNID, $hoverBox );
	});

}

function catchFullRating(results, $providerNID, $hoverBox) {
	providerCache[$providerNID] = results;
	$hoverBox.html( providerCache[$providerNID] )
}























/* ==========================================================================
   AJAX Loading
   ========================================================================== */


// ==== Reviews Filter =================================================================================
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
