(function ($) {

  Drupal.behaviors.gv_rotate_cached_page_table = {
    attach: function (context, settings) {

        
        //console.log('gv_rotate_cached_page_table...');
        //console.log(Drupal.settings['gv_blocks']['gv_current_top_positions_counter']); 
//        temp = Drupal.settings['gv_blocks']['gv_current_top_positions_counter'];
//        if (Drupal.settings['gv_blocks']['gv_current_top_positions_counter']) {
//            ;
//        }

    ////return;

    $('body').one('mouseover', function() {
        //console.log('ooooover...');

        (jQuery).ajax({
            
                url: '/update-cached-sip-page-ajax', 
                data: {
                        //op: 'set',
                        //url: window.location.href,
                        //referer: document.referrer
                       
                      }, 
                    type: 'GET', 
                    dataType: 'json'
                    /*
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('The header is arrived!');
                                    //console.log(data);
                                }
                                return false;
                            }
                            */
                     
            }); // end of (jQuery).ajax
        
        }); // End of hover 
      
      
    }
  };

}(jQuery));