(function ($) {

  Drupal.behaviors.gv_review_stars = {
    attach: function (context, settings) {
       
       $('.form-item-rating-features').stars({
          inputType: "select",
          captionEl: $('#rating_features_choice'),
          cancelShow: false
        });
      
       console.log('Review stars!');
       
    
    }
  };

}(jQuery));