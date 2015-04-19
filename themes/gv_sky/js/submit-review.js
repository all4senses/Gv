jQuery(document).ready(function($){
	
	// jQuery Selector Cache
	!function(n,r){var $={};$$=function(u){var t=$[u];return t!==r?t:$[u]=n(u)},$$.clear=function(n){$[n]=r},$$.fresh=function(n){return $[n]=r,$$(n)}}(jQuery);


	// $$('.solution-nav').insertAfter('.navigation');

	// $$('.main-menu-item.first').on('click',function(){

	// 	var clicks = $this.data('clicks');

	// 	if (clicks) {
	// 		$$('.solution-nav').removeClass('open');
	// 	} else {
	// 		$$('.solution-nav').addClass('open');
	// 	} 

	// 	$this.data('clicks', !clicks);
	// });

	// $$('.hero-header').on('click, touchstart',function(){
	// 	var clicks = $$('.main-menu-item.first').data('clicks');

	// 	$$('.solution-nav').removeClass('open');
	// 	$$('.main-menu-item.first').data('clicks', !clicks);
	// });




	// ==== Add Privacy Notice after email field =================================================================================
	$$('.form-item-field-r-email-temp').after('<div class="review-form-secure"><div class="review-form-secure-text">Your last name & email <span class="review-form-secure-text-bold">will not</span> be displayed.</div></div>');






	// ==== Select Field Conditional =================================================================================
	$$('#edit-field-ref-provider-und').change(function(){
		if ( $(this).val() == '41' ) {
			$$('#edit-field-r-oprovider').addClass('show');
			$$('.form-item-field-ref-provider-und').addClass('resize');
			$$('#edit-field-r-oprovider').focus();
		} else {
			$$('#edit-field-r-oprovider').removeClass('show');
			$$('.form-item-field-ref-provider-und').removeClass('resize');
		}
	});








	// ==== Star Rating =================================================================================
	// var $fivestar = '<div class="review-form-rating-item-fivestar">
	// 					<div class="review-form-rating-item-fivestar-item star-1" data-star="1" data-name="Horrible"></div>
	// 					<div class="review-form-rating-item-fivestar-item star-2" data-star="2" data-name="Bad"></div>
	// 					<div class="review-form-rating-item-fivestar-item star-3" data-star="3" data-name="OK"></div>
	// 					<div class="review-form-rating-item-fivestar-item star-4" data-star="4" data-name="Good"></div>
	// 					<div class="review-form-rating-item-fivestar-item star-5" data-star="5" data-name="Excellent"></div>
	// 				</div>';
	var $fivestar = '<div class="review-form-rating-item-fivestar"><div class="review-form-rating-item-fivestar-item star-1" data-star="1" data-name="Horrible"></div><div class="review-form-rating-item-fivestar-item star-2" data-star="2" data-name="Bad"></div><div class="review-form-rating-item-fivestar-item star-3" data-star="3" data-name="OK"></div><div class="review-form-rating-item-fivestar-item star-4" data-star="4" data-name="Good"></div><div class="review-form-rating-item-fivestar-item star-5" data-star="5" data-name="Excellent"></div></div>';

	// Stars creation and select field conversion
	$$('.review-form-rating-item').each(function(){
		var $itemWrap = $(this).find('.form-item');
		var $itemName = $(this).find('.review-form-rating-item-name');
		var $formSelect = $(this).find('.form-select');
		var $formSelect_name = $formSelect.attr('name');
		var $newField = '<input class="review-form-rating-item-hidden" type="hidden" value="0" name="' + $formSelect_name + '" />';

		$itemWrap.remove();

		$itemName.before($fivestar);
		$itemName.before($newField);
	});



	// Star hover and click events
	$$('.review-form-rating-item-fivestar-item').hover(function(){
			var $name = $(this).data('name');	// Name of this rating
			$(this).addClass('hover');
			$(this).prevAll().addClass('hover');
			$(this).parent().siblings('.review-form-rating-item-name').html($name);	// Append hover name to .review-form-rating-item-name
			reviewTipsShow();
	}, function(){
			$$('.review-form-rating-item-fivestar-item').removeClass('hover');
			$(this).parent().siblings('.review-form-rating-item-name').html('');	// Empty name
	});

	$$('.review-form-rating-item-fivestar-item').click(function(){
			var $name = $(this).data('name');	// Name of this rating
			var $num = $(this).data('star');
			var $val = '0';

			$(this).siblings().removeClass('on');	// Remove on class from siblings
			$(this).addClass('on');
			$(this).prevAll().addClass('on');
			$(this).parent().siblings('.review-form-rating-item-name').html($name);	// Append hover name to .review-form-rating-item-name

			if ( $num == '1' ) { $val = '20'; }
			if ( $num == '2' ) { $val = '40'; }
			if ( $num == '3' ) { $val = '60'; }
			if ( $num == '4' ) { $val = '80'; }
			if ( $num == '5' ) { $val = '100'; }

			$(this).parent().siblings().val($val);
	});









	// ==== Radio Button Click Event =================================================================================
	$$('.form-type-radio').click(function(){
		$(this).siblings().removeClass('checked');
		$(this).addClass('checked');
		$(this).find('input').prop('checked', true);
	});	










	// ==== Review Tips Appearance =================================================================================
	$tipsShow = false
	function reviewTipsShow() {
		if ( !$tipsShow ) {
			$$('#edit-tips').addClass('show');
			$tipsShow = true;
		}
	}
})






























