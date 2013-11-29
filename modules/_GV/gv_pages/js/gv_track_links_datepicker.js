(function ($) {

  Drupal.behaviors.gv_track_links_datepicker = {
    attach: function (context, settings) {

        
        console.log('Datepicker!');
        
        $( "#edit-date-from" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
          //numberOfMonths: 3,
          showAnim: 'slideDown',
          onClose: function( selectedDate ) {
            $( "#edit-date-to" ).datepicker( "option", "minDate", selectedDate );
          }
        });
        $( "#edit-date-to" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
          //numberOfMonths: 3,
          //showAnim: 'bounce',
          onClose: function( selectedDate ) {
            $( "#edit-date-from" ).datepicker( "option", "maxDate", selectedDate );
          }
        });
    
    
    }
  };

}(jQuery));