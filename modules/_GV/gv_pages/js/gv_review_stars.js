(function ($) {

  Drupal.behaviors.gv_review_stars = {
    attach: function (context, settings) {
       
       $('.form-item-rating-features').stars({
          inputType: "select",
          captionEl: $('#edit_rating_features_choice'),
          //captionEl: 'edit-rating-features-choice',
          cancelShow: false
        });
      
       console.log('Review stars!');
       
    
    }
  };

}(jQuery));