
(function ($) {

  Drupal.behaviors.gv_providers_list_page_filter = {
    attach: function (context, settings) {

        
       jQuery(".select_service").change(function(){

           service = $(this).val;
           console.log(service);
           
           jQuery(".services").each(function(){
             
             p_tr = jQuery(this).parent().parent();
             if(jQuery(this).hasClass(service)) {
               console.log("has " . service);
               p_tr.show();
             }
             else {
               p_tr.hide();
               console.log("not has " . service);
             }
             
           });
           
         return false;
         
       }); //  End of jQuery(".select_service").change(function(){
       
      
    }
  };

}(jQuery));