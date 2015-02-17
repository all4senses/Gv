(function ($) {

  Drupal.behaviors.gv_track_direct_link = {
    attach: function (context, settings) {
      
       $(".direct-link").click(function(event){
         
         event.preventDefault();
         
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
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    
                     
            }); // end of (jQuery).ajax
        

            // Now we open an url in a new window.
            window.open(provider_direct_url);
            
            
       });

       
    }
  };

}(jQuery));
