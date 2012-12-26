(function ($) {

  Drupal.behaviors.gv_selectAllTagsToDel = {
    attach: function (context, settings) {

        $( ".select-all" ).click(function(){
          console.log('select-all!');
        });
        
    }
  };

}(jQuery));