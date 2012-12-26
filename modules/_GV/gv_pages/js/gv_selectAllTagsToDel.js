(function ($) {

  Drupal.behaviors.gv_selectAllTagsToDel = {
    attach: function (context, settings) {
        
        var checked = false;
        
        $( ".select-all" ).click(function(){
          
          //console.log('select-all!');
          
          if (!checked) {
            $("#edit-tags input").attr('checked', true);
            checked = true;
          }
          else {
            $("#edit-tags input").attr('checked', false);
            checked = false;
          }
          
        });
        
    }
  };

}(jQuery));