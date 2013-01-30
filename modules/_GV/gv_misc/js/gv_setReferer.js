(function ($) {

  Drupal.behaviors.gv_setReferer = {
    attach: function (context, settings) {
       
       (jQuery).ajax({
            
                url: '/referer', 
                data: {
                        op: 'set',
                        url: window.location.href,
                        referrer: document.referrer
                       
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
        



       
    }
  };

}(jQuery));
