(function ($) {

  Drupal.behaviors.gv_speedtest_page = {
    attach: function (context, settings) {

        //console.log('Speedtest!');
        /*
        function toJava(jsmethod,args) {
          var e = document.getElementById('VoipApplet');
          if (e) {
            e.fromJS(jsmethod,args);
          }
        }
        function fromJava(jsmethod,args) {
          setTimeout("flashCall(\'" + jsmethod + "\', \'" + args + "\')", 100);
        }
        function flashCall(jsmethod, args) {
          var e = document.getElementById('flashtest');
          if (e) {
            e.fromJS(jsmethod, args);
          }
        }

        
        var flashvars = {};
        var params = {
          quality: "high",
          bgcolor: "#ffffff",
          allowScriptAccess: "always"
        };
        var attributes = {
          id: "flashtest",
          name: "flashtest"
        };
        swfobject.embedSWF("sites/all/libraries/ookla/linequalitytest.swf?v=2.1.7", "linequalitytest", "640", "400", "8.0.0", "sites/all/libraries/ookla/expressInstall.swf", flashvars, params, attributes);

        */

        if ((BrowserDetect.browser != "Safari") && (BrowserDetect.browser != "Opera")) {
          if (deployJava.getJREs() == "") {
               var javaerror = document.getElementById('javaerror');
                  if (javaerror) {
                        javaerror.style.display = "block";
                  }
             }
        }
        
        

    }
  };

}(jQuery));