(function ($) {

  Drupal.behaviors.gv_track_direct_link = {
    attach: function (context, settings) {
       
       
       // GV track provider direct link.
       //alert('.');
       $(".direct-link").click(function(){
         
         //console.log('direct link click');
         //console.log('href = ' + $(this).attr('href'));
         //console.log('title = ' + $(this).attr('title'));

         (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'provider',
                        oid: $(this).attr('id'),
                        click_page: window.location.href,
                        url: $(this).attr('href'),
                        title: $(this).attr('title')
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    /*
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('The header is arrived!');
                                }
                                return false;
                            } 
                     */
            }); // end of (jQuery).ajax
        


       });

       
    }
  };

}(jQuery));
