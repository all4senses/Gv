(function ($) {

  Drupal.behaviors.gv_setReferer = {
    attach: function (context, settings) {
              
       //console.log('ref...');
       
       $('body').one('mouseover', function() {
          //console.log('ooooover...');
          
          (jQuery).ajax({
            
                url: '/referer', 
                data: {
                        op: 'set',
                        url: window.location.href,
                        referer: document.referrer
                       
                      }, 
                    type: 'GET', //'POST', 
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
