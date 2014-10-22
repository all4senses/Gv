<!-- <div id="bshadow"> -->
 
    
      <section id="main" role="main" class="clearfix">

       
          <?php print $messages; ?>
          
          
          <img src="/sites/all/themes/gv_blue/css/images/tc_back.jpg" style="position: absolute; z-index: -10;">
                    
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php 
            echo '<table class="conf-table"><tbody>',
                    '<tr><td class="header">Logo</td></tr>',
                    '<tr><td class="search">', gv_blocks_get_confMainSearch(), '</td></tr>',
                    '<tr><td class="embed"><div class="link">EMBED<div class="hidden open"><span>COPY</span><input type="text" readonly="readonly" value="' . '<a href=http://getvoip.com/tech-conferences-finder>GetVoip Tech Conferences Finder</a>' . '"/></div></div></td></tr>',
                    '<tr><td class="add-conf"><div class="link">ADD CONFERENCE<div class="hidden open"><a href="mailto:contact@getvoip.com?subject=Add%Conference" target="_blank">EMAIL US</a><span>contact@getvoip.com</span></div></div></td></tr>',
                    '<tr><td class="footer"><div class="c"><div>Copyright</div> 2014 GetVoIP.com | All Rights Reserved</div></td></tr>',
                    
                 '</tbody></table>';

            
          ?>
          
          <div class="cd-overlay"></div>
        
      </section> <!-- /#main -->


      

   
  
<!-- </div> --> <!-- <div id="bshadow"> -->






<div class="cd-member-bio member-1"></div>
  