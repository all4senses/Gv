(function ($) {

  Drupal.behaviors.gv_watchdogAdminPage = {
    attach: function (context, settings) {
       
       
       jQuery("a.show-all").click(function(){

           concat_symbol = (window.location.href.indexOf("?") > 0) ? '&' : '?';
           hrefToGo = window.location.href + concat_symbol + 'op=show-all';
           //console.log(hrefToGo);
           top.location.href = hrefToGo;
  
         return false;
         
       }); // End of $(".wd-links a").click(function(){
       
       
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
                                      console.log(data.output);
                                  }
                                  return false;
                              } 
                }); // end of (jQuery).ajax
         }
         else if (jQuery(this)[0].className == 'block-ip') {
           
           if ((block_explain = prompt("Are You sure to " + jQuery(this)[0].title + "? \n You also may add an additional explanation here.") ) !== null) {
            console.log("block_explain = " + block_explain);
            concat_symbol = (window.location.href.indexOf("?") > 0) ? '&' : '?';
            hrefToGo = window.location.href + concat_symbol + 'op=' + jQuery(this)[0].className + '&id=' + jQuery(this).parent()[0].id + '&ip=' + jQuery(this).parent()[0].attributes.ip.value + '&block_explain=' + block_explain;
            //console.log(hrefToGo);
            top.location.href = hrefToGo;
         }
           
         } // End of if (confirm("Are You sure to " + $(this).title + "?")) {
         else if (confirm("Are You sure to " + jQuery(this)[0].title + "?")) {
           
           //console.log(jQuery(this)[0].title);
           //console.log(jQuery(this).parent()[0].attributes.ip.value);
           //console.log(jQuery(this).parent()[0].id);
           //console.log(jQuery(this)[0].className);
           
           concat_symbol = (window.location.href.indexOf("?") > 0) ? '&' : '?';
           hrefToGo = window.location.href + concat_symbol + 'op=' + jQuery(this)[0].className + '&id=' + jQuery(this).parent()[0].id + '&ip=' + jQuery(this).parent()[0].attributes.ip.value;
           //console.log(hrefToGo);
           top.location.href = hrefToGo;
           
         } // End of if (confirm("Are You sure to " + $(this).title + "?")) {
         
         return false;
         
       }); // End of $(".wd-links a").click(function(){
       
       

     
  }
};

}(jQuery));