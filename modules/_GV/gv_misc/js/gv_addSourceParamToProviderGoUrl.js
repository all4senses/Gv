(function ($) {

  Drupal.behaviors.gv_addSourceParamToProviderGoUrl = {
    attach: function (context, settings) {
       
       //console.log(Drupal.settings['gv_misc']['addParamToProviderUrl']['uid']);
       
       
       $(".visit-site-btn").click(function(){
         
//         console.log('click');
//         console.log('href = ' + $(this).attr('href'));
         if(!$(this).attr('href').split('from=')[1]) {
           $(this).attr('href', $(this).attr('href') + '?from=' + window.location.href + '&ref=' + document.referrer);
         }
         //console.log('title = ' + $(this).attr('title'));
         
         /*
         (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'video_click',
                        oid: $(this).attr('id'),
                        click_page: window.location.href,
                        url: $(this).attr('href'),
                        title: $(this).attr('title')
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                  
            }); // end of (jQuery).ajax
            */


       });

       
    }
  };

}(jQuery));
