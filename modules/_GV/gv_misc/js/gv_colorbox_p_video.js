(function ($) {

  Drupal.behaviors.gv_colorbox_p_video = {
    attach: function (context, settings) {
       
       $(".yt-direct").colorbox({iframe:true, innerWidth:425, innerHeight:344});

       
    }
  };

}(jQuery));
