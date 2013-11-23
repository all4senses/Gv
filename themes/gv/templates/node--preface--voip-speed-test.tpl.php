<?php

      $url = 'http://getvoip.com' . $_SERVER['REQUEST_URI'];
        
      if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
        $share_title = $node->metatags['title']['value'];
      }
      else {
        $share_title = $title;
      }

      echo '<div class="float share">' . gv_blocks_getSocialiteButtons($url, $share_title) . '</div>';
      
      // Floating share buttons box.
      //drupal_add_js('sites/all/libraries/jquery.plugins/stickyfloat/stickyfloat.min.js');
      ////drupal_add_js('sites/all/libraries/jquery.plugins/stickyfloat/stickyfloat.js');
      drupal_add_js('sites/all/libraries/jquery.plugins/stickyfloat/stickyfloat2.js');
      $module_path = drupal_get_path('module', 'gv_misc');
      drupal_add_js( $module_path . '/js/gv_floatingSocials.js'); 

?>


<h1 class="preface" <?php //echo preg_replace('/datatype=""/', '', $title_attributes); ?>>
      <?php 
        echo $title; 
      ?>
  </h1>

  <div class="content page preface" <?php echo $content_attributes;?>>
    
  <?php

    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);

    hide($content['field_preface_bottom']);

    echo render($content);
    

    
    
    
    
    
// Ookla speed test page original content. -------------------------------------------------------------------------------
    
  
  //$path_to_lib = 'sites/all/libraries/ookla/';
  $path_to_lib = 'ookla/';
  
  //drupal_add_js($path_to_lib . 'swfobject.js');
  drupal_add_js($path_to_lib . 'browserdetect.js');
  //drupal_add_js($path_to_lib . 'deployJava.js');
  //drupal_add_js($path_to_lib . 'functions.js');
  
  $path_to_custom_js = drupal_get_path('module', 'gv_pages') . '/js/';
  drupal_add_js($path_to_custom_js . 'gv_speedtest_page.js');
  
  
// Clear Drupal way. Doesn't work.
/*
$out = '  
<div id="abovebefore">
  <!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES -->
  Edit index.html to change or remove this example content that will <strong>disappear after</strong> the test is run once.
</div>

<div id="aboveafter" style="display: none;">
  <!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST AFTER IT COMPLETES -->
  This content will <strong>not appear until after</strong> the test is run once. Edit index.html to change or remove it.
</div>

<br/>

<div id="linequalitytest">
  The Ookla Line Quality Test requires at least version 8 of Flash. <a href="http://get.adobe.com/flashplayer/">Please update your client</a>.
</div>

          
          
<div id="speed"></div>
<div id="javaerror" style="display: none;">
   <br/>The Ookla Line Quality Test requires Java. <a href="javascript:deployJava.installLatestJRE();">Please update your client.</a><br/><br/>
</div>


          
          
          
<applet code="VoipApplet.class" archive="/sites/all/libraries/ookla/LQApplet.jar?v=1.1" width="1" height="1" mayscript id="VoipApplet" name="VoipApplet">
	<param name="bgcolor" value="ffffff">
	<param name="packetlosslength" value="100">
	<param name="tcpport" value="5060">
	<param name="udpport" value="5060">
	<param name="latencylength" value="10">
	<param name="latencypause" value="20">
	<param name="packetlosspause" value="20">
</applet>

<br/>

<div id="belowbefore">
<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES -->
This content will <strong>disappear after</strong> the test is run once. Edit index.html to change or remove it.
<br/><br/>
If you are having trouble getting things working as expected, then please see our <a href="http://wiki.ookla.com" target="_blank">documentation</a>.

</div>

<div id="belowafter" style="display: none;">
<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST AFTER IT COMPLETES -->
Edit index.html to change or remove this example content that will <strong>not appear until after</strong> the test is run once.
</div>

';
*/


// Original.
/*
$out = '
<script type="text/javascript" src="/sites/all/libraries/ookla/swfobject.js"></script>
<script type="text/javascript" src="/sites/all/libraries/ookla/browserdetect.js"></script>
<script type="text/javascript" src="/sites/all/libraries/ookla/deployJava.js"></script>
<script type="text/javascript" src="/sites/all/libraries/ookla/functions.js"></script>

<script language="JavaScript">
<!--
function toJava(jsmethod,args) {
	var e = document.getElementById("VoipApplet");
	if (e) {
		e.fromJS(jsmethod,args);
	}
}
function fromJava(jsmethod,args) {
	setTimeout("flashCall(\'" + jsmethod + "\', \'" + args + "\')", 100);
}
function flashCall(jsmethod, args) {
	var e = document.getElementById("flashtest");
	if (e) {
		e.fromJS(jsmethod, args);
	}
}
//-->
</script>


<div id="abovebefore">
<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES -->
Edit index.html to change or remove this example content that will <strong>disappear after</strong> the test is run once.
</div>

<div id="aboveafter" style="display: none;">
<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST AFTER IT COMPLETES -->
This content will <strong>not appear until after</strong> the test is run once. Edit index.html to change or remove it.
</div>

<br/>

<div id="linequalitytest">
The Ookla Line Quality Test requires at least version 8 of Flash. <a href="http://get.adobe.com/flashplayer/">Please update your client</a>.
</div>
<script type="text/javascript">
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
	swfobject.embedSWF("/sites/all/libraries/ookla/linequalitytest.swf?v=2.1.7", "linequalitytest", "640", "400", "8.0.0", "/sites/all/libraries/ookla/expressInstall.swf", flashvars, params, attributes);
</script>
<div id="speed"></div>
<div id="javaerror" style="display: none;"><br/>The Ookla Line Quality Test requires Java. <a href="javascript:deployJava.installLatestJRE();">Please update your client.</a><br/><br/></div>

<script type="text/javascript">
     if ((BrowserDetect.browser != "Safari") && (BrowserDetect.browser != "Opera")) {
          if (deployJava.getJREs() == "") {
               var javaerror = document.getElementById("javaerror");
                  if (javaerror) {
                        javaerror.style.display = "block";
                  }
             }
        }
</script>

<applet code="VoipApplet.class" archive="/sites/all/libraries/ookla/LQApplet.jar?v=1.1" width="1" height="1" mayscript id="VoipApplet" name="VoipApplet">
	<param name="bgcolor" value="ffffff">
	<param name="packetlosslength" value="100">
	<param name="tcpport" value="5060">
	<param name="udpport" value="5060">
	<param name="latencylength" value="10">
	<param name="latencypause" value="20">
	<param name="packetlosspause" value="20">
</applet>

<br/>

<div id="belowbefore">
<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES -->
This content will <strong>disappear after</strong> the test is run once. Edit index.html to change or remove it.
<br/><br/>
If you are having trouble getting things working as expected, then please see our <a href="http://wiki.ookla.com" target="_blank">documentation</a>.

</div>

<div id="belowafter" style="display: none;">
<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST AFTER IT COMPLETES -->
Edit index.html to change or remove this example content that will <strong>not appear until after</strong> the test is run once.
</div>
';
*/
  
