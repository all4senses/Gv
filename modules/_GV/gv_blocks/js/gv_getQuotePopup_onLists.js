(function ($) {

  Drupal.behaviors.gv_getQuotePopup_onLists = {
    attach: function (context, settings) {
       
        //var turned_off = null;
        var turned_off = true;
        
        
        
        
        $(".get_quote_popup").click(function(){
            //console.log('Show...');
            
            // Disable page scrolling
            // Other ways of scrolling disabling - 
            // http://stackoverflow.com/questions/4770025/how-to-disable-scrolling-temporarily
            // http://stackoverflow.com/questions/19817899/jquery-or-javascript-how-to-disable-window-scroll-without-overflowhidden
            $("body").css('overflow', 'hidden');
            
            
            $.fn.colorbox({
              inline:true, 
              href:".popup-request.quote", 
              width:730, 
              height:606, 
              onClosed: function() {
               //console.log('closed...');
               $("body").css('overflow', 'inherit');
               turned_off = true;
              }
            });  
            
            
            turned_off = false;
            
            if ($(".popup-request.quote form").css('display') == 'block') {
              $('.popup-request.quote .results').hide();
            }
            
            return false;
        });
        
        
        /*
        $("#no").click(function(){
            //console.log('Closed...');
            
            // Enabling back the page scrolling
            $("body").css('overflow', 'inherit');
            
            $.fn.colorbox.close();
            turned_off = true;
            return false;
        });
        */
    
        
        
        
        /*
        $("#cboxOverlay").click(function(){
            //console.log('Closed via body click...');
            // Enabling back the page scrolling
            $("body").css('overflow', 'inherit');
            
            //$('.popup-request').hide();
            
//            $('.popup-request .sending').hide();
//            $(".popup-request .success").hide();
//            $('.popup-request .multipartForm').show();
            turned_off = true;
            //return false;
        });
        */
        
        
        
        
       
    }
  };

}(jQuery));
