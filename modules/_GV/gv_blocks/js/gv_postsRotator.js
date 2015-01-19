(function ($) {

  Drupal.behaviors.gv_postsRotator = {
    attach: function (context, settings) {
       
      
       
      //$("#p-rotator > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true); // for a Version of UI > 1.9
      
      console.log('p-rotator...');
      
      var rtabs = $("#p-rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 1000, true);
      //var rtabs = $("#p-rotator").tabs({fx:{opacity: "toggle"}}); // Without auto rotation
      var ltabs = rtabs.tabs('length');
       
      // Pause rotation  on hover.
      /*
      $("#p-rotator").hover(  
          function() {  
            $("#p-rotator").tabs("rotate",0,true);  
          },  
          function() {  
            $("#p-rotator").tabs("rotate",10000,true);  
          }  
      ); 
      */  
        
      $("#p-rotator-wrapper #next3").click(function() {
          var active = $( "#p-rotator" ).tabs( "option", "selected" );
          if (active == ltabs - 1 ) {
            active = 0;
          }
          else {
            active++;
          }

          rtabs.tabs('select', active);
          // Doesn't work - other version (newer)
          //$( "#p-rotator" ).tabs( "option", "active", active + 1 );

      });
      
      $("#p-rotator-wrapper #prev3").click(function() {
          var active = $( "#p-rotator" ).tabs( "option", "selected" );
          if (active == 0 ) {
            active = ltabs - 1;
          }
          else {
            active--;
          }

          rtabs.tabs('select', active);
      });
      
      
      
      $("#p-rotator .ui-tabs-panel").removeClass('hidden'); 
       
    }
  };

}(jQuery));
