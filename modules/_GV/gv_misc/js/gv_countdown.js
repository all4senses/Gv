(function ($) {

  Drupal.behaviors.gv_countdown = {
    attach: function (context, settings) {
       
        $(".kkcount-down").kkcountdown({
          dayText		: 'd ',
          daysText 	: 'd ',
            hoursText	: ':',
            minutesText	: ':',
            secondsText	: '',
            displayZeroDays : false,
            callback	: test,
            addClass	: 'shadow'
        });
        
        function test(){
          console.log('KONIEC');
        }


       
    }
  };

}(jQuery));
