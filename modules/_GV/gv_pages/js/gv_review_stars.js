(function ($) {

  Drupal.behaviors.gv_review_stars = {
    attach: function (context, settings) {
       
       $('.form-item-rating-features').stars({
          inputType: "select",
          //captionEl: $('#edit-rating-features-choice'),
          captionEl: 'edit-rating-features-choice',
          cancelShow: false
        });
      
       console.log('Review stars!');
       
    
    }
  };

}(jQuery));