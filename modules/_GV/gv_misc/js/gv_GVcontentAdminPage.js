(function ($) {

  Drupal.behaviors.gv_GVcontentAdminPage = {
    attach: function (context, settings) {
       
       //console.log(Drupal.settings['gv_misc']['addParamToProviderUrl']['uid']);
       

       $(".set-blog-category select").change(function(){
         
         //$(this).attr('disabled', 'disabled');
         
         //console.log('changed');
         //console.log($(this));
         nid = $(this).parent().parent().find('.nid');
         //console.log($(nid).html());
         wait = $(this).parent().parent().find('.wait');
         //console.log($(wait).html());
         $(wait).removeClass('hidden');
         
         //console.log($(this).val());
         
         (jQuery).ajax({
            
                url: '/gv-content-set-blog-category', 
                data: {
                        nid: $(nid).html(),
                        category: $(this).val()
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    //console.log('The header is arrived!');
                                    //console.log(data);
                                    //console.log(data.status);
                                    $(wait).addClass('hidden');
                                }
                                return false;
                            } 
                  
            }); // end of (jQuery).ajax
         
   
       });

       
    }
  };

}(jQuery));
