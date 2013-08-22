(function ($) {

  Drupal.behaviors.gv_popup_share_link = {
    attach: function (context, settings) {
       
       // Colorbox doesn't work for some share providers.
       ////$(".share-static a").colorbox({iframe:true, innerWidth:425, innerHeight:344});
       
       
       
       $(".share-static a").click(function(){
         
         
         //console.log('click');
         //console.log('href = ' + $(this).attr('href'));
         //console.log('title = ' + $(this).attr('title'));

          // Open links in a new small poopup windows.
          // 
          //window.open("'" + $(this).attr('href')+ "'", 'ShareThis','toolbar=0,status=0,width=626,height=436'); 
          window.open($(this).attr('href'), 'ShareThis','toolbar=0,status=0,width=626,height=436,top=100,left=100'); 
          return false;
         
         // GV track click share link.
         /*
         (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'share_click', /// ToDo: to be implemented
                        oid: $(this).attr('id'),
                        click_page: window.location.href,
                        url: $(this).attr('href'),
                        title: $(this).attr('title')
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
//                    , 
//                    success: function(data) 
//                            { 
//                                if(!data.error) {
//                                    console.log('The header is arrived!');
//                                }
//                                return false;
//                            } 
                     
            }); // end of (jQuery).ajax
        */


       });

       
    }
  };

}(jQuery));

