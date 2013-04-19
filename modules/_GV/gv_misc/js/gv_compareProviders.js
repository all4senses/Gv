(function ($) {

  Drupal.behaviors.gv_compareProviders = {
    attach: function (context, settings) {
              
       $(".p-compare").click(function(e){
         console.log(e);
         console.log(this);
       });


       
    }
  };

}(jQuery));
