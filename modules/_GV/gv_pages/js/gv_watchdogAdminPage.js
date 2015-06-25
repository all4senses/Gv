(function ($) {

  Drupal.behaviors.gv_watchdogAdminPage = {
    attach: function (context, settings) {
       
       
       $(".wd-links a").click(function(){
         
         if (confirm("Are You sure to " + $(this).title + "?")) {
           
           console.log($(this).title);
           
         } // End of if (confirm("Are You sure to " + $(this).title + "?")) {
         
       }); // End of $(".wd-links a").click(function(){
       
       

     
  }
};

}(jQuery));