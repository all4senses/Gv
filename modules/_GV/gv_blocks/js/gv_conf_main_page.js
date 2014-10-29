(function ($) {

  Drupal.behaviors.gv_conf_main_page = {
    attach: function (context, settings) {
       
       
       
      timerEmbed = timerAddConf = null; 
       
      $(".embed .link, .add-conf .link").mouseenter(function(){
        
        //$(this).find(".open").css('visibility', 'visible');
        $(this).find(".open").css({opacity: 0, visibility: "visible", display: "block"}).animate({opacity: 1}, 200);
        //console.log('click!!!');
      });


      $(".embed .link .open").mouseleave(function() {
      
        //timerEmbed = setTimeout(function() {$(".embed .link .open").css('visibility', 'hidden');}, 1000);
        timerEmbed = setTimeout(function() {$(".embed .link .open").css({opacity: 1, visibility: "visible", display: "block"}).animate({opacity: 0}, 200);}, 1000);
        console.log(timerEmbed);
        //$(this).css('visibility', 'hidden');
      });
      
      
      
      $(".add-conf .link .open").mouseleave(function(){ 
      
        //timerAddConf = setTimeout(function() {$(".add-conf .link .open").css('visibility', 'hidden');}, 1000);
        timerAddConf = setTimeout(function() {$(".add-conf .link .open").css({opacity: 1, visibility: "visible", display: "block"}).animate({opacity: 0}, 200);}, 1000);
        console.log(timerAddConf);
        //$(this).css('visibility', 'hidden');
      });



      $(".embed .link .open span").click(function(){ 
        window.prompt("Copy to clipboard: Ctrl+C, Enter", '<a href=http://getvoip.com/tech-conferences-finder>GetVoip Tech Conferences Finder</a>');
      });
      
      
      

       $(".embed .link .open").mouseenter(function(){ 
         if (timerEmbed) {
          clearTimeout(timerEmbed);
          timerEmbed = null;
          console.log('clear embed');
         }
      });
      
      $(".add-conf .link .open").mouseenter(function(){ 
        if (timerAddConf) {
          clearTimeout(timerAddConf);
          timerAddConf = null;
          console.log('clear add-conf');
        }
      });
      
      
      
      
      $("#conf").mouseenter(function(){ 
         $("#h-search").show();
      });
      $("#conf").mouseleave(function(){ 
         $("#h-search").hide();
      });
      
      $("#c-industry").mouseenter(function(){ 
         $("#h-industry").show();
      });
      $("#c-industry").mouseleave(function(){ 
         $("#h-industry").hide();
      });
      
      $("#c-title").mouseenter(function(){ 
         $("#h-name").show();
      });
      $("#c-title").mouseleave(function(){ 
         $("#h-name").hide();
      });
      
       
       // Shift in/out conferences list

       var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;

      
      // Switch the source of autocomplete...
      sw = 'industry';
      search_field_title = 'Search by Industry';
      //$('input[id="conf"]').val('Search by Industry');
      $('input[id="conf"]').attr('title', search_field_title);

      $('#c-industry').click(function(){

        if (sw != 'industry') {
          sw = 'industry';
          search_field_title = 'Search by Industry';
          $(this).addClass('active');
          $('#c-title').removeClass('active');
          $('input[id="conf"]').attr('title', search_field_title);
          //if ($('input[id="conf"]').val() == '' || $('input[id="conf"]').val() == 'Search by Name') 
          {
            $('input[id="conf"]').val(search_field_title);
            $('input[id="conf"]').addClass('blur');
          }
        }
        
      });
  
      $('#c-title').click(function(){

        if (sw != 'title') {
          sw = 'title';
          search_field_title = 'Search by Name';
          $(this).addClass('active');
          $('#c-industry').removeClass('active');
          $('input[id="conf"]').attr('title', search_field_title);
          //if ($('input[id="conf"]').val() == '' || $('input[id="conf"]').val() == 'Search by Industry') 
          {
            $('input[id="conf"]').val(search_field_title);
            $('input[id="conf"]').addClass('blur');
          }
        }
        
      });
  
  
  
  
      // Fields hints
      $('input[id="conf"]').each(function(){
        if ($(this).val() == '') {
          
          $(this).val(search_field_title);
          
          $(this).addClass('blur');
        }
      });
      
      $('input[id="conf"]').focus(function(){
        
        //if ($(this).val() == $(this).attr('title')) {
        if ($(this).val() == 'Search by Industry' || $(this).val() == 'Search by Name') {
          $(this).val('');
          $(this).removeClass('blur');
        }
        
      });
      
      $('input[id="conf"]').blur(function(){
        
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
        
      });
  
      
      
      // Custom Submit button.
      $('#submit').click(function(){
        doSubmitTerm();
      });






      $('#conf').keydown(function (event) { 
        
            if( event.keyCode == 13 || event.keyCode == 108 ) { // Enter, Enter on NumPad
              event.preventDefault();     // Prevent character input
              $('.ui-autocomplete.ui-menu.ui-widget.ui-widget-content').hide();
              doSubmitTerm();
            }
           
      });
      
      
      

      function doSubmitTerm() {
        if ($('input[id="conf"]').val() != 'Search by Industry' && $(this).val() != 'Search by Name') {
          get_conf($('input[id="conf"]').val());
        }
      }
      
      
      
      
  
    cache = {};
      
    
    $( "#conf" ).autocomplete({
      highlightClass: "bold-text",
      minLength: 3,
      focus: function( event, ui ) {
        $( "#conf" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#conf" ).val( ui.item.label );
        $( "#conf-id" ).val( ui.item.value );
        $( "#conf-description" ).html( ui.item.desc );
        //$( "#conf-icon" ).attr( "src", "images/" + ui.item.icon );
        
        get_conf(ui.item.label);
        
        return false;
      }
      //,source: projects,
      /*
      ,source: function( request, response ) {
          $.ajax({
              url: "get-conferences-ac",
              data: {term: request.term},
              dataType: "json",
              success: function( data ) {
                  response( $.map( data.myData, function( item ) {
                      return {
                          label: item.title,
                          value: item.turninId
                      }
                  }));
              }
          });
      }
      */
      ,source: function( request, response ) {
        var term = request.term;
        
        // Uncomment to use caching.
        //if ( term in cache ) {
        if ( sw + '_' + term in cache ) {
          //response( cache[ term ] );
          response( cache[ sw + '_' + term ] );
          return;
        }

        $.ajax({
              url: "get-conferences-ac",
              data: {
                type: sw, //'industry', //op: 'title',
                op: 'auto',
                term: request.term,
                results_num: 3
              },
              dataType: "json",
              success: function( data ) {
                  
                  
                  //cache[ term ] = data;
                  cache[ sw + '_' + term ] = data;
                  response( data );
                  /*
                  response( 
                          
                        $.map( data.myData, function( item ) {
                          return {
                              label: item.title,
                              value: item.turninId
                          }
                      })
                  );*/
              }
          });
        
      }
      //,source: "get-conferences-ac"
    })
    /*
    // doesnt work! See below working...
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      console.log('a1...');
      return $( "<li>" )
        .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
        .appendTo( ul );
    }
    */
   /*
   //.data("ui-autocomplete")._renderItem = function( ul, item ) {
   .data("autocomplete")._renderItem = function( ul, item ) {
        console.log('a5...');
        return $( "<li>" )
           .data("item.autocomplete", item)
           .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
           .appendTo( ul );
      }
      */
    ;
    
    
 
 // http://www.boduch.ca/2013/11/jquery-ui-highlighting-autocomplete-text.html
 // http://forum.jquery.com/topic/autocomplete-and-bold-highlight
 // http://jsfiddle.net/adamboduch/jhZ6E/
 
 // !!!!!!!!!!!
 // http://stackoverflow.com/questions/18231474/customize-autocomplete-display-in-jquery-ui-1-8
 
 $("#conf").data( "autocomplete" )._renderItem = function( ul, item ) {

            // Replace the matched text with a custom span. This
            // span uses the class found in the "highlightClass" option.
            var re = new RegExp( "(" + this.term + ")", "gi" ),
                cls = this.options.highlightClass,
                template = "<span style='color: red;' class='" + cls + "'>$1</span>",
                
                //label = item.label.replace( re, template ) + "<br>" + item.desc;
                label = item.label.replace( re, template );
                
                if (item.desc) {
                  label = label + "<br>" + item.desc;
                }
//                else {
//                  label = label + "<br>...";
//                }
                
                
                //label = item.label.replace( re, template );
                var $li = $( "<li/>" )
                      .data("item.autocomplete", item) // !!!!!!!!!!!!!
                      .appendTo( ul );
            
            // Create and return the custom menu item content.
            $( "<a/>" ).attr( "href", "#" )
                       .html( label )
                       .appendTo( $li );
            
            
            return $li;
//            return $( "<li>" )
//                  .data("item.autocomplete", item)
//                  .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
//                  .appendTo( ul );
            
  }
 
 
 
 
 
 function slideOutRightWin() {
    $('.cd-member-bio').removeClass('slide-in');
		$('.cd-member-bio-close').removeClass('is-visible');

		if( is_firefox ) {
			$('#main').removeClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('#main').removeClass('slide-out');
			$('body').removeClass('overflow-hidden');
		}
 }
 
 
 //close team-member bio
 $('.cd-overlay, .cd-member-bio-close').click(function(event){
		event.preventDefault();
    slideOutRightWin();
  });
    
    
    
    
    
      
  $('body').delegate('.term-link', 'click', function(event){
// Replace with   
// $('body').on('click', '.term-link', function(){    
// for jQuery 1.7
   //event.preventDefault();
   
   //console.log('term click: ' + $(this).text());
   $( "#conf" ).val($(this).text());
   //console.log($('.cd-member-bio').attr('class'));
   slideOutRightWin();
   //console.log($('.cd-member-bio').attr('class'));
    
   
   sw = 'industry';
   search_field_title = 'Search by Industry';
   $('#c-industry').addClass('active');
   $('#c-title').removeClass('active');
   $('input[id="conf"]').attr('title', search_field_title);
          
          
   get_conf($(this).text());
   
 }); 
      
      
 
 
 $('body').delegate('.conf-title', 'click', function(){
// Replace with   
// $('body').on('click', '.term-link', function(){    
// for jQuery 1.7
   
   slideOutRightWin();
   
   var save_sw = sw;
   sw = 'title';
          
   get_conf($(this).text());
   sw = save_sw;
 }); 
 
 
      
 function get_conf(label) {

   if ( 'content_conf_' + label in cache ) {
     if (cache[ 'content_conf_' + label ]) {
        showConfInPopUp(cache[ 'content_conf_' + label ]);
     }
     else {
       alert('No conference found with a title (or title containing) <' + label + '>');
     }
     return;
   }
   else if ( 'content_' + sw + '_' + label in cache ) {
     // List in SlidingIn right window.
     if (cache[ 'content_' + sw + '_' + label ]) {
        //console.log('Get LIST from cache...');
        //console.log($('.cd-member-bio').attr('class'));
        setTimeout(function() {slideInRightWin(cache[ 'content_' + sw + '_' + label ]);}, 1000);
        //slideInRightWin(cache[ 'content_' + sw + '_' + label ]);
     }
     else {
 
          if (sw == 'title') {
            alert('No conference found with a title (or title containing) <' + label + '>');
          }
          else {
            alert('No conferences found tagged with an industry <' + label + '>');
          }
     }
     return;
   }  
   
   $.ajax({
              url: "get-conferences-ac",
              data: {
                type: sw, //'industry', //op: 'title',
                op: 'get', 
                term: label
              },
              dataType: "json",
              success: function( data ) {
                  
                  //console.log(data);
                  if (data.type == 'conference') {
                  
                  
                        if(cache[ 'content_conf_' + label ] = data.out) {
                          showConfInPopUp(data.out);
                        }
                        
                  
                  } // End of if (data.type == 'conference') {
                  else {
                        // Lists
                        
                        if (cache[ 'content_' + sw + '_' + label ] = data.out) {
                          slideInRightWin(data.out);
                        }

                  }
                  
                  if (!data.out) {
                    if (sw == 'title') {
                      alert('No conference found with a title (or title containing) <' + label + '>');
                    }
                    else {
                      alert('No conferences found tagged with an industry <' + label + '>');
                    }
                  }
  
                  
                  /*
                  response( 
                          
                        $.map( data.myData, function( item ) {
                          return {
                              label: item.title,
                              value: item.turninId
                          }
                      })
                  );*/
              }
          });
          
 } // End of 
 
 
 
 function showConfInPopUp(html_data) {
   
  $('#cb-popup_1 #results_1').html(html_data);
                        
  // Uncomment to stop scrolling.
  $("body").css('overflow', 'hidden');


   var cb1;

   // Custom background animate - to test/use...
   // http://stackoverflow.com/questions/2760453/jquery-colorbox-background-transition-effect
   
   cb1 = $.fn.colorbox({
     transition: 'fade' , //'elastic',
     speed: 800,
     fadeOut: 1700,
     inline:true, 
     href:"#cb-popup_1", 
     width:550, 
     height:470
     ,onClosed: function() {
           //console.log('closed...');
           $("body").css('overflow', 'inherit');
           turned_off = true;
          }
   });  
 }
 
 
 function slideInRightWin(html_out) {
   
   // Just in case, double hiding.
    $('.ui-autocomplete.ui-menu.ui-widget.ui-widget-content').hide();
   
    $('.cd-member-bio').html(html_out);
    //console.log($('.cd-member-bio').attr('class'));
    $('.cd-member-bio').addClass('slide-in');
    //console.log($('.cd-member-bio').attr('class'));
    //$('.cd-member-bio-close').addClass('is-visible');

    // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
    if( is_firefox ) {
      $('#main').addClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
        $('body').addClass('overflow-hidden');
      });
    } else {
      $('#main').addClass('slide-out');
      $('body').addClass('overflow-hidden');
    }
    
 }
 






      
           
 
    }
  };

}(jQuery));
