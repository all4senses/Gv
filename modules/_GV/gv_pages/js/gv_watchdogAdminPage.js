(function ($) {

  Drupal.behaviors.gv_watchdogAdminPage = {
    attach: function (context, settings) {
       
       
       jQuery(".wd-links a").click(function(){
         
         if (confirm("Are You sure to " + jQuery(this).title + "?")) {
           
           console.log(jQuery(this)[0].title);
           console.log(jQuery(this)[0].ip);
           console.log(jQuery(this)[0].id);
           console.log(jQuery(this)[0].class);
           
         } // End of if (confirm("Are You sure to " + $(this).title + "?")) {
         
         return false;
         
       }); // End of $(".wd-links a").click(function(){
       
       

     
  }
};

}(jQuery));