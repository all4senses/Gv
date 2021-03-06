(function ($) {

  Drupal.behaviors.gv_scrollToAnchor_onClick = {
    attach: function (context, settings) {

        //console.log('Scroll to anchor...');
        
        // http://stackoverflow.com/questions/4198041/jquery-smooth-scroll-to-an-anchor
        var hashTagActive = "";
        $(".scroll-to-link").click(function (event) {
            //console.log(this.hash);
            //console.log($(this.hash));
            
            hash = this.hash;
            // Make a beautiful link - show on a link #find-solution but go to #block-gv-blocks-home-service-types
            if (hash == '#find-solution') {
              hash = '#block-gv-blocks-home-service-types';
            }
            
            if(hashTagActive != hash) { //this will prevent if the user click several times the same link to freeze the scroll.
                event.preventDefault();
                //calculate destination place
                var dest = 0;
                if ($(hash).offset().top > $(document).height() - $(window).height()) {
                    dest = $(document).height() - $(window).height();
                } else {
                    dest = $(hash).offset().top;
                }
                //go to destination
                $('html,body').animate({
                    scrollTop: dest
                }, 800, 'swing');
                //////hashTagActive = hash;
            }
        });
        
        // Buttun to go to the tab to Write review right on the provider page
        /*
        $( "a#write-review-first" ).click(function(){
          $( ".data.tabs" ).tabs( { selected: 2 } );
          var aTag = $("a[name='provider-tabs']");
          $('html,body').animate({scrollTop: aTag.offset().top},'slow');
          return false;
        });
        
        $( "a#write-review" ).click(function(){
          $( ".data.tabs" ).tabs( { selected: 3 } );
          var aTag = $("a[name='provider-tabs']");
          $('html,body').animate({scrollTop: aTag.offset().top},'slow');
          return false;
        });
        */
    }
  };

}(jQuery));