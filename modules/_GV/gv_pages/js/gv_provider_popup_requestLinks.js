(function ($) {

  Drupal.behaviors.gv_provider_popup_requestLinks = {
    attach: function (context, settings) {
       
        //var turned_off = null;
        var turned_off = true;
        
        
        $("#request-quote").click(function(){
            console.log('Show...');
            $("body").css('overflow', 'hidden');
            $.fn.colorbox({inline:true, href:"#exitIntent", width:780, height:440});  
            turned_off = false;
            
            return false;
        });
        
        
        $("#no").click(function(){
            console.log('Closed...');
            $.fn.colorbox.close();
            turned_off = true;
            return false;
        });
        
       
    }
  };

}(jQuery));
