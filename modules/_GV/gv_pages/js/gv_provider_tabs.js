(function ($) {

  Drupal.behaviors.gv_provider_tabs = {
    attach: function (context, settings) {

        
        console.log('Tabs!');
        $( ".data.tabs" ).tabs();
        
    }
  };

}(jQuery));