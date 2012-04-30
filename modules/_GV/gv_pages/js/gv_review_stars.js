(function ($) {

  Drupal.behaviors.gv_review_stars = {
    attach: function (context, settings) {
       
       $('.form-item-rating-features').stars({
          inputType: "select",
          cancelShow: false
        });
      
       console.log('Review stars!');
       
    
    }
  };

}(jQuery));