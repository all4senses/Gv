(function ($) {

  Drupal.behaviors.gv_quoteRequestsAdminPage = {
    attach: function (context, settings) {
       
       // Delete request 
       
       jQuery("#edit-delete-requests a").click(function(){
          console.log('delete requests click');
          
          with_email_contains = jQuery("#edit-delete-requests .email-contains-delete input").val();
          console.log(with_email_contains);
          with_ip = jQuery("#edit-delete-requests .ip-delete input").val();
          console.log(with_ip);
          
          if (with_email_contains || with_ip) {
            hrefToGo = window.location.href + '?op=requests-delete-by' + (with_email_contains ? ('&email-contains=' + with_email_contains) : '') + (with_email_contains ? ('&ip=' + with_email_contains) : '');
            console.log('hrefToGo = ' + hrefToGo);
            //top.location.href = hrefToGo;
          }
          else {
            alert('Please set email or ip');
          }
          return false;
       });
       
       
       
       // Delete newsletter subscribed email.
       selected_emails = "";
       num_of_selected_emails = 0;
       
       $(".newsletters-emails .nl-email").click(function(){
          //console.log('email click');
          //console.log($(this).text());
          //console.log(jQuery(this)[0].id); 
          jQuery(this).toggleClass("selected");
          selected_emails = "";
          num_of_selected_emails = 0;
          jQuery(".selected").each(function(){
            selected_emails += (selected_emails ? "," : "") + jQuery(this)[0].id;
            num_of_selected_emails++;
          }); 
          if (selected_emails) {
            //console.log(selected_emails);
            jQuery(".nl-delete-selected").text('Delete ' + num_of_selected_emails + ' selected email(s)');
            jQuery(".nl-delete-selected").show();
          }
          else {
            //console.log("None selected");
            jQuery(".nl-delete-selected").hide();
          }
       });
       
       $(".nl-delete-selected").click(function(){
         
         if (confirm("Delete ALL selected emails?")) {
           
            //console.log('Remove selected...');
            jQuery(this).hide();

            (jQuery).ajax({

                      url: '/subscr/delete', 
                      data: {
                          ids: selected_emails
                        }, 
                      type: 'POST', 
                      dataType: 'json'
                      , 
                      success: function(data) 
                              { 
                                  if(!data.error) {
                                      //console.log(data);
                                      
                                      //console.log("Done.");
                                      alert(data.message);
                                      
                                      selected_emails = "";
                                      jQuery(".selected").each(function(){

                                        //jQuery(this).remove();

                                        jQuery(this).fadeOut(2000, function(){
                                          jQuery(this).remove();
                                        });

                                      }); 
                                      
                                  }
                                  return false;
                              } 
                }); // end of (jQuery).ajax
         }
       }); // End of $(".nl-delete-selected").click(function(){
       
       
       
       // Set quote request campaign name.
       
       //console.log(Drupal.settings['gv_misc']['addParamToProviderUrl']['uid']);
       //console.log(Drupal.settings['gv_campaign_names']);
       
       /*
       $(".form-item-campaign-n-contains input").autocomplete({
          minLength: 0,
          //source: [ 'Google US/LP', 'Google UK/LP', '7Search', 'Bing', 'Google PPC/Site', 'Organic', 'Other' ]
          source: Drupal.settings['gv_campaign_names']
       });
       */

       $("select.campaign_name").change(function() {
         
         $("select.campaign_name").attr('disabled', 'disabled');
         
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
       //console.log('campaign_name = ' + campaign_name);
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
 
     }); // End of $("select.campaign_name").change(function(){

     
  }
};

}(jQuery));