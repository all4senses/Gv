<?php 
  //dpm($node);
  //dpm($node->q_data);
  //dpm($content);
// Hide comments, tags, and links now so that we can render them later.
  hide($content['links']);
  hide($content['field_topics']);
?>

<head>
  <div id="gv-logo">
    <div class="logo"></div>
    <h3>Get Personalized Quotes & Compare Companies For Your VoIP Service Needs.</h3>
  </div>

  <!--
  <div id="experian">
    <div class="text">All Vendors are<br>Prescreened by Experian</div><div class="logo"></div>
  </div>
  -->
  <div class="partners"><div id="some-logo"></div></div>
  
  <div class="bottom-clear"></div> 
</head>

<div class="content"<?php print $content_attributes; ?>>

  <h2>Don't Trust Your Phone System With Just Anyone!</h2>
  <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
  <div class="left">
  
    <!--
    <label>How many users do you need?</label>
    <select>
      <option value="1-3">1-3</option>    
    </select>
    <label>What is your immediate need?</label>
    <select>
      <option value="Moving to a new office">Moving to a new office</option>    
    </select>
    <label>What is your immediate need?</label>
    <select>
      <option value="Phones and Serivce">Phones and Serivce</option>    
    </select>
    <input type="button" value="Run the free report"/>
    -->
    <?php echo gv_blocks_get_requestQuoteForPage(); ?>
  
  </div>
  <div class="center">
    <?php echo render($content['field_q_image']); ?>
    <div class="quote">"We found a VoIP company that offers us more features at a much better price"</div>
    <div class="author">Rick Miller - Acme Inc</div>
  </div>
  <div class="right">
    <div class="options">
      <div class="option">Top Rated Providers</div>
      <div class="option">HD Quality Service</div>
      <div class="option">No Contracts</div>
      <div class="option">Robust VoIP Services</div>
      <div class="option">Accredited BBB Companies</div>
      <div class="option">Unlimited Calling</div>
      <div class="option">Designed For Business</div>
    </div>
    <div id="right-bottom">
      <div class="image"></div>
      <div class="links">Be smart. Read reviews. <br/>Get facts. Save money!</div>
    </div>
  </div>
  
  <?php
    //print render($content);
    echo render($content['metatags']);
  ?>
  <div class="bottom-clear"></div> 
  
</div>

<div id="brands">
  <h2><?php echo t('All Major Manufacturers Supported:'); ?></h2>
  <div id="cisco"></div><div id="polycom"></div><div id="microsoft"></div><div id="att"></div><div id="verizon"></div><div id="comcast"></div><div id="panasonic"></div>
  <div class="bottom-clear"></div> 
</div>

<div id="bottom">
  <div class="left">
    <h3><?php echo $node->q_data['bottom_text']['left_title']; ?></h3>
    <div class="text"><?php echo $node->q_data['bottom_text']['left_text']; ?></div>
  </div>
  <div class="center">
    <h3><?php echo $node->q_data['bottom_text']['center_title']; ?></h3>
    <div class="text"><?php echo $node->q_data['bottom_text']['center_text']; ?></div>
  </div>
  <div class="right">
    <h3><?php echo $node->q_data['bottom_text']['right_title']; ?></h3>
    <div class="text"><?php echo $node->q_data['bottom_text']['right_text']; ?></div>
  </div>
  <?php
    
  ?>
  
  <div class="bottom-clear"></div>
</div>

<footer>
  <div class="links"><a href="/about-us">About Us</a><span class="delim">|</span><a href="/privacy-policy">Privacy Policy</a></div>
  <div class="copy">© 2012 GetVoIP.com | All Rights Reserved</div>
  <div class="copy">BizMedia Central LLC | New York, NY</div>
</footer>

 

  
