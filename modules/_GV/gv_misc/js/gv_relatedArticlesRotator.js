(function ($) {

  Drupal.behaviors.gv_relatedArticlesRotator = {
    attach: function (context, settings) {
       
      //$("#rotator > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true); // for a Version of UI > 1.9
      
      //$("#rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 20000, true);
      ////$("#rotator").tabs({fx:{width: "toggle"}}).tabs("rotate", 20000, true);
      
      $("#rotator").tabs({fx: [
                                {opacity: "toggle"}, // will be used for hide
                                {width: "toggle"} // will be used for show
                              ]
                    }).tabs("rotate", 7000, true);
      
      
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
