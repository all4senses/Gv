(function ($) {

  Drupal.behaviors.gv_track_links_datepicker = {
    attach: function (context, settings) {

        
        console.log('Datepicker!');
        
        $( "#edit-date-from" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3,
          onClose: function( selectedDate ) {
            $( "#to" ).datepicker( "option", "minDate", selectedDate );
          }
        });
        $( "#edit-date-to" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3,
          onClose: function( selectedDate ) {
            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
          }
        });
    
    
    }
  };

}(jQuery));