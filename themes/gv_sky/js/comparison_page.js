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
			$$('.sticky-table').addClass('show');
		} else {
			$$('.sticky-table').removeClass('show');
		}

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
	
	for (var i = 1; i <= $$('.vertical-tbody-reviews-item-rating').length; i++) {
		var n = i +1;
		$$('.vertical-thead-logos-item:nth-child('+ n +') .vertical-thead-logos-item-logo').first().clone().appendTo('.vertical-mobile-tbody-row:nth-child('+ i +') .vertical-mobile-tbody-row-logo');
		$$('.vertical-tbody-option:nth-child(15) .vertical-item:nth-child('+ n +') div:first').clone().addClass('vertical-mobile-tbody-row-price-text').appendTo('.vertical-mobile-tbody-row:nth-child('+ i +') .vertical-mobile-tbody-row-price');
	};
	// $$('')
