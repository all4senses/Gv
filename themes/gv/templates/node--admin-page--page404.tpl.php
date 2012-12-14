  <div class="main-content page404"> 


          <h1>
              <?php //print $title; ?>
          </h1>

      <div class="content page"<?php print $content_attributes; ?>>
        <?php
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          print render($content);
        ?>
      </div>
   
      <div class="bottom-clear"></div>
  

  </div> <!-- <div class="main-content"> -->

