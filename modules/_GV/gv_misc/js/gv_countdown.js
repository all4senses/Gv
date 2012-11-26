(function ($) {

  Drupal.behaviors.gv_countdown = {
    attach: function (context, settings) {
       
        $(".kkcount-down#ipad_mini").kkcountdown({
          dayText		: 'day ',
          daysText 	: 'days ',
          hoursText	: 'h ',
          minutesText	: 'm ',
          secondsText	: 's left',
          displayZeroDays : false
          //,callback	: test
          //,addClass	: 'shadow'
        });
        
//        function test(){
//          console.log('KONIEC');
//        }


       
    }
  };

}(jQuery));
