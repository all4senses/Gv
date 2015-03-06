(function ($) {

  Drupal.behaviors.gv_quoteRequestsAdminPage = {
    attach: function (context, settings) {
       
       //console.log(Drupal.settings['gv_misc']['addParamToProviderUrl']['uid']);
       
       
       $("select.campaign_name").change(function(){
         
//         console.log('click');
         //console.log('href = ' + $(this).attr('href'));
         
//         if(!$(this).attr('href').split('from=')[1]) {
//           $(this).attr('href', $(this).attr('href') + '?from=' + window.location.href + '&ref=' + document.referrer);
//         }
          
          // if current url already has a query, add to the query
         //emailContains = jQuery(".extra-filters .email-contains input").val();
         //campaignContains = jQuery(".extra-filters .campaign-contains input").val();
         
         ts = $(this)[0].id.split('-')[1];
         ip = encodeURIComponent($(this)[0].id.split('-')[3]);
         campaign_name = encodeURIComponent($(this)[0].selectedOptions[0].value);
         console.log('campaign_name = ' + campaign_name);
         if(window.location.href.split('?')[1]) {
          hrefToGo = window.location.href + '&op=campaign-name-set&timestamp=' + ts + '&ip=' + ip + '&campaign-name=' + campaign_name;// + $(this);
         }
         else {
           hrefToGo = window.location.href + '?op=campaign-name-set&timestamp=' + ts + '&ip=' + ip + '&campaign-name=' + campaign_name;// + $(this);
         }
         //console.log($(this));
         //console.log('hrefToGo = ' + hrefToGo);
         //console.log(window.location);
         top.location.href = hrefToGo;
          
         //console.log('href = ' + $(this).attr('href'));
         //console.log('title = ' + $(this).attr('title'));
   
       });

       
    }
  };

}(jQuery));
