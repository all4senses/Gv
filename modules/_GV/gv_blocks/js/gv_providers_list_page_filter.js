
(function ($) {

  Drupal.behaviors.gv_providers_list_page_filter = {
    attach: function (context, settings) {

        
       jQuery(".select_service").change(function(){

           service = $(this).val;
           console.log("s = " + service);
           
           jQuery(".services").each(function(){
             
             p_tr = jQuery(this).parent().parent();
             if(jQuery(this).hasClass(service)) {
               console.log("has " + service);
               //jQuery(this).parent().parent().show();
             }
             else {
               //jQuery(this).parent().parent().hide();
               console.log("has no " + service);
             }
             
           });
           
         return false;
         
       }); //  End of jQuery(".select_service").change(function(){
       
      
    }
  };

}(jQuery));