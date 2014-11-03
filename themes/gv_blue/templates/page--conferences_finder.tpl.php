<!-- <div id="bshadow"> -->
 
    
      <section id="main" role="main" class="clearfix">

       
          <?php print $messages; ?>
          
          
          <!-- <img src="/sites/all/themes/gv_blue/css/images/tc_back.jpg" style="position: absolute; z-index: -10;"> -->
                    
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php 
          
            global $user;
//            if ($user->uid == 1) {
//              echo '<canvas id="link-1" width=100 height=100></canvas><canvas id="link-2" width=100 height=100></canvas>
//                    <br><button id="again">Again</button>';
//            }
          
            echo '<table class="conf-table"><tbody>',
                    '<tr><td class="header">',
                      '<table><tbody><tr><td class="side"><img src="/sites/all/themes/gv_blue/css/images/c-logo-getvoip.png" alt="GetVoIP" title="GetVoIP" /></td><td></td><td class="side"></td></tr></tbody></table>',
                      //'<img src="/sites/all/themes/gv_blue/css/images/get-voip-logo5.png" alt="GetVoIP" title="GetVoIP" />',
                      '</td></tr>',
                    '<tr><td class="search">', 
                      '<div class="title">FIND YOUR <span>TECHNOLOGY</span> CONFERENCE</div><div class="subtitle">Use our comprehensive conference finder tool to quickly browse over 330 tech conferences & shows in the US</div>',
                      gv_blocks_get_confMainSearch(), 
                    '</td></tr>',
                    '<tr><td class="links">',
                      '<div class="embed"><div class="link">'
                    . ($user->uid == 1 ? '<canvas id="link-1" width=40 height=40 style="position: absolute; top: 0; left: 0;"></canvas>' : '')
                    . 'EMBED<div class="hidden open"><div class="icon"></div><div class="data"><span>COPY</span><input type="text" readonly="readonly" value="', '<a href=http://getvoip.com/tech-conferences-finder>GetVoip Tech Conferences Finder</a>', '"/></div></div></div></div>',
                      '<div class="add-conf"><div class="link">'
                    . ($user->uid == 1 ? '<canvas id="link-2" width=40 height=40 style="position: absolute; top: 0; left: 0;"></canvas>' : '')
                    . 'ADD CONFERENCE<div class="hidden open"><div class="icon"></div><div class="data"><a href="mailto:contact@getvoip.com?subject=Add Conference" target="_blank">EMAIL US</a><span>contact@getvoip.com</span></div></div></div></div>',
                    '</td></tr>',

                    '<tr><td class="footer">© Copyright 2014 GetVoIP.com | All Rights Reserved</div></td></tr>',
                    
                 '</tbody></table>';

            
          ?>
          
          <div class="cd-overlay"></div>
        
      </section> <!-- /#main -->


      

   
  
<!-- </div> --> <!-- <div id="bshadow"> -->






<div class="cd-member-bio member-1"></div>
  