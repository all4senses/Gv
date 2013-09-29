(function ($) {

  Drupal.behaviors.gv_relatedArticlesRotator = {
    attach: function (context, settings) {
       
      //$("#rotator > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true); // for a Version of UI > 1.9
      
      
      ///////$("#rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 20000, true);
      ////$("#rotator").tabs({fx:{width: "toggle"}}).tabs("rotate", 20000, true);
      
      // Doesn't work
      //$("#rotator").tabs({ hide: { effect: "explode", duration: 1000 } });
      
      
      // Works but need to be tuned
//      $("#rotator").tabs({fx:{
//          width: [ "toggle", "easeInOutBounce" ],
//          //height: [ "toggle", "swing" ],
//          left: "+=250",
//          opacity: "toggle"
//        }, duration: 10000}).tabs("rotate", 20000, true);
      
      
//      // Works
//      $("#rotator").tabs({fx: [
//                                {opacity: "toggle"}, // will be used for hide
//                                {width: "toggle"} // will be used for show
//                              ]
//                    }).tabs("rotate", 7000, true);
      
      // Doesn't work.
      //$("#rotator").tabs({fxSlide: true, fxFade: true, fxSpeed: 'fast'}).tabs("rotate", 20000, true);
      
      // Works.
       $("#rotator").tabs({fx: [
                                //{opacity: "toggle", left: ["250", 'easeInOutBounce'], duration: 100}, // will be used for hide
                                {opacity: "toggle", left: "250", duration: 250}, // will be used for hide
                                //{opacity: "toggle", left: ["0", 'easeInOutBounce'], duration: 1500} // will be used for show
                                {opacity: "toggle", left: "0", duration: 1500} // will be used for show
                              ]
                    }).tabs("rotate", 7000, true);//.tabs({  activate: function( event, ui ) {console.log('xxx'); alert('xxxx'); } });
      
      
      // Set a tab from right back to the left to move it always from left to right.
      $( "#rotator" ).bind( "tabsselect", function( event, ui ) {
        //console.log(ui);
        //console.log(ui.panel.id);
        //console.log($('#'+ui.panel.id).attr('style'));
        $('#'+ui.panel.id).attr('style', 'left: -250px;')
      });
      
      // Pause on hover.
      $("#rotator").hover(  
          function() {  
            //$("#rotator").tabs("rotate",0,true);  
            
            $("#rotator").tabs({fx: [
                                //{opacity: "toggle", left: ["250", 'easeInOutBounce'], duration: 100}, // will be used for hide
                                {opacity: "toggle", left: "250", duration: 250}, // will be used for hide
                                //{opacity: "toggle", left: ["0", 'easeInOutBounce'], duration: 1500} // will be used for show
                                {opacity: "toggle", left: "0", duration: 1500} // will be used for show
                              ]
                    }).tabs("rotate", 0, true);
            
          },  
          function() {  
            //$("#rotator").tabs("rotate",77000,true);  
            
            $("#rotator").tabs({fx: [
                                //{opacity: "toggle", left: ["250", 'easeInOutBounce'], duration: 100}, // will be used for hide
                                {opacity: "toggle", left: "250", duration: 250}, // will be used for hide
                                //{opacity: "toggle", left: ["0", 'easeInOutBounce'], duration: 1500} // will be used for show
                                {opacity: "toggle", left: "0", duration: 1500} // will be used for show
                              ]
                    }).tabs("rotate", 7000, true);
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
      
      $( ".sidebar .block .content #rotator a.title" ).each(function( index ) {
        console.log( index + ": " + $( this ).text() );
        console.log($(this));
        
        hbefore = $(this).css('height'); //$(this).height();
        console.log('h before ' + hbefore);
        //console.log('ih before ' + $(this).innerHeight());
        //console.log('oh before ' + $(this).outerHeight());
        $(this).css('height', '34px');
        hafter = css('height'); //$(this).height();
        console.log('h after ' + hafter);
        
        //hafter2 = $(this).height();
        //console.log('h after2 ' + hafter2);
        
        //console.log('ih after ' + $(this).innerHeight());
        //console.log('oh after ' + $(this).outerHeight());
        //console.log($this);
        
        //var lht = parseInt($(this).css('lineHeight'),10);
        //var lines = $(this).attr('scrollHeight') / lht;
        //console.log(lines);
        
      });

       
    }
  };

}(jQuery));
