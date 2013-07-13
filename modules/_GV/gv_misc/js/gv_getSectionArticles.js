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
            
            //console.log($(this_button).css('background'));
            //console.log($(this_button).css('width'));
            
            //$(this_button).css('background', 'url(/sites/all/themes/gv_orange/css/images/loading.gif) no-repeat 0 0 transparent').css('width', '33px').css('border-radius', '10px');
            
            //$(this_button).css({'border-radius':'10px', 'width':'33px', 'background':'url(/sites/all/themes/gv_orange/css/images/loading.gif) no-repeat 0 0 transparent'});
            //$(this_button).css('background', 'url("/sites/all/themes/gv_orange/css/images/loading.gif") no-repeat 0 0 transparent');
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
                                          this_button.less_atricles = pr1.find('.articles').html();
                                          this_button.all_atricles = data.articles;
                                          
                                          pr1.find('.articles').html(data.articles);
                                         
                                          this_button.opened = true;
//                                          if (this_button.opened) {
//                                            this_button.opened = false;
//                                            //console.log('Not opened!');
//                                          }
//                                          else {
//                                            this_button.opened = true;
//                                            //console.log('opened!');
//                                          }
                                          
                                          this_button.loaded = true;
                                      }
                                      return false;
                                  } 

                  }); // end of (jQuery).ajax
                  
          }
          else {
            if (this_button.opened) {
              this_button.opened = false;
              //console.log('Not opened!');
              pr1.find('.articles').html(this_button.less_atricles);
            }
            else {
              this_button.opened = true;
              //console.log('opened!');
              pr1.find('.articles').html(this_button.all_atricles);
            }
          }
          
            
          console.log($(this_button));
          if (this_button.opened) {
            //$(this_button).css({'border-radius':'0', 'width':'95px', 'background':'url(/sites/all/themes/gv_orange/css/images/section-view-less.png) no-repeat 0 0 transparent'});
            $(this_button).css('background', 'url(/sites/all/themes/gv_orange/css/images/section-view-less.png) no-repeat 0 0 transparent');
            console.log('Opened!');
          }
          else {
            //$(this_button).css({'border-radius':'0', 'width':'95px', 'background':'url(/sites/all/themes/gv_orange/css/images/section-view-all.png) no-repeat 0 0 transparent'});
            $(this_button).css('background', 'url(/sites/all/themes/gv_orange/css/images/section-view-all.png) no-repeat 0 0 transparent');
            console.log('Not opened!');
          }
          
          $(this_button).show();
          pr1.find('.loading').hide();
          
            
          return false;
        });

          
          

       
    }
  };

}(jQuery));
