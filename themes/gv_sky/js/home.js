$$('#tab-0-c, #tab-0').addClass('active');

$$('.learn-box-tabs-item').click(function(){
	var $tabNum = jQuery(this).prop('id');
	var $assocTab = '#' + $tabNum + '-c';

	$$('.learn-box-tabs-item').removeClass('active');
	$$('.learn-box-content-section').removeClass('active');

	jQuery(this).addClass('active');
	$$($assocTab).addClass('active');

});

