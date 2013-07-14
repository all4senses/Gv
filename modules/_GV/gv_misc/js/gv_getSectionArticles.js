(function ($) {

  Drupal.behaviors.gv_getSectionArticles = {
    attach: function (context, settings) {
             
          articles = '';
          
          $('#block-gv-blocks-library-sections .more-link a').click(function(){
          
            //console.log(this);
            //console.log($(this));
            //console.log($(this)[0].className);
            
            this_button = this;
            pr1 = $(this_button).parent().parent();
            
            articles = pr1.find('.articles');
            
            
            //$(articles).animate({height: '1000px'},'slow');
            
            
            $(this_button).hide();
            pr1.find('.loading').show();
            
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
                                          
                                          this_button.opened = true;
                                          this_button.loaded = true;
                                          
                                          //this_button.less_atricles = pr1.find('.articles').html();
                                          this_button.less_atricles = articles.html();
                                          
                                          this_button.all_atricles = data.articles;
                                          
                                          this_button.less_height = articles.css('height');
                                          
                                          
                                          //pr1.find('.articles').html(data.articles);
                                          
                                          console.log(articles.css('height'));
                                          articles.html(data.articles);
                                          this_button.all_height = articles.css('height');
                                          console.log(articles.css('height'));
                                          
                                          articles.css({'height': this_button.less_height, 'overflow': 'hidden'});
                                          
                                          
                                          $(this_button).css('background-position', '-95px 0');
                                          pr1.find('.loading').hide();
                                          $(this_button).show();
                                          $(articles).animate({height: this_button.all_height},'slow');
                                          
                                      }
                                      return false;
                                  } 

                  }); // end of (jQuery).ajax
                  
          }
          else {
            
            if (this_button.opened) {
              this_button.opened = false;
              //pr1.find('.articles').html(this_button.less_atricles);
              articles.html(this_button.less_atricles);
              
              $(this_button).css('background-position', '0 0');
              
            }
            else {
              this_button.opened = true;
              //pr1.find('.articles').html(this_button.all_atricles);
              articles.html(this_button.all_atricles);
              $(this_button).css('background-position', '-95px 0');
              
            }
            
            pr1.find('.loading').hide();
            $(this_button).show();
          }
          
          return false;
        });

          
          

       
    }
  };

}(jQuery));
