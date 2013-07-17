(function ($) {

  Drupal.behaviors.gv_addSoundManagerSettings = {
    attach: function (context, settings) {
      
       soundManager.setup({
          // path to directory containing SM2 SWF
          url: "/sites/all/libraries/audio/soundmanager2/swf/"
        });
       
    }
  };

}(jQuery));
