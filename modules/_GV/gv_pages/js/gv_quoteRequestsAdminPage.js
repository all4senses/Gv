(function ($) {

  Drupal.behaviors.gv_quoteRequestsAdminPage = {
    attach: function (context, settings) {
       
       //console.log(Drupal.settings['gv_misc']['addParamToProviderUrl']['uid']);
       
       
       $(".extra-filters .apply").click(function(){
         
//         console.log('click');
         //console.log('href = ' + $(this).attr('href'));
         
//         if(!$(this).attr('href').split('from=')[1]) {
//           $(this).attr('href', $(this).attr('href') + '?from=' + window.location.href + '&ref=' + document.referrer);
//         }
          
          // if current url already has a query, add to the query
//         emailContains = jQuery(".extra-filters .email-contains input").val();
//         campaignContains = jQuery(".extra-filters .campaign-contains input").val();
//         if(window.location.href.split('?')[1]) {
//          hrefToGo = window.location.href + (emailContains ? '&email-contains=' + emailContains : '') + (campaignContains ? '&campaign-contains=' + campaignContains : '');
//         }
//         else {
//           hrefToGo = window.location.href + (emailContains ? '?email-contains=' + emailContains : '') + (emailContains && campaignContains ? '&campaign-contains=' + campaignContains : (!emailContains && campaignContains ? '?campaign-contains=' + campaignContains : ''));
//         }
//         console.log('hrefToGo = ' + hrefToGo);
//         console.log(window.location);
          
         //console.log('href = ' + $(this).attr('href'));
         //console.log('title = ' + $(this).attr('title'));
   
       });

       
    }
  };

}(jQuery));
