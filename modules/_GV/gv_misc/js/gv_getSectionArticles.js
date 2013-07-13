(function ($) {

  Drupal.behaviors.gv_getSectionArticles = {
    attach: function (context, settings) {
             
          articles = '';
          
          $('#block-gv-blocks-library-sections .more-link a').click(function(){
          
            //console.log(this);
            //console.log($(this));
            //console.log($(this)[0].className);
            
            this_button = this;
            console.log($(this_button));

            
            pr1 = $(this_button).parent().parent();
            
            if (!this_button.loaded) {

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
                                          this_button.less_atricles = pr1.find('.articles').html();
                                          this_button.all_atricles = data.articles;
                                          
                                          pr1.find('.articles').html(data.articles);
                                         
                                          if (this_button.opened) {
                                            this_button.opened = false;
                                            console.log('Not opened!');
                                          }
                                          else {
                                            this_button.opened = true;
                                            console.log('opened!');
                                          }
                                          
                                          this_button.loaded = true;
                                      }
                                      return false;
                                  } 

                  }); // end of (jQuery).ajax
                  
          }
          else {
            if (this_button.opened) {
              this_button.opened = false;
              console.log('Not opened!');
              pr1.find('.articles').html(this_button.less_atricles);
            }
            else {
              this_button.opened = true;
              console.log('opened!');
              pr1.find('.articles').html(this_button.all_atricles);
            }
          }
            
          return false;
        });

          
          

       
    }
  };

}(jQuery));
