(function ($) {

  Drupal.behaviors.gv_search_block = {
    attach: function (context, settings) {
       
        //console.log('document.referrer = ' + document.referrer);
        
        $('input[name="search_block_form"]').hint();
        
        $('#search-block-form input[id="edit-submit"]').click(function(e){
          
          console.log($('input[name="search_block_form"]').val());
          e.preventDefault()
        });
       
    
    }
  };

}(jQuery));