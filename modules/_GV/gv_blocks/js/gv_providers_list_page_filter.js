
(function ($) {

  Drupal.behaviors.gv_providers_list_page_filter = {
    attach: function (context, settings) {

        
       jQuery(".select_service").change(function(){

           
           console.log(this);
           
         return false;
         
       }); //  End of jQuery(".select_service").change(function(){
       
      
    }
  };

}(jQuery));