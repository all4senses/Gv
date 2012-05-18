<?php 
  //dpm($node);
  dpm($content);
// Hide comments, tags, and links now so that we can render them later.
  hide($content['links']);
  hide($content['field_topics']);
?>

<head>
  <div class="logo"></div>
  <h3>Get Personalized Quotes & Compare Companies For Your VoIP Service Needs.</h3>
  
  <div id="experian">
    <div class="text">All Vendors are<br>Prescreened by Experian</div><div class="logo"></div>
  </div>
  <div class="bottom-clear"></div> 
</head>

<div class="content"<?php print $content_attributes; ?>>

  <h2>Don't Trust Your Phone System With Just Anyone.</h2>
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
    <div class="quote">This was just the report I was looking for Found the right comp</div>
    <div class="author">Rick Miller - Acme Inc</div>
  </div>
  <div class="right">
    <div class="options">
      <div class="option">Provider Qualifier</div>
      <div class="option">Feedback Analyzer</div>
      <div class="option">Price Comparisons</div>
      <div class="option">Hardware Support</div>
      <div class="option">Service Score</div>
      <div class="option">Satisfaction Ratings</div>
      <div class="option">Leading Industry Reliability</div>
      <div class="option">Advanced VoIP Technology</div>
    </div>
    <div class="image"></div>
    <div class="link">Read the reviews an find the  answers you need.</div>
  </div>
  
  <?php
    //print render($content);
  ?>
  <div class="bottom-clear"></div> 
  
</div>
  
<div id="bottom"<?php print $content_attributes; ?>>
  <div class="left">
    <h3>Whats in the report</h3>
    <div class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</div>
  </div>
  <div class="center">
    <h3>How companies are rated</h3>
    <div class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem  copy</div>
  </div>
  <div class="right">
    <h3>Report a company</h3>
    <div class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</div>
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

 

  
