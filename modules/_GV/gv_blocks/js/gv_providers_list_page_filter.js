
(function ($) {

  Drupal.behaviors.gv_providers_list_page_filter = {
    attach: function (context, settings) {

        
       jQuery(".select_service").change(function(){

           service = $(this).val();
           //console.log("s = " + service);
           
           jQuery(".services").each(function(){
             
             p_tr = jQuery(this).parent().parent();
             if(service == '-all-' || jQuery(this).hasClass(service)) {
               p_tr.show();
             }
             else {
               p_tr.hide();
             }
             
           });
           
         return false;
         
       }); //  End of jQuery(".select_service").change(function(){
       
      
    }
  };

}(jQuery));