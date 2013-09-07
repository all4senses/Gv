(function ($) {

  Drupal.behaviors.gv_relatedArticlesRotator = {
    attach: function (context, settings) {
       
      //$("#rotator > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true); // for a Version of UI > 1.9
      
      $("#rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 30000, true);
      //$("#rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 3000, true);
      
      // Pause on hover.
      $("#rotator").hover(  
          function() {  
            $("#rotator").tabs("rotate",0,true);  
          },  
          function() {  
            $("#rotator").tabs("rotate",30000,true);  
            //$("#rotator").tabs("rotate",3000,true);  
          }  
      );
        
        
        
        
      $(".sidebar .block .content #rotator a.title").hover(  
          function() {  
            $(this)[0].original_title_height = $(this).css('height');
            $(this).css('height', 'inherit');
            console.log( $(this).css('height'));
            
            $('#block-gv-blocks-sidebar-related-articles.block .content')[0].original_title_height = $('#block-gv-blocks-sidebar-related-articles.block .content').css('height');
            $('#block-gv-blocks-sidebar-related-articles.block .content').css('height', 'inherit');
            
            
          },  
          function() {  
            $(this).css('height', $(this)[0].original_title_height);
            console.log( $(this).css('height'));
            
            $('#block-gv-blocks-sidebar-related-articles.block .content').css('height', $('#block-gv-blocks-sidebar-related-articles.block .content')[0].original_title_height);
          }  
      );
        
//      $('.sidebar .block .content #rotator a.title').mouseenter(function(){
//        console.log($(this).css('height'));
//        console.log($(this));
//        console.log($(this)[0].parentElement.id);
//        
//        $(this)[0].original_title_height = $(this).css('height');
//        console.log($(this));
//        
//        //original_title_height[$(this)[0].parentElement.id] = $(this).css('height');
//        
//        //console.log($(this)[0].parentElement.id);
//        //console.log(original_title_height[$(this)[0].parentElement.id]);
//
//        //jQuery('.sidebar .block .content #rotator a.title').css('height');
//        //console.log(original_height);
//        //console.log(original_title_height[this.parentElement.id]);
//        
//        //console.log(original_title_height);
//
//        //jQuery('.sidebar .block .content #rotator a.title').css('height', 'inherit');
//        ///this.css('height', 'inherit');
//      });
//      
      


       
    }
  };

}(jQuery));
