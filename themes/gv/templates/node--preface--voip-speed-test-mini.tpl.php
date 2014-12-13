
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
  $path_to_lib = 'ookla-mini/';
  
  ?>



<div id="speedtest-main-window">
  
  
<!-- BEGIN SPEED TEST - DO NOT ALTER BELOW-->
<script type="text/javascript" src="http://getvoip.com/ookla-mini/speedtest/swfobject.js?v=2.2"></script>
	  <div id="mini-demo">
		  Speedtest.net Mini requires at least version 8 of Flash. Please <a href="http://get.adobe.com/flashplayer/">update your client</a>.
	  </div><!--/mini-demo-->
	<script type="text/javascript">
	  var flashvars = {
			upload_extension: "php"
		};
		var params = {
			wmode: "transparent",
			quality: "high",
			menu: "false",
			allowScriptAccess: "always"
		};
		var attributes = {};
		swfobject.embedSWF("http://getvoip.com/ookla-mini/speedtest/speedtest.swf?v=2.1.8", "mini-demo", "350", "200", "9.0.0", "http://getvoip.com/ookla-mini/speedtest/expressInstall.swf", flashvars, params, attributes);
	</script>
<!-- END SPEED TEST - DO NOT ALTER ABOVE -->


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
