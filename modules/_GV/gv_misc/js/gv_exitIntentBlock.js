(function ($) {


  // http://stackoverflow.com/questions/1617757/detect-when-mouse-leaves-via-top-of-page-with-jquery

  Drupal.behaviors.gv_exitIntentBlock = {
    attach: function (context, settings) {
       
        var done = null;
       
        $(document).bind("mouseleave", function(e)
        {
            console.log(e.pageY);
            
            if (!done && e.pageY - $(window).scrollTop() <= 1)
            {    
                done = true;
                // $.fn.colorbox({iframe:true, width:650, height:600, href: 'get/iframe/business-voip-chart', open: true});  
                $$("body").css('overflow', 'hidden');

                $.fn.popup("exit");
            }
        });
       
       
    }
  };

}(jQuery));
