(function ($) {

  Drupal.behaviors.gv_preventEnterOnEditField = {
    attach: function (context, settings) {

        //console.log('Tabs!');
        $( ".field-type-number-integer input").click(function(){
          console.log('Test');
        });

    }
  };

}(jQuery));