(function ($) {

  Drupal.behaviors.gv_GVcontentAdminPage = {
    attach: function (context, settings) {
       
       //console.log(Drupal.settings['gv_misc']['addParamToProviderUrl']['uid']);
       

       $(".set-blog-category select").change(function(){
         
         //$(this).attr('disabled', 'disabled');
         
         console.log('changed');
         console.log($(this));
         
         (jQuery).ajax({
            
                url: '/gv-content-set-blog-category', 
                data: {
                        nid: 'xxx',
                        category: $(this).val()
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('The header is arrived!');
                                    console.log(data);
                                }
                                return false;
                            } 
                  
            }); // end of (jQuery).ajax
         
   
       });

       
    }
  };

}(jQuery));
