(function ($) {

  Drupal.behaviors.gv_watchdogAdminPage = {
    attach: function (context, settings) {
       
       
       jQuery(".wd-links a").click(function(){
         
         if (jQuery(this)[0].className == 'get-info-on-ip') {
           
           (jQuery).ajax({

                      url: '/get-ip-info', 
                      data: {
                          op: 'whois',
                          ip: jQuery(this).parent()[0].attributes.ip.value
                        }, 
                      type: 'POST', 
                      dataType: 'json'
                      , 
                      success: function(data) 
                              { 
                                  if(!data.error) {
                                      onsole.log(data.output);
                                  }
                                  return false;
                              } 
                }); // end of (jQuery).ajax
         }
         else if (confirm("Are You sure to " + jQuery(this)[0].title + "?")) 
         {
           
           //console.log(jQuery(this)[0].title);
           //console.log(jQuery(this).parent()[0].attributes.ip.value);
           //console.log(jQuery(this).parent()[0].id);
           //console.log(jQuery(this)[0].className);
           
           concat_symbol = (window.location.href.indexOf("?") > 0) ? '&' : '?';
           hrefToGo = window.location.href + concat_symbol + 'op=' + jQuery(this)[0].className + '&id=' + jQuery(this).parent()[0].id + '&ip=' + jQuery(this).parent()[0].attributes.ip.value;
           console.log(hrefToGo);
           top.location.href = hrefToGo;
           
         } // End of if (confirm("Are You sure to " + $(this).title + "?")) {
         
         return false;
         
       }); // End of $(".wd-links a").click(function(){
       
       

     
  }
};

}(jQuery));