?>
    
<?php
/*    
<script type="text/javascript" src="/sites/all/libraries/ookla/swfobject.js"></script>
<script type="text/javascript" src="/sites/all/libraries/ookla/deployJava.js"></script>
<script type="text/javascript" src="/sites/all/libraries/ookla/functions.js"></script>
*/
?>
    
<script type="text/javascript" src="/ookla/swfobject.js"></script>
<script type="text/javascript" src="/ookla/deployJava.js"></script>
<script type="text/javascript" src="/ookla/functions.js"></script>



<script language="JavaScript">

function toJava(jsmethod,args) {
	var e = document.getElementById("VoipApplet");
	if (e) {
		e.fromJS(jsmethod,args);
	}
}
function fromJava(jsmethod,args) {
	setTimeout("flashCall(\'" + jsmethod + "\', \'" + args + "\')", 100);
}
function flashCall(jsmethod, args) {
	var e = document.getElementById("flashtest");
	if (e) {
		e.fromJS(jsmethod, args);
	}
}

</script>


<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES
<div id="abovebefore">
Edit index.html to change or remove this example content that will <strong>disappear after</strong> the test is run once.
</div>
-->

<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST AFTER IT COMPLETES
<div id="aboveafter" style="display: none;">
This content will <strong>not appear until after</strong> the test is run once. Edit index.html to change or remove it.
</div>
<br/>
-->

<div id="speedtest-main-window">
  
<div id="linequalitytest">
The Ookla Line Quality Test requires at least version 8 of Flash. <a href="http://get.adobe.com/flashplayer/">Please update your client</a>.
</div>


<div id="speed"></div>
<div id="javaerror" style="display: none;"><br/>The Ookla Line Quality Test requires Java. <a href="javascript:deployJava.installLatestJRE();">Please update your client.</a><br/><br/></div>



<?php // <applet code="VoipApplet.class" archive="/sites/all/libraries/ookla/LQApplet.jar?v=1.1" width="1" height="1" mayscript id="VoipApplet" name="VoipApplet"> ?>
  <!--<applet code="VoipApplet.class" archive="/ookla/LQApplet.jar?v=1.1" width="1" height="1" mayscript id="VoipApplet" name="VoipApplet"> -->
  <applet code="VoipApplet.class" archive="/ookla/VoipApplet.jar?v=1.1" width="1" height="1" mayscript id="VoipApplet" name="VoipApplet">  

  <param name="bgcolor" value="ffffff">
	<param name="packetlosslength" value="100">
	<param name="tcpport" value="5060">
	<param name="udpport" value="5060">
  
  <param name="debug" value="false">
  
	<param name="latencylength" value="10">
	<param name="latencypause" value="20">
	<param name="packetlosspause" value="20">
</applet>



<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES
<br/>
<div id="belowbefore">

This content will <strong>disappear after</strong> the test is run once. Edit index.html to change or remove it.
<br/><br/>
If you are having trouble getting things working as expected, then please see our <a href="http://wiki.ookla.com" target="_blank">documentation</a>.
</div>
-->

<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST AFTER IT COMPLETES
<div id="belowafter" style="display: none;">
Edit index.html to change or remove this example content that will <strong>not appear until after</strong> the test is run once.
</div>
-->

</div>

<?php // End of Ookla speed test page original content. ------------------------------------------------------------------------------- ?>


    
    
    
    
  <?php

    if (@$node->field_display_type['und'][0]['value'] == 1) {
      echo render($content['field_preface_bottom']);
    }
    
  ?>

     <div class="share">
       <div class="main">
        
              <?php
              
//                if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
//                  $share_title = $node->metatags['title']['value'];
//                }
//                else {
//                  $share_title = $title;
//                }
//
//                $url = 'http://getvoip.com' . $_SERVER['REQUEST_URI']; 
//                echo gv_blocks_getSocialiteButtons($url, $share_title); 
//              
              ?> 

           </div> <!-- main -->
      </div> <!-- share buttons -->
    <?php //endif; ?>
      
  </div>
