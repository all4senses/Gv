// Sidebar Append

	$$('.top-providers').prependTo('.field-name-field-preface-bottom > .field-items');






// Sticky Table Head

	var $windowOffset = $window.scrollTop();
	var $tableOffset = $$('.chart').offset().top;
	var $tableSticky = '<table class="chart horizontal sticky-table"></table>';
	
	$$('.chart').before($tableSticky);
	$$('.chart thead').clone().addClass('sticky-table-thead').appendTo('.sticky-table');

	if ( $tableOffset - $windowOffset < 0 && $windowOffset - $tableEnd < 74 ) {
		$$('.sticky-table').addClass('show');
	}

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

		if ( $windowOffset >= $tableEnd && $windowOffset - $tableEnd < 74 ) {
			$$('.sticky-table').css('top', $topHideAmount);
		}

		if ( $windowOffset - $tableEnd < 0 ) {
			$$('.sticky-table').css('top', 0);
		}

		if ( $windowOffset - $tableEnd > 74 ) {
			$$('.sticky-table').removeClass('show');
		}
	});
