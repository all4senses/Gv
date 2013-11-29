(function ($) {

  Drupal.behaviors.gv_track_links_datepicker = {
    attach: function (context, settings) {

        
        console.log('Datepicker!');
        
        $( "#edit-date-from" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
          minDate: new Date(2013, 1, 1),
          maxDate: 'today',
          showWeek: true,
          firstDay: 1,
          showAnim: 'slideDown',
          onClose: function( selectedDate ) {
            $( "#edit-date-to" ).datepicker( "option", "minDate", selectedDate );
          }
        });
        $( "#edit-date-to" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
          minDate: new Date(2013, 1, 1),
          maxDate: 'today',
          showWeek: true,
          firstDay: 1,
          onClose: function( selectedDate ) {
            $( "#edit-date-from" ).datepicker( "option", "maxDate", selectedDate );
          }
        });
    
        $( "#edit-time-from" ).timepicker({
          
        });
        $( "#edit-time-to" ).timepicker({
          
        });
    
    }
  };

}(jQuery));