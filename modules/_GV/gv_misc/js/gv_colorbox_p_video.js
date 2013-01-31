(function ($) {

  Drupal.behaviors.gv_colorbox_p_video = {
    attach: function (context, settings) {
       
       $(".yt-direct").colorbox({iframe:true, innerWidth:425, innerHeight:344});
       
       $(".yt-direct").click(function(){
         console.log('click');
         console.log('href = ' + $(this).attr('href'));
         console.log('title = ' + $(this).attr('title'));
         return;
         (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'video_click',
                        click_on_page: window.location.href,
                        url: this.attr('href')
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    /*
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('The header is arrived!');
                                }
                                return false;
                            } 
                     */
            }); // end of (jQuery).ajax
        


       });

       
    }
  };

}(jQuery));
