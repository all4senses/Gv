(function ($) {

  Drupal.behaviors.gv_colorbox_share_link = {
    attach: function (context, settings) {
       
       //$(".share-static a").colorbox({iframe:true, innerWidth:425, innerHeight:344});
       
       
       
       // GV track click share link.
       
       $(".share-static a").click(function(){
         
         //console.log('click');
         //console.log('href = ' + $(this).attr('href'));
         //console.log('title = ' + $(this).attr('title'));


        window.open("'" + $(this).attr('href')+ "'", 'ShareThis','toolbar=0,status=0,width=626,height=436'); 
         
       /*
       $(".yt-direct").click(function(){
         
         //console.log('click');
         //console.log('href = ' + $(this).attr('href'));
         //console.log('title = ' + $(this).attr('title'));

         (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'share_click',
                        oid: $(this).attr('id'),
                        click_page: window.location.href,
                        url: $(this).attr('href'),
                        title: $(this).attr('title')
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
//                    
//                    , 
//                    success: function(data) 
//                            { 
//                                if(!data.error) {
//                                    console.log('The header is arrived!');
//                                }
//                                return false;
//                            } 
            }); // end of (jQuery).ajax
        


       });

       */
       
    }
  };

}(jQuery));
