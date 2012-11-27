(function ($) {

  Drupal.behaviors.gv_countdown = {
    attach: function (context, settings) {
       
       if (!$(".kkcount-down#ipad_mini").hasClass('processed')) {
         
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
          
          $(".kkcount-down#ipad_mini").addClass('processed');
       }
       
       
//        function test(){
//          console.log('KONIEC');
//        }


       
    }
  };

}(jQuery));
