(function ($) {

  Drupal.behaviors.gv_compareProviders = {
    attach: function (context, settings) {
              
       $(".p-compare").click(function(e){
         console.log(e);
         console.log(this);
         
         console.log($(this).val());
         
         console.log($(this));
         
         
         
         console.log('xxx');
         console.log($(this)[0]);
       });


       
    }
  };

}(jQuery));
