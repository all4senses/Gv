(function ($) {

  Drupal.behaviors.gv_search_block = {
    attach: function (context, settings) {
       
        //console.log('document.referrer = ' + document.referrer);
        
        //$('input[name="search_block_form"]').hint();
        
        
        $('input[name="search_block_form"]').click(function(e){
          
          //console.log($('input[name="search_block_form"]').val());
          
          if ($('input[name="search_block_form"]').val() == $('input[name="search_block_form"]').attr('title')) {
            $('input[name="search_block_form"]').val('');
            //e.preventDefault();
          }
          
          
        });
        
        
        $('#search-block-form input[id="edit-submit"]').click(function(e){
          
          //console.log($('input[name="search_block_form"]').val());
          
          if ($('input[name="search_block_form"]').val() == $('input[name="search_block_form"]').attr('title')) {
            //$('input[name="search_block_form"]').val('');
            e.preventDefault();
          }
          
        });
       
    
    }
  };

}(jQuery));