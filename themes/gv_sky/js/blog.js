/* ==========================================================================
   Window Scroll tracking for sticky cat-filter
   ========================================================================== */

	
	$window.scroll(function(){
		var $scroll = $window.scrollTop();

		if ($scroll >= 235 ) {
			$$('.cat-filter-header.cat-filter').addClass('show');
		} else {
			$$('.cat-filter-header.cat-filter').removeClass('show');
		}
	});










/* ==========================================================================
   Post item Markup Editing
   ========================================================================== */
	
	// Initial Category set
   	var $cat = 'all';

	// First post markup editing
		var $firstPost = $$('.blog-posts-item').first();
		$firstPost.addClass('large');
		$firstPost.after(' '); // Whitespace addition inorder to make the inline-block justification work

		// Clone and append the content text
		$firstPost.find('.blog-posts-item-content').clone().addClass('mobile').appendTo($firstPost.find('.blog-posts-item-wrap'));

		// Add class to the original in order to enable hiding at mobile screen sizes
		$$('.blog-posts-item-content').first().addClass('desktop');



		// Perform Trim and replace existing text
		var $mobileText = $$('.blog-posts-item-content.mobile');
		$mobileText.html(trimText($mobileText));





	// All other posts markup editing
		var $allPosts = jQuery('.blog-posts-item:not(:first)');

		fixPostMarkup($allPosts);

	// Add blank gap items to compensate for the missing space on rows that have less than 3 items.
		var $blankGap = '<div class="blog-posts-gap"></div><div class="blog-posts-gap"></div>';
		$$($blankGap).appendTo('.blog-posts');












/* ==========================================================================
   Image Click URL redirect
   ========================================================================== */
	
	$$('.blog-posts-item').each(function(){

		jQuery(this).find('.blog-posts-item-img-actual').click(function(){
		});
	});

	$$('.blog-posts').on('click', '.blog-posts-item-img-actual', function(){
		var $link = jQuery(this).parent().parent().find('.blog-posts-item-title-link').attr('href');

		window.location = $link;
	});












/* ==========================================================================
   Filter Markup Append
   ========================================================================== */

	$$('.cat-filter').prependTo('#main');



















/* ==========================================================================
   Apply Category Filters to post items
   ========================================================================== */

   filterApplication($$('.blog-posts-item'), true);











/* ==========================================================================
   AJAX Loading
   ========================================================================== */



$$('body').data('page', 0);

// Reviews Load 
$$('.blog-posts-load').click(function(){
	$$(this).addClass('loading');
	var $pageNum = $$('body').data('page');
	$$('body').data('page', $pageNum + 1);

	jQuery.get('blog/' + $$('body').data('page'), 
		
		{}, 
		
		function(data){
			$loadedReviews = jQuery(data).find('.blog-posts-item');
			fixPostMarkup($loadedReviews);
			filterApplication($loadedReviews, false);

			jQuery($loadedReviews).css('display', 'none').insertBefore('.blog-posts-gap:nth-last-child(2)').slideDown();
			jQuery('.blog-posts-item').after(' ');
			// fixThirdPostMargin();
			$$('.blog-posts-load').removeClass('loading');
		}
	);
});








/* ==========================================================================
   FUNCTIONS
   ========================================================================== */

function trimText($subject) {
	var $text = $subject.html();

		if ($text.length >= 126 ) {
			$text = $text.substring(0, 126) + '...';
			return $text;
		}
}


function fixPostMarkup($subject) {
	
	$subject.find('.blog-posts-item-more').remove();

	$subject.each(function(){

		// Add whitespace after each item to have maintain the justifying effect on the blog items
		jQuery(this).after(' ');

		// Trim Text
		var $item = jQuery(this).find('.blog-posts-item-content');
		var $text = $item.html();
		// console.log($item.html());
		
		if ($text.length >= 126 ) {
			$text = $text.substring(0, 126) + '...';
			$item.html($text);
		}
	});

}


// Filter Functiong
function filterApplication($subject, $category) {
	
	$$('.cat-filter-list-item').click(function(){
		
		var $filterCat = '.category-' + jQuery(this).data('category');

		$$('.cat-filter-list-item').removeClass('active');
		$$('.cat-filter-list-item' + $filterCat).addClass('active');

		if ( $category == true ) {
			$cat = jQuery(this).data('category');
		}

		preparePosts4Filter($subject);

	});

}

function preparePosts4Filter($subject) {
		if ( $cat != 'all' ) {

			$subject.each(function(){
				var $item_cat = jQuery(this).find('.blog-posts-item-category').data('category');

				if ( $cat != $item_cat ) {
					jQuery(this).removeClass('show').hide('300');

				} else {
					jQuery(this).addClass('show').show('300');
				}
			});
		} else {
			$subject.addClass('show').show('300');
		}

}
