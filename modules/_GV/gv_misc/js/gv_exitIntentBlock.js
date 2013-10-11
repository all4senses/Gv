(function ($) {

  Drupal.behaviors.gv_exitIntentBlock = {
    attach: function (context, settings) {
       
        var done = null;
       
        $(document).bind("mouseleave", function(e)
        {
            console.log(e.pageY);
            if (!done && e.pageY <= 1)
            {    
                done = true;
                //now = new Date();           
                //for (i=0; i < times.length; i++)
                {
                    //if (now.getTime() > times[i][0] && now.getTime() < times[i][1])
                    {
                        $.fn.colorbox({iframe:true, width:650, height:600, href: "http://getvoip.com/get-popup-on-exit-intent", open: true});          
                        //alert('test');
                    }    
                }
            }
        });
       
       
    }
  };

}(jQuery));
