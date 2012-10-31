(function ($) {

  Drupal.behaviors.gv_phone_review_stars = {
    attach: function (context, settings) {

        $('.form-item-rating-durability').stars({
          inputType: "select",
          captionEl: $('#edit-rating-durability-choice'),
          cancelShow: false
        });
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
        $('.form-item-rating-voice').stars({
          inputType: "select",
          captionEl: $('#edit-rating-voice-choice'),
          cancelShow: false
        });
        $('.form-item-rating-performance').stars({
          inputType: "select",
          captionEl: $('#edit-rating-performance-choice'),
          cancelShow: false
        });
        $('.form-item-rating-price').stars({
          inputType: "select",
          captionEl: $('#edit-rating-price-choice'),
          cancelShow: false
        });
        $('.form-item-rating-use-ease').stars({
          inputType: "select",
          captionEl: $('#edit-rating-use_ease-choice'),
          cancelShow: false
        });
    
    }
  };

}(jQuery));