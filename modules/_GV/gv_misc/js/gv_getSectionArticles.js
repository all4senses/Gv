(function ($) {

  Drupal.behaviors.gv_getSectionArticles = {
    attach: function (context, settings) {
             
          articles = '';
          opened = false;
          
          $('#block-gv-blocks-library-sections .more-link a').click(function(){
            
            this.opened = false;
//            console.log('clickkk');
            console.log(this);
            console.log($(this));
            //console.log($(this)[0].className);
          
            
            
            pr1 = $(this).parent().parent();
            //console.log(pr1);

            //console.log($(this).prev().prev());
            
            (jQuery).ajax({
            
                url: '/get-sectionarticles', 
                data: {
                        op: 'get',
                        section: $(this)[0].className
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    , 
                    success: function(data) 
                            {   
                                if(!data.error && data.articles) {
                                    //pr1 = $(this).parent().parent();
                                    console.log(pr1);
                                    pr1.find('.articles').html(data.articles);
                                    console.log('Articles arrived: ' + data.articles);
                                    opened = true;
                                }
                                return false;
                            } 
                    
            }); // end of (jQuery).ajax

            return false;
          });
          
          
            

       
    }
  };

}(jQuery));
