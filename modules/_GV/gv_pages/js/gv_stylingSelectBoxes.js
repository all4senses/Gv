(function ($) {

  Drupal.behaviors.gv_stylingSelectBoxes = {
    attach: function (context, settings) {
      
      
        // Styling select forms

        //$('select').selectmenu();
        $('select').selectmenu({
          //style:'popup', 
          maxHeight: 300
  			});
        
      
    
    }
  };

}(jQuery));