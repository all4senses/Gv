(function ($) {

  Drupal.behaviors.gv_review_stars = {
    attach: function (context, settings) {

        $('.form-item-rating-features').stars({
          inputType: "select",
          captionEl: $('#edit-rating-features-choice'),
          cancelShow: false
        });
        $('.form-item-rating-install').stars({
          inputType: "select",
          captionEl: $('#edit-rating-install-choice'),
          cancelShow: false
        });
        $('.form-item-rating-sound').stars({
          inputType: "select",
          captionEl: $('#edit-rating-sound-choice'),
          cancelShow: false
        });
        $('.form-item-rating-rely').stars({
          inputType: "select",
          captionEl: $('#edit-rating-rely-choice'),
          cancelShow: false
        });
        $('.form-item-rating-money').stars({
          inputType: "select",
          captionEl: $('#edit-rating-money-choice'),
          cancelShow: false
        });
        $('.form-item-rating-service').stars({
          inputType: "select",
          captionEl: $('#edit-rating-service-choice'),
          cancelShow: false
        });
    
    }
  };

}(jQuery));