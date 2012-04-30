(function ($) {

  Drupal.behaviors.gv_review_stars = {
    attach: function (context, settings) {
       //$caption = $("<span/>");
       $('.form-item-rating-features').stars({
          inputType: "select",
          captionEl: $('#edit-rating-features-choice'),
          //captionEl: $caption,
          //captionEl: 'edit-rating-features-choice',
          cancelShow: false
        });
       //$caption.appendTo(".form-item-rating-features");
       console.log('Review stars!');
       
    
    }
  };

}(jQuery));