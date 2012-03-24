(function ($) {
  Drupal.behaviors.newsletter = {
    attach: function (context, settings) {
      $("input[name='email']").click(function () {
          if ($("input[name='email']").val() == 'user@example.com') {
            $("input[name='email']").val('');
          }
      });
      $("input[name='email']").blur(function () {
        if ($("input[name='email']").val() == '') {
          $("input[name='email']").val('user@example.com');
        }
      });
    },

    subscribeForm: function(data) {
      $.each(Drupal.settings.exposed, function(e,i) {
        if (!$('#edit-field-newsletter-list-' + Drupal.settings.lang + '-' + i).attr('checked')) {
          $('.form-item-exposed-' + i).css('display', 'none');
        }

        $('#edit-field-newsletter-list-' + Drupal.settings.lang + '-' + i).click(function () {
          if($('.form-item-exposed-' + i).css('display') == 'none') {
            $('.form-item-exposed-' + i).css('display', 'block');
          }
          else {
            $('.form-item-exposed-' + i).css('display', 'none');
          }
        });
      });

      $('#newsletter-manage-subscriptions-form').submit(function() {
        if(!$('#newsletter-manage-subscriptions-form input[type="checkbox"]').is(':checked')){
          alert(Drupal.t("Please select at least one newsletter list."));
          return false;
        }
      });
    }
  };
})(jQuery);
