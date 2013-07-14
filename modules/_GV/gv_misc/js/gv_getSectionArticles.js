(function ($) {

  Drupal.behaviors.gv_getSectionArticles = {
    attach: function (context, settings) {
             
          articles = '';
          in_progress = false;
          
          $('#block-gv-blocks-library-sections .more-link a').click(function(){
          
            //console.log(this);
            //console.log($(this));
            //console.log($(this)[0].className);
            
            if (in_progress) {
              return false;
            }
            
            in_progress = true;
            
            this_button = this;
            pr1 = $(this_button).parent().parent();
            loading = pr1.find('.loading');
            articles = pr1.find('.articles');
            
            $(this_button).hide();
            loading.show();
            
            
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
                                          
                                          
                                          this_button.less_atricles = articles.html();
                                          
                                          
                                          this_button.all_atricles = data.articles;
                                          
                                          console.log('before less height: ' + articles.css('height'));
                                          
                                          this_button.less_height = articles.css('min-height');
                                          console.log('min-height: ' + this_button.less_height);
                                          //this_button.less_height = articles.height();
                                          
                                          //articles.html(data.articles);
                                          articles.replaceWith(data.articles);
                                          
                                          
                                          this_button.all_height = articles.css('height');
                                          
                                          this_button.all_height = articles.height();
                                          
                                          //this_button.all_height = articles.height();
                                          console.log('all: ' + this_button.all_height);
                                          
                                          articles.css({'height': this_button.less_height, 'overflow': 'hidden'});
                                          
                                          $(this_button).css('background-position', '-95px 0');
                                          
                                          loading.hide();
                                          
                                          $(this_button).show();
                                          $(articles).animate({height: this_button.all_height},'slow');
                                      }
                                      in_progress = false;
                                      return false;
                                  } 

                  }); // end of (jQuery).ajax
                  
          }
          else {
            
            if (this_button.opened) {
              this_button.opened = false;
              /////articles.html(this_button.less_atricles);
              
              $(this_button).css('background-position', '0 0');
              
              loading.hide();
              $(this_button).show();
              $(articles).animate({height: this_button.less_height},'slow');
            }
            else {
              this_button.opened = true;
              /////articles.html(this_button.all_atricles);
              $(this_button).css('background-position', '-95px 0');
              
              loading.hide();
              
              $(this_button).show();
              $(articles).animate({height: this_button.all_height},'slow');
            }
            
            in_progress = false;
          }
          
          
          return false;
        });

          
          

       
    }
  };

}(jQuery));
