/* ==========================================================================
   AJAX Loading
   ========================================================================== */



$$('body').data('page', 0);

var $pageURL = document.URL;
var $needle = $pageURL.search('/staff');
$pageURL = $pageURL.substr($needle);

// Reviews Load 
$$('.blog-posts-load').click(function(){
	$$(this).addClass('loading');
	var $pageNum = $$('body').data('page');
	$$('body').data('page', $pageNum + 1);

	jQuery.get($pageURL + '/' + $$('body').data('page'), 
		
		{}, 
		
		function(data){
			$loadedReviews = jQuery(data).find('.views-row');

			jQuery($loadedReviews).css('display', 'none').appendTo('.latest-posts-list').slideDown();
			$$('.blog-posts-load').removeClass('loading');
		}
	);
});

