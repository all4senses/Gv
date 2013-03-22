(function ($) {

  Drupal.behaviors.gv_add_adroll = {
    attach: function (context, settings) {
      
      adroll_adv_id = "YJ2QITGB3FFUPCENFTQBW7";
      adroll_pix_id = "X2ZQHGK7VZDKNJRBCO6IOF";
      (function () {
      var oldonload = window.onload;
      window.onload = function(){
        __adroll_loaded=true;
        var scr = document.createElement("script");
        var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
        scr.setAttribute('async', 'true');
        scr.type = "text/javascript";
        scr.src = host + "/j/roundtrip.js";
        
        console.log('test');
        
        ((document.getElementsByTagName('head') || [null])[0] ||
          document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        if(oldonload){oldonload()}};
      }());
    
    
    }
  };

}(jQuery));