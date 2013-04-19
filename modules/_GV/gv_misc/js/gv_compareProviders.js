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
         
         var checked_count = 0;
         var checkboxes = $(".p-compare");
         console.log(checkboxes);
         
         for (i = 0; i < checkboxes.length; ++i) {
           if (checkboxes[i].checked) {
             console.log(i + ' is checked');
             ++checked_count;
           }
         }
         
         if (checked_count >= 3) {
           console.log('more than 3');
         }
         
       });


       
    }
  };

}(jQuery));
