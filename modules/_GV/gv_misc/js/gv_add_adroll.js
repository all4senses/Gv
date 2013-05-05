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

  ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
  if(oldonload){oldonload()}};
}());


var fb_param = {};
fb_param.pixel_id = '6005656184574';
fb_param.value = '0.00';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();



/*
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
        
        console.log('test onload 2');
        
        ((document.getElementsByTagName('head') || [null])[0] ||
          document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        if(oldonload){oldonload()}};
      }());
    
    }
  };

}(jQuery));
*/