(function ($) {

  Drupal.behaviors.gv_getSectionArticles = {
    attach: function (context, settings) {
             
          articles = '';
          
          $('#block-gv-blocks-library-sections .more-link a').click(function(){
//            console.log('clickkk');
//            console.log(this);
//            console.log($(this));
            console.log($(this)[0].className);
          
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
                            {   console.log(data);
                                if(!data.error) {
                                    articles = data.articles;
                                    console.log('Articles arrived: ' + articles);
                                }
                                return false;
                            } 
                    
            }); // end of (jQuery).ajax

            return false;
          });
          
          
            

       
    }
  };

}(jQuery));
