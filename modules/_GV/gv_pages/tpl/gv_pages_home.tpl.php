<div id="home">
<?php if (in_array('administrator', $user->roles)) : ?>
  <div id="edit-link"><a href="/home/edit">Edit the page</a></div>
<?php endif; ?>

<div id="main_content_div"> 
<div>Test home</div>
<?php echo $data['gv_block1_title']; ?>
</div> <!-- end of <div id="main_content_div"> -->
