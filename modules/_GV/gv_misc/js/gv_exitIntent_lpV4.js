(function ($) {


  // http://stackoverflow.com/questions/1617757/detect-when-mouse-leaves-via-top-of-page-with-jquery

  Drupal.behaviors.gv_exitIntent_lpV4 = {
    attach: function (context, settings) {
       
        //var turned_off = null;
        var turned_off = true;
        
        // 3 mins delay before turn on the exitIntent popup.
        setTimeout(function(){turned_off = null; console.log('popup is turned on');},180000); 
       
        $(document).bind("mouseleave", function(e)
        {
            //console.log(e.pageY);
            
            //if (!turned_off && e.pageY <= 1)
            if (!turned_off && e.pageY - $(window).scrollTop() <= 1)
            {    
                turned_off = true;
                //now = new Date();           
                //for (i=0; i < times.length; i++)
                {
                    //if (now.getTime() > times[i][0] && now.getTime() < times[i][1])
                    {
                        //$.fn.colorbox({iframe:true, width:650, height:600, href: "get-popup-on-exit-intent", open: true});  
                        
                        ////$.fn.colorbox({iframe:true, width:650, height:400, href: 'get/iframe/exitIntent_lpV4', open: true});  
                        
                        $.fn.colorbox({inline:true, href:"#exitIntent", width:780, height:440});  
                        
                        //$.fn.colorbox.close();
                        //alert('test');
                    }    
                }
            }
        });
        
        
        $("#no").click(function(){
            //console.log('Closedddddd');
            $.fn.colorbox.close();
        });
        
        
//        window.addEventListener("message", receiveMessage, false);
//        function receiveMessage(event) {
//            //alert('Message: ' + event.data);
//            if (event.data == 'close') {
//              $.fn.colorbox.close();
//            }
//        }
        
        
        
        
       
       
    }
  };

}(jQuery));
