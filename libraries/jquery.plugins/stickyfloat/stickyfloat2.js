/*
 * stickyfloat - jQuery plugin for verticaly floating anything in a constrained area
 * 
 * Example: jQuery('#menu').stickyfloat({duration: 400});
 * parameters:
 *         duration     - the duration of the animation
 *        startOffset - the amount of scroll offset after it the animations kicks in
 *        offsetY        - the offset from the top when the object is animated
 *        lockBottom    - 'true' by default, set to false if you don't want your floating box to stop at parent's bottom
 * $Version: 05.16.2009 r1
 * Copyright (c) 2009 Yair Even-Or
 * vsync.design@gmail.com
 */
(function($){
$.fn.stickyfloat = function(options, lockBottom) {
    var $obj                 = this;
    var parentPaddingTop     = parseInt($obj.parent().css('padding-top'));
    var startOffset         = $obj.parent().offset().top;
    var opts                 = $.extend({ startOffset: startOffset, offsetY: parentPaddingTop, duration: 200, lockBottom:true }, options);
    
    $obj.css({ position: 'relative' });
    
    if(opts.lockBottom){
        var bottomPos = $obj.parent().height() - $obj.height() + parentPaddingTop; //get the maximum scrollTop value
        if( bottomPos < 0 )
            bottomPos = 0;
    }
    
    $(window).scroll(function () { 
        $obj.stop(); // stop all calculations on scroll event

            // var bottom = $obj.parent().height() - $obj.height() + parentPaddingTop; get the maximum scrollTop value
            var parentHeight = $obj.parent().height();
            var objHeight = $obj.height();
            var newpos = ($(document).scrollTop() -startOffset + opts.offsetY );
            if ( newpos > 0 && newpos + objHeight < parentHeight  ){
                $obj.css({position: 'fixed', top: 0});
            } else if ( newpos < 0){ // if window scrolled < starting offset, then reset Obj position (opts.offsetY);
                $obj.css({position: 'relative'});
            } else if (((newpos + objHeight) > parentHeight - 40) && opts.lockBottom) {
                $obj.css({position: 'absolute', top: bottomPos - 40})
            }

        
    });
};
})(jQuery);