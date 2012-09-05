(function ($) {

  Drupal.behaviors.gv_search_block = {
    attach: function (context, settings) {
       
        //console.log('document.referrer = ' + document.referrer);
        
        $('input[name="search_block_form"]').hint();
        
        $('input[name="search_block_form"]').click(function(e){
          
          console.log($('input[name="search_block_form"]').val());
          //e.preventDefault()
        });
       
    
    }
  };

}(jQuery));