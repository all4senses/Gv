(function ($) {


  // http://stackoverflow.com/questions/1617757/detect-when-mouse-leaves-via-top-of-page-with-jquery

  Drupal.behaviors.gv_exitIntent_lpV4 = {
    attach: function (context, settings) {
       
        var turned_off = true;
        
        // 3 mins delay before turn on the exitIntent popup.
        setTimeout(
                    function(){
                      turned_off = null; 
                    },
                   180000
                 ); 
       
        $(document).bind("mouseleave", function(e)
        {
            
            if (!turned_off && e.pageY - $(window).scrollTop() <= 1)
            {    
                turned_off = true;
                        // $.fn.colorbox({inline:true, href:"#exitIntent", width:780, height:440});  
            }
        });
        
        
        $("#no").click(function(){
            $.fn.colorbox.close();
        });
        
        
        
        
        
       
       
    }
  };

}(jQuery));
