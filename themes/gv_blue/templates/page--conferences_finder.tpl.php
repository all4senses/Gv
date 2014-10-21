<div id="bshadow">
 

  
  <div id="all-content" class="clearfix">
      
      
    
      <section id="main" role="main" class="clearfix">

       
          <?php print $messages; ?>
          
          <a id="main-content"></a>
          
          <img src="/sites/all/themes/gv_blue/css/images/tc_back.jpg" style="position: absolute; z-index: -10;">
                    
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
          <?php //print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          
          <?php 
            //echo render($page['above_content']);
            //echo render($page['content']); 
            echo '<table class="conf-table"><tbody>',
                    '<tr><td class="header">Logo</td></tr>',
                    '<tr><td class="search">', gv_blocks_get_confMainSearch(), '</td></tr>',
                    '<tr><td class="copy">Copy</td></tr>',
                    '<tr><td class="add">Add</td></tr>',
                    '<tr><td class="footer"><div class="c"><div>Copyright</div> 2014 GetVoIP.com | All Rights Reserved</div></td></tr>',
                    
                 '</tbody></table>';

            
          ?>
        
      </section> <!-- /#main -->


      
      

  </div> <!-- /#all-content -->

   <div class="cd-overlay"></div>
  
</div> <!-- <div id="bshadow"> -->






<div class="cd-member-bio member-1">
    <?php /* ?>
		<div class="cd-member-bio-pict">
			<img src="img/member-bio-img-1.jpg" alt="Member Bio image">
		</div> <!-- cd-member-bio-pict -->

		<div class="cd-bio-content">
			<h1>Meet John Smith</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, amet, voluptatibus et omnis dolore illo saepe voluptatem qui quibusdam sunt corporis ut iure repellendus delectus voluptate explicabo temporibus quos eaque?</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, explicabo, doloribus, esse rem officia quas facilis eius alias similique ducimus amet quam odio perspiciatis dolorem ipsam! Ab, dolores, adipisci, explicabo pariatur illum deleniti quam iusto placeat nisi aliquam praesentium mollitia eligendi a! Sequi, voluptatibus sed quos possimus harum rem tempore fugiat? Corporis, officia, assumenda, asperiores blanditiis quidem aliquam fugiat vel excepturi velit provident aut omnis quos aliquid tempora eaque. Nemo, eveniet, sint maxime eum maiores totam est inventore numquam voluptatem hic nam blanditiis placeat illum nesciunt voluptatum eos cum quos magni voluptates ipsam. Perspiciatis alias ducimus libero. Quo provident omnis fugiat ut repellendus optio cum quaerat odio et ipsa. Molestias, atque repellat non maxime amet corporis magni libero quam numquam error beatae at asperiores et a porro nostrum ab necessitatibus esse aliquid iure repellendus obcaecati unde quo eius eum dolores quasi consectetur culpa velit optio! Sequi, dolor, minima, veniam doloribus in ullam cupiditate iste animi ipsum esse eaque similique illo temporibus magni et earum amet sint deleniti est reiciendis. Maxime, quis, animi, ad quasi adipisci suscipit alias iste reprehenderit ea placeat nulla commodi nobis magnam provident veniam earum odit eveniet possimus aut voluptatum dolorum culpa necessitatibus facere totam quisquam. Ipsam.</p>
		</div> <!-- cd-bio-content -->
    <?php */ ?>
	</div> <!-- cd-member-bio -->
  