(function ($) {

  Drupal.behaviors.gv_getSectionArticles = {
    attach: function (context, settings) {
             
          articles = '';
          
          $('#block-gv-blocks-library-sections .more-link a').click(function(){
            console.log('clickkk');
            console.log(this);
            console.log($(this));
            console.log($(this)[0].className);
            //console.log($(this)[0]['className']);
            
            return false;
          });
          /*
          (jQuery).ajax({
            
                url: '/get_sectionarticles', 
                data: {
                        op: 'get'
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    articles = data.articles;
                                    console.log('Articles arrived: ' + articles);
                                }
                                return false;
                            } 
                    
            }); // end of (jQuery).ajax

            */

       
    }
  };

}(jQuery));
