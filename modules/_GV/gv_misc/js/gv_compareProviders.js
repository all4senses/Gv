(function ($) {

  Drupal.behaviors.gv_compareProviders = {
    attach: function (context, settings) {
              
       $(".p-compare").click(function(e){
         console.log(e);
         //console.log(this);
         
         //console.log($(this).val());
         
         console.log($(this));
         
         
         

         //console.log($(this)[0]);
         console.log($(this)[0].checked);
         console.log($(this)[0].id);
         console.log($(this)[0].name);
         //return false;
         
         var checkboxes = $(".p-compare");
         
         for (i = 0; i < checkboxes.length; ++i) {
           if (checkboxes[i].is(':checked')) {
             console.log(i + ' is checked');
           }
         }
       });


       
    }
  };

}(jQuery));
