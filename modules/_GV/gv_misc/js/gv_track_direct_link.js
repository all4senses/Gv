(function ($) {

  Drupal.behaviors.gv_track_direct_link = {
    attach: function (context, settings) {
      
       console.log('Click tracking...');
       
       // GV track provider direct link.
       //alert('.');
       $(".direct-link").click(function(event){
         
         event.preventDefault();
         
         console.log('direct link click');
         console.log('href = ' + $(this).attr('href'));
         console.log('title = ' + $(this).attr('title'));
         
         var provider_direct_url = $(this).attr('href');
         var click_page = window.location.href;
         
         (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'provider',
                        oid: $(this).attr('id'),
                        click_page: click_page,
                        url: provider_direct_url,
                        title: $(this).attr('title')
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('Provider click is tracked');
                                }
                                return false;
                            } 
                     
            }); // end of (jQuery).ajax
        

            // Now we open an url in a new window.
            window.open(provider_direct_url);
            
            
       });

       
    }
  };

}(jQuery));
