(function ($) {

  Drupal.behaviors.gv_relatedArticlesRotator = {
    attach: function (context, settings) {
       
      //$("#rotator > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true); // for a Version of UI > 1.9
      
      //$("#rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 20000, true);
      ////$("#rotator").tabs({fx:{width: "toggle"}}).tabs("rotate", 20000, true);
      
      
      // Works but need to be tuned
//      $("#rotator").tabs({fx:{
//          width: [ "toggle", "easeInOutBounce" ],
//          //height: [ "toggle", "swing" ],
//          left: "+=250",
//          opacity: "toggle"
//        }, duration: 10000}).tabs("rotate", 20000, true);
      
      //$("#rotator").tabs({fx:{left: "+=50", duration:'slow'}}).tabs("rotate", 20000, true);
      
//      // Works
//      $("#rotator").tabs({fx: [
//                                {opacity: "toggle"}, // will be used for hide
//                                {width: "toggle"} // will be used for show
//                              ]
//                    }).tabs("rotate", 7000, true);
      
      // Doesn't work
       $("#rotator").tabs({fx: [
                                {left: "250", duration:'slow'}, // will be used for hide
                                { opacity: "toggle", left: "0" } // will be used for show
                              ]
                    }).tabs("rotate", 37000, true);
      
      
      //$("#rotator").tabs({fxSlide: true, fxFade: true, fxSpeed: 'fast'}).tabs("rotate", 20000, true);
      
      // Pause on hover.
      $("#rotator").hover(  
          function() {  
            $("#rotator").tabs("rotate",0,true);  
          },  
          function() {  
            $("#rotator").tabs("rotate",7000,true);  
            //$("#rotator").tabs("rotate",3000,true);  
          }  
      );
        
        
        
      // Show full title on hover if it was more than 3 lines and has been cutted to two lines.
      $(".sidebar .block .content #rotator a.title").hover(  
          function() {  
            $(this)[0].original_title_height = $(this).css('height');
            $(this).css('height', 'inherit');
            
            $('#block-gv-blocks-sidebar-related-articles.block .content')[0].original_title_height = $('#block-gv-blocks-sidebar-related-articles.block .content').css('height');
            $('#block-gv-blocks-sidebar-related-articles.block .content').css('height', 'inherit');
          },  
          function() {  
            $(this).css('height', $(this)[0].original_title_height);
            $('#block-gv-blocks-sidebar-related-articles.block .content').css('height', $('#block-gv-blocks-sidebar-related-articles.block .content')[0].original_title_height);
          }  
      );
      


       
    }
  };

}(jQuery));
