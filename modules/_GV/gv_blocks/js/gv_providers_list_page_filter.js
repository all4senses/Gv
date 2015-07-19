
(function ($) {

  Drupal.behaviors.gv_providers_list_page_filter = {
    attach: function (context, settings) {

        
       jQuery(".select_service").change(function(){

           service = $(this).val;
           console.log(service);
           
           jQuery(".services").each(function(){
             
             tr = jQuery(this).parent().parent();
             if(jQuery(this).hasClass(service)) {
               console.log(service);
               tr.show();
             }
             else {
               tr.hide();
             }
             
           });
           
         return false;
         
       }); //  End of jQuery(".select_service").change(function(){
       
      
    }
  };

}(jQuery));