(function ($) {

  Drupal.behaviors.gv_countdown = {
    attach: function (context, settings) {
       
        $(".kkcount-down").kkcountdown({
          dayText		: 'day ',
          daysText 	: 'days ',
            hoursText	: 'h ',
            minutesText	: 'm ',
            secondsText	: 'c left',
            displayZeroDays : false
            //,callback	: test
            //,addClass	: 'shadow'
        });
        
        function test(){
          console.log('KONIEC');
        }


       
    }
  };

}(jQuery));
