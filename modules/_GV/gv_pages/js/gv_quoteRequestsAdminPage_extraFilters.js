(function ($) {

  Drupal.behaviors.gv_quoteRequestsAdminPage_extraFilters = {
    attach: function (context, settings) {
       
       //console.log(Drupal.settings['gv_misc']['addParamToProviderUrl']['uid']);
       
       
       $(".extra-filters .apply").click(function(){
         
//         console.log('click');
         //console.log('href = ' + $(this).attr('href'));
         
//         if(!$(this).attr('href').split('from=')[1]) {
//           $(this).attr('href', $(this).attr('href') + '?from=' + window.location.href + '&ref=' + document.referrer);
//         }
          
         //console.log(window.location);
          
         //console.log('href = ' + $(this).attr('href'));
         //console.log('title = ' + $(this).attr('title'));
   
       });

       
    }
  };

}(jQuery));
