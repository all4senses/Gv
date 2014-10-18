(function ($) {

  Drupal.behaviors.gv_conf_main_page = {
    attach: function (context, settings) {
       
       
       
       
       
       
       
       
       // Shift in/out conferences list

       var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;

       //open team-member bio
       /*
       $('#cd-team').find('ul a').on('click', function(event){
          event.preventDefault();
          //var selected_member = $(this).data('type');
          $('.cd-member-bio.'+selected_member+'').addClass('slide-in');
          //$('.cd-member-bio-close').addClass('is-visible');

          // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
          if( is_firefox ) {
            $('main').addClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
              $('body').addClass('overflow-hidden');
            });
          } else {
            $('main').addClass('slide-out');
            $('body').addClass('overflow-hidden');
          }

        });
        */

        //close team-member bio
        /*
        $(document).on('click', '.cd-overlay, .cd-member-bio-close', function(event){
          event.preventDefault();
          $('.cd-member-bio').removeClass('slide-in');
          $('.cd-member-bio-close').removeClass('is-visible');

          if( is_firefox ) {
            $('main').removeClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
              $('body').removeClass('overflow-hidden');
            });
          } else {
            $('main').removeClass('slide-out');
            $('body').removeClass('overflow-hidden');
          }
        });
        */

       
       
       
       
       
      
      //console.log('gv_conf_main_page...');
  
  
      
      // Switch the source of autocomplete...
      sw = 'industry';
      search_field_title = 'Search by Industry';
      //$('input[id="conf"]').val('Search by Industry');
      $('input[id="conf"]').attr('title', search_field_title);

      //console.log($('input[id="conf"]').attr('title'));

      $('#c-industry').click(function(){

        if (sw != 'industry') {
          sw = 'industry';
          search_field_title = 'Search by Industry';
          $(this).addClass('active');
          $('#c-title').removeClass('active');
          $('input[id="conf"]').attr('title', search_field_title);
          //if ($('input[id="conf"]').val() == '' || $('input[id="conf"]').val() == 'Search by Title') 
          {
            $('input[id="conf"]').val(search_field_title);
            $('input[id="conf"]').addClass('blur');
          }
        }
        
      });
  
      $('#c-title').click(function(){

        if (sw != 'title') {
          sw = 'title';
          search_field_title = 'Search by Title';
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
          
          //$(this).val($(this).attr('title'));
          $(this).val(search_field_title);
          
          $(this).addClass('blur');
        }
      });
      
      $('input[id="conf"]').focus(function(){
        
        //if ($(this).val() == $(this).attr('title')) {
        if ($(this).val() == 'Search by Industry' || $(this).val() == 'Search by Title') {
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

        get_conf($('input[id="conf"]').val());
        
      });

  
  
      cache = {};
      
    
    $( "#conf" ).autocomplete({
      highlightClass: "bold-text",
      minLength: 2,
      focus: function( event, ui ) {
        $( "#conf" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        //console.log(ui);
        $( "#conf" ).val( ui.item.label );
        $( "#conf-id" ).val( ui.item.value );
        $( "#conf-description" ).html( ui.item.desc );
        //$( "#conf-icon" ).attr( "src", "images/" + ui.item.icon );
        
        ////get_conf(ui.item.label);
        
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
                term: request.term
              },
              dataType: "json",
              success: function( data ) {
                  
                  //console.log(data);
                  
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
            
            //console.log('a8...');
            
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
			$('#bshadow').removeClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('#bshadow').removeClass('slide-out');
			$('body').removeClass('overflow-hidden');
		}
 }
 
 
 //close team-member bio
 $('.cd-overlay, .cd-member-bio-close').click(function(event){
//	$(document).on('click', '.cd-overlay, .cd-member-bio-close', function(event){
		event.preventDefault();
    slideOutRightWin();
    
//		$('.cd-member-bio').removeClass('slide-in');
//		$('.cd-member-bio-close').removeClass('is-visible');
//
//		if( is_firefox ) {
//			$('#bshadow').removeClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
//				$('body').removeClass('overflow-hidden');
//			});
//		} else {
//			$('#bshadow').removeClass('slide-out');
//			$('body').removeClass('overflow-hidden');
//		}
  });
    
    
    
    
    
      
  $('body').delegate('.term-link', 'click', function(){
// Replace with   
// $('body').on('click', '.term-link', function(){    
// for jQuery 1.7

   //console.log($(this).html());
   console.log($(this).text());
   
   $( "#conf" ).val($(this).text());
   
   slideOutRightWin();
   
   sw = 'industry';
   search_field_title = 'Search by Industry';
   $('#c-industry').addClass('active');
   $('#c-title').removeClass('active');
   $('input[id="conf"]').attr('title', search_field_title);
          
          
   get_conf($(this).text());
   
 }); 
      
      
      
      
 function get_conf(label) {
   
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
                  
                  if (data.type == 'conference') 
                  {
                  
                  
                        $('#cb-popup_1 #results_1').html(data.out);
                        
                        // Uncomment to stop scrolling.
                        $("body").css('overflow', 'hidden');


                         var cb1;

                         cb1 = $.fn.colorbox({
                           inline:true, 
                           href:"#cb-popup_1", 
                           width:780, 
                           height:540
                           ,onClosed: function() {
                                 //console.log('closed...');
                                 $("body").css('overflow', 'inherit');
                                 turned_off = true;
                                }
                         });  
                  
                  } // End of if (data.type == 'conference') {
                  else {
                        $('.cd-member-bio').html(data.out);
                        $('.cd-member-bio').addClass('slide-in');
                        //$('.cd-member-bio-close').addClass('is-visible');

                        // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
                        if( is_firefox ) {
                          $('#bshadow').addClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                            $('body').addClass('overflow-hidden');
                          });
                        } else {
                          $('#bshadow').addClass('slide-out');
                          $('body').addClass('overflow-hidden');
                        }
                  }

                  //console.log(cb1);
                  //$.fn.colorbox.close();
                  //console.log($.fn.colorbox);
                  //alert('test');
                        
                        
                  
                  //cache[ term ] = data;
                  //cache[ sw + '_' + term ] = data;
                  //response( data );
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
 
 /*
 // Custom autocomplete instance.
    $.widget( "app.autocomplete", $.ui.autocomplete, {
        
        // Which class get's applied to matched text in the menu items.
        options: {
            highlightClass: "ui-state-highlight"
        },
        
        _renderItem: function( ul, item ) {

            // Replace the matched text with a custom span. This
            // span uses the class found in the "highlightClass" option.
            var re = new RegExp( "(" + this.term + ")", "gi" ),
                cls = this.options.highlightClass,
                template = "<span style='color: green;' class='" + cls + "'>$1</span>",
                label = item.label.replace( re, template ),
                $li = $( "<li/>" ).appendTo( ul );
            
            // Create and return the custom menu item content.
            $( "<a/>" ).attr( "href", "#" )
                       .html( label )
                       .appendTo( $li );
            
            console.log('a3...');
            
            return $li;
            
        }
        
    });
    */
    
    
       
    }
  };

}(jQuery));
