(function ($) {

  Drupal.behaviors.gv_conf_main_page = {
    attach: function (context, settings) {
       
       
    //console.log('1111');
    
 // requestAnimationFrame Shim
 
 
 
 canvasPresent = false;  

 var canvas_1 = document.getElementById('link-1');
 
 // http://stackoverflow.com/questions/15692353/animate-a-canvas-circle-to-draw-on-load
 // http://jsfiddle.net/loktar/uhVj6/4/
 // 
 // Animationframe test
 // http://jsfiddle.net/wMkJg/
 
 if (canvas_1.getContext) { 
   
    canvasPresent = true;  
   
    (function() {
      var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                                  window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
      window.requestAnimationFrame = requestAnimationFrame;
    })();
 
    var radius = 16;
    var lineThickness = 6;
    var lineColor = 'white';
    var counterClockwise = false;
    var circ = Math.PI * 2;
    var quart = Math.PI / 2;
    var percentsStep = 2;
    
    var canvas_2 = document.getElementById('link-2');
 
    var context_1 = canvas_1.getContext('2d');
    var x_1 = canvas_1.width / 2;
    var y_1 = canvas_1.height / 2;
    var endPercent_1 = 120;
    var curPerc_1 = 0;
    context_1.lineWidth = lineThickness;
    context_1.strokeStyle = lineColor;//'#ad2323';
    //context_1.shadowOffsetX = 0;
    //context_1.shadowOffsetY = 0;
    //context_1.shadowBlur = 10;
    //context_1.shadowColor = '#656565';
    
    var context_2 = canvas_2.getContext('2d');
    var x_2 = canvas_2.width / 2;
    var y_2 = canvas_2.height / 2;
    var endPercent_2 = 120;
    var curPerc_2 = 0;
    context_2.lineWidth = lineThickness;
    context_2.strokeStyle = lineColor;//'#ad2323';
    //context_2.shadowOffsetX = 0;
    //context_2.shadowOffsetY = 0;
    //context_2.shadowBlur = 10;
    //context_2.shadowColor = '#656565';

 }


 function animate_1(current) {
     context_1.clearRect(0, 0, canvas_1.width, canvas_1.height);
     context_1.beginPath();
     context_1.arc(x_1, y_1, radius, -(quart), ((circ) * current) - quart, false);
     context_1.stroke();
     curPerc_1+= percentsStep;
     if (curPerc_1 < endPercent_1) {
         requestAnimationFrame(function () {
             animate_1(curPerc_1 / 100)
         });
     }
     else {
         //console.log('link-1 finished.');
         // Easing 
         // http://api.jquery.com/animate/
         // not tested yet https://github.com/gdsmith/jquery.easing
         $(".embed .link").find(".open").css({opacity: 0, visibility: "visible", display: "block", left: "-350px"}).animate({opacity: 1, left: 0}, 2000, "easeOutBounce");
     }
     
 }
 
 function animate_2(current) {
    //console.log('a2 ' +  current);
     context_2.clearRect(0, 0, canvas_2.width, canvas_2.height);
     context_2.beginPath();
     context_2.arc(x_2, y_2, radius, -(quart), ((circ) * current) - quart, false);
     context_2.stroke();
     curPerc_2+= percentsStep;
     if (curPerc_2 < endPercent_2) {
         requestAnimationFrame(function () {
             animate_2(curPerc_2 / 100)
         });
     }
     else {
         //console.log('link-2 finished.');
         $(".add-conf .link").find(".open").css({opacity: 0, visibility: "visible", display: "block", left: "-350px"}).animate({opacity: 1, left: 0}, 2000, "easeOutBounce");
     }
     
 }
 
 function clearCircle(target_num) {
   if (target_num == 1) {
      context_1.clearRect(0, 0, canvas_1.width, canvas_1.height);
      curPerc_1 = 0;
   }
   else {
     context_2.clearRect(0, 0, canvas_2.width, canvas_2.height);
     curPerc_2 = 0;
   }
 }

 //animate_1();
 
 
 
    
    
    
    
       
       
      // http://stackoverflow.com/questions/21765240/loading-circle-through-canvas
      // http://jsfiddle.net/m1erickson/mYKp5/
      
      /*
      var canvas_1 = document.getElementById("link-1");
      var canvas_2 = document.getElementById("link-2");

      if (canvas_1.getContext){ 

          canvasPresent = true;

          var ctx_1 = canvas_1.getContext("2d");
          var ctx_2 = canvas_2.getContext("2d");

          // set context styles
          ctx_1.lineWidth = 15;
          ctx_1.background = "red";
          //ctx_1.strokeStyle = '#85c3b8';
          //ctx_1.shadowColor = "black"
          //ctx_1.shadowOffsetX = 0;
          //ctx_1.shadowOffsetY = 0;
          //ctx_1.shadowBlur = 0;
          ctx_1.font = "12px verdana";

          ctx_2.lineWidth = 15;
          ctx_2.background = "red";
          //ctx_2.strokeStyle = '#85c3b8';
          //ctx_2.shadowColor = "black"
          //ctx_2.shadowOffsetX = 0;
          //ctx_2.shadowOffsetY = 0;
          //ctx_2.shadowBlur = 0;
          ctx_2.font = "12px verdana";
          
          var quart = Math.PI / 2;
          var PI2 = Math.PI * 2;
          var percent_1 = 0;
          var percent_2 = 0;

          var guages_1 = [];
          guages_1.push({
              x: 50,
              y: 50,
              radius: 40,
              start: 0,
              end: 100,
              color: "gray"
          });

          var guages_2 = guages_1;
          
          //animate();
      }

      function drawAll(percent, target) {

          if (target == 1) {
            // clear the canvas
            ctx_1.clearRect(0, 0, canvas_1.width, canvas_1.height);

            // draw all the guages
            render(guages_1[0], percent, 1);
          }
          else {
            // clear the canvas
            ctx_2.clearRect(0, 0, canvas_2.width, canvas_2.height);

            // draw all the guages
            render(guages_2[0], percent, 2);
          }
      }
      
      

      function render(guage, percent, target) {
        
          var pct = percent / 100;
          var extent = parseInt((guage.end - guage.start) * pct);
          var current = (guage.end - guage.start) / 100 * PI2 * pct - quart;
          if (target == 1) {
            ctx_1.beginPath();
            ctx_1.arc(guage.x, guage.y, guage.radius, -quart, current);
            ctx_1.strokeStyle = guage.color;
            ctx_1.stroke();
            ctx_1.fillStyle = guage.color;
            ctx_1.fillText(extent, guage.x - 15, guage.y + 5);
          }
          else {
            ctx_2.beginPath();
            ctx_2.arc(guage.x, guage.y, guage.radius, -quart, current);
            ctx_2.strokeStyle = guage.color;
            ctx_2.stroke();
            ctx_2.fillStyle = guage.color;
            ctx_2.fillText(extent, guage.x - 15, guage.y + 5);
          }
      }


      function animate_1() {

          // if the animation is not 100% then request another frame

          if (percent_1 < 100) {
              requestAnimationFrame(animate_1);
          }

          // redraw all guages with the current percent

          drawAll(percent_1, 1);

          // increase percent for the next frame

          percent_1 += 1;

      }
      
      function animate_2() {

          // if the animation is not 100% then request another frame

          if (percent_2 < 100) {
              requestAnimationFrame(animate_2);
          }

          // redraw all guages with the current percent

          drawAll(percent_2, 2);

          // increase percent for the next frame

          percent_2 += 1;

      }


      function drawCircle(target) {

        
          if (canvasPresent) {
            if (target == 1) {
              percent_1 = 0;
              animate_1();
            }
            else {
              percent_2 = 0;
              animate_2();
            }
          }
        
      }


      $("#again").click(function () {
          drawCircle(1);
      });
       
       
      */ 
       
       
       
       
       
       
       
       
       
      timerEmbed = timerAddConf = null; 
      embed_hidden = addConf_hidden = true;
       
      $(".embed .link").mouseenter(function(){
        
        //console.log('Embed hover');
        //$(this).find(".open").css('visibility', 'visible');
        ////drawCircle(1);
        if (embed_hidden) 
        {
          //curPerc_1 = 0;
          animate_1();
          //$(this).find(".open").css({opacity: 0, visibility: "visible", display: "block", left: "-350px"}).animate({opacity: 1, left: 0}, 200);
          ////$(".embed .link").find(".open").css({opacity: 0, visibility: "visible", display: "block", left: "-350px"}).animate({opacity: 1, left: 0}, 200);
          
        }
        embed_hidden = false;
        
      });


      $(".add-conf .link").mouseenter(function(){
        
        //console.log('addConf hover');
        
        //$(this).find(".open").css('visibility', 'visible');
        ////drawCircle(2);
        if (addConf_hidden) {
          //curPerc_2 = 0;
          animate_2();
          //$(this).find(".open").css({opacity: 0, visibility: "visible", display: "block", left: "-350px"}).animate({opacity: 1, left: 0}, 200);
          ////$(".add-conf .link").find(".open").css({opacity: 0, visibility: "visible", display: "block", left: "-350px"}).animate({opacity: 1, left: 0}, 200);
        }
        addConf_hidden = false;
        
      });
      

      //$(".embed .link .open, .embed .link").mouseleave(function() {
      $(".embed .link").mouseleave(function() {
      
        
        //timerEmbed = setTimeout(function() {$(".embed .link .open").css('visibility', 'hidden');}, 1000);
        timerEmbed = setTimeout(function() {
            // clear the canvas
            clearCircle(1);
            ////ctx_1.clearRect(0, 0, canvas_1.width, canvas_1.height);
            $(".embed .link .open").css({opacity: 1, visibility: "visible", display: "block", left: 0}).animate({opacity: 0, left: "-350px"}, 200);
            embed_hidden = true;
          }
          , 1000);
        //console.log(timerEmbed);
        //$(this).css('visibility', 'hidden');
      });
      
      
      //$(".add-conf .link .open").mouseleave(function(){ 
      $(".add-conf .link").mouseleave(function(){ 
      
        //timerAddConf = setTimeout(function() {$(".add-conf .link .open").css('visibility', 'hidden');}, 1000);
        timerAddConf = setTimeout(function() {
            // clear the canvas
            clearCircle(2);
            ////ctx_2.clearRect(0, 0, canvas_2.width, canvas_2.height);
            $(".add-conf .link .open").css({opacity: 1, visibility: "visible", display: "block", left: 0}).animate({opacity: 0, left: "-350px"}, 200);
            addConf_hidden = true;
          }
          , 1000);
        //console.log(timerAddConf);
        //$(this).css('visibility', 'hidden');
      });



  
          
          
  

      $(".embed .link .open span").click(function(){ 
        window.prompt("Copy to clipboard: Ctrl+C, Enter", '<a href=http://getvoip.com/tech-conferences-finder>GetVoip Tech Conferences Finder</a>');
      });
      
      
      

       $(".embed .link .open").mouseenter(function(){ 
         if (timerEmbed) {
          clearTimeout(timerEmbed);
          timerEmbed = null;
          //console.log('clear embed');
         }
      });
      
      $(".add-conf .link .open").mouseenter(function(){ 
        if (timerAddConf) {
          clearTimeout(timerAddConf);
          timerAddConf = null;
          //console.log('clear add-conf');
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
      
      $("#c-city-state").mouseenter(function(){ 
         $("#h-name").show();
      });
      $("#c-city-state").mouseleave(function(){ 
         $("#h-name").hide();
      });
      
      
       
       // Shift in/out conferences list

       var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;

      
      // Switch the source of autocomplete...
      sw = 'industry';
      search_field_title = 'Search by Industry';
      
      return_to_sidewindow = false;
      
      //$('input[id="conf"]').val('Search by Industry');
      $('input[id="conf"]').attr('title', search_field_title);

      $('#c-industry').click(function(){

        if (sw != 'industry') {
          sw = 'industry';
          search_field_title = 'Search by Industry';
          $(this).addClass('active');
          $('#c-title, #c-city-state').removeClass('active');
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
          $('#c-industry, #c-city-state').removeClass('active');
          $('input[id="conf"]').attr('title', search_field_title);
          //if ($('input[id="conf"]').val() == '' || $('input[id="conf"]').val() == 'Search by Industry') 
          {
            $('input[id="conf"]').val(search_field_title);
            $('input[id="conf"]').addClass('blur');
          }
        }
        
      });
      
      $('#c-city-state').click(function(){

        if (sw != 'city-state') {
          sw = 'city-state';
          search_field_title = 'Search by City/State';
          $(this).addClass('active');
          $('#c-industry, #c-title').removeClass('active');
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
      
      $('#conf').focus(function(){
        
        //if ($(this).val() == $(this).attr('title')) {
        if ($(this).val() == 'Search by Industry' || $(this).val() == 'Search by Name' || $(this).val() == 'Search by City/State') {
          $(this).val('');
          $(this).removeClass('blur');
        }
        
      });
      
      $('#conf').blur(function(){
        
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
        if ($('input[id="conf"]').val() != 'Search by Industry' && $(this).val() != 'Search by Name' && $(this).val() != 'Search by City/State') {
          get_conf($('#conf').val());
        }
      }
      
      
      
      
  
    cache = {};
    
    // http://api.jqueryui.com/autocomplete/#event-create
    // http://stackoverflow.com/questions/11852282/jquery-ui-autocomplete-with-json-and-ajax
    
    $( "#conf" ).autocomplete({
      highlightClass: "bold-text",
      minLength: 2,
      focus: function( event, ui ) {
        $( "#conf" ).val( ui.item.label );
        return false;
      },
      open: function( event, ui ) {
        ///console.log('Opened...');
      },
      select: function( event, ui ) {
        $( "#conf" ).val( ui.item.label );
        $( "#conf-id" ).val( ui.item.value );
        $( "#conf-description" ).html( ui.item.desc );
        //$( "#conf-icon" ).attr( "src", "images/" + ui.item.icon );
        
        get_conf(ui.item.label, ui.item.value);
        
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
    
    
    
    
  cb1 = null;
      
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
   $('#c-title, #c-city-state').removeClass('active');
   $('input[id="conf"]').attr('title', search_field_title);
          
   
   // Close prev colorbox, if opened.
   $.fn.colorbox.close();
   turned_off = true;
  
   setTimeout(function() {
            get_conf($(this).text());
          }
          , 1000);
   
   
 }); 
      
      
      
      
      
 var save_sw, new_sw;
 
 $('body').delegate('.conf-title', 'click', function(){
// Replace with   
// $('body').on('click', '.term-link', function(){    
// for jQuery 1.7

   /*
   slideOutRightWin();
   
   //console.log(sw + ' ->' + $( "#conf" ).val());
   // Set to return to the side slide window after a colorbox popup will be closed.
   return_to_sidewindow = 'content_' + sw + '_' + $( "#conf" ).val();
   */
  
   new_sw = 'title';
   save_sw = sw;
   sw = new_sw;
            
   //console.log($(this).attr('id'));
   
   
   // Close prev colorbox, if opened.
   if (cb1) {
     
      $.fn.colorbox.close();
      cb = null;
      //cb1.close();
      //turned_off = true;
  
  get_conf($(this).text(), $(this).attr('id'), true);
            sw = save_sw;
  
//      setTimeout(function() {
//            get_conf($(this).text(), $(this).attr('id'), true);
//            sw = save_sw;
//          }
//          , 1000);
          
   }
   else {
      get_conf($(this).text(), $(this).attr('id'), true);
      sw = save_sw;
   }
          
   
 }); 
 
 
 function return_to_sidewindow_if_needed() {
    if (return_to_sidewindow) {
      slideInRightWin(cache[return_to_sidewindow]);
      return_to_sidewindow = false;
    }
 } 

 function get_conf(label, id, popup_stick_to_left) {

   id = typeof id !== 'undefined' ? id : null;
   popup_stick_to_left = typeof popup_stick_to_left !== 'undefined' ? popup_stick_to_left : false;

//   if (popup_stick_to_left) {
//     console.log('popup_stick_to_left = true');
//   }
//   else{
//     console.log('popup_stick_to_left = FALSE');
//   }

   // Caching.
   /*
   if ( 'content_conf_' + label in cache ) {
     save_sw = new_sw = false;
     if (cache[ 'content_conf_' + label ]) {
        showConfInPopUp(cache[ 'content_conf_' + label ]);
     }
     else {
       alert('No conference found with a title (or title containing) <' + label + '>');
       
       return_to_sidewindow_if_needed();
     }
     return;
   }
   else if ( 'content_' + sw + '_' + label in cache ) {
     save_sw = new_sw = false;
     // List in SlidingIn right window.
     if (cache[ 'content_' + sw + '_' + label ]) {
        //console.log('Get LIST from cache...');
        //console.log($('.cd-member-bio').attr('class'));
        setTimeout(function() {
          slideInRightWin(cache[ 'content_' + sw + '_' + label ]);
        }, 1000);
        
        return_to_sidewindow = false;
        //slideInRightWin(cache[ 'content_' + sw + '_' + label ]);
     }
     else {
 
          if (sw == 'title') {
            alert('No conference found with a title (or title containing) <' + label + '>');
          }
          else if (sw == 'industry') {
            alert('No conferences found tagged with an industry <' + label + '>');
          }
          else if (sw == 'city-state') {
            alert('No conferences found in the city/state <' + label + '>');
          }
          
          return_to_sidewindow_if_needed();
     }
     return;
   }  
   */
   
   // Progress indicators
   // http://stackoverflow.com/questions/15838525/how-to-create-custom-css3-loading-circle
   // http://cssload.net/
   // 
   $("input#conf").addClass('ui-autocomplete-loading');
   
   console.log(label);
   $.ajax({
              url: "get-conferences-ac",
              data: {
                type: sw, //'industry', //op: 'title',
                op: 'get', 
                term: label,
                id: id
              },
              dataType: "json",
              success: function( data ) {
                  
                  current_sw = new_sw ? new_sw : sw;
                  save_sw = new_sw = false;
                  
                  //console.log(data);
                  $("input#conf").removeClass('ui-autocomplete-loading');
                  
                  
                  
                  if (data.type == 'conference') {
                  
                  
                        if(cache[ 'content_conf_' + label ] = data.out) {
                          //console.log('Conf presents!');
                          showConfInPopUp(data.out, popup_stick_to_left);
                        }
                        
                  
                  } // End of if (data.type == 'conference') {
                  else {
                        // Lists
                        
                        if (cache[ 'content_' + current_sw + '_' + label ] = data.out) {
                          slideInRightWin(data.out);
                          return_to_sidewindow = false;
                        }

                  }
                  
                  if (!data.out) {
                    if (current_sw == 'title') {
                      alert('No conference found with a title (or title containing) <' + label + '>');
                    }
                    else if (sw == 'industry') {
                      alert('No conferences found tagged with an industry <' + label + '>');
                    }
                    else if (sw == 'city-state') {
                      alert('No conferences found in the city/state <' + label + '>');
                    }
                    
                    if (return_to_sidewindow) {
                      slideInRightWin(cache[return_to_sidewindow]);
                      return_to_sidewindow = false;
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
 
 
 
 function showConfInPopUp(html_data, popup_stick_to_left) {
   
  popup_stick_to_left = typeof popup_stick_to_left !== 'undefined' ? popup_stick_to_left : false; 
   
   
  
   
  $('#cb-popup_1 #results_1').html(html_data);
                        
  // Uncomment to stop scrolling.
  $("body").css('overflow', 'hidden');


   

   /*
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
            // Return to Side Slide window, if the popup was called from a side slide window.
            return_to_sidewindow_if_needed();
          }
   }); 
   */
  
  
  
  // Custom colorbox appearing transitions. 
  // Implemented and Works!
  //http://stackoverflow.com/questions/2760453/jquery-colorbox-background-transition-effect
  
  
  if (!popup_stick_to_left) {
        //console.log('popup in the middle');
        
        // Usual appearing, in the middle with the background shading.
        cb1 = $.fn.colorbox({
           transition: 'fade' , //'elastic',
           speed: 800,
           fadeOut: 1700,
           inline:true, 
           href:"#cb-popup_1", 
           width: 550,  //'40%'
           height: 500//545///470

           ,left: "50%"
           
           ,//added to remove initial flickering
          opacity : 0,
          //use the onOpen event...
          onOpen: function() {


              $("#colorbox").addClass('md-modal md-effect-6');
              $("#cboxWrapper").addClass('md-content');

              // prevent Overlay from being displayed...
              ////$('#cboxOverlay,#colorbox').css('visibility', 'hidden');
              // make the overlay visible and
              // re-add all it's original properties!
              $('#cboxOverlay').css({
                  'visibility': 'visible',
                  'opacity': 0.2,
                  //'height': 0,
                  'cursor': 'pointer',

                  // execute our original animation on the overlay!
                  // animate it you can use here all the
                  // possible animate combination or plugin...
              }).animate({
                  //height: ['toggle', 'swing'],
                  ////height: ['100%', 'swing'],
                  //opacity: 'toggle',
                  opacity: 0.7
              }, 1000 , function() {
                  //$('#colorbox')
                      //.css({'visibility': 'visible'})
                      //.fadeIn(1000)

                      ////.css({opacity: 0, visibility: "visible", display: "block", left: "10%"})
                      ////.animate({opacity: 1, left: '30%'}, 1000, "easeOutBounce")
                      //.fadeIn(1000)

                      //.css({visibility: "visible", display: "block"})
                      ;
                  //$("#colorbox").addClass('md-modal md-effect-6');
                  //$("#cboxWrapper").addClass('md-content');

                  // Works!
                  $("#colorbox").addClass('md-show');


              }); // End of animate of $('#cboxOverlay')
           }
           ,onClosed: function() {
                  $("#colorbox").removeClass('md-show');
                  //console.log('closed...');
                  $("body").css('overflow', 'inherit');
                  turned_off = true;
                  // Return to Side Slide window, if the popup was called from a side slide window.
                  return_to_sidewindow_if_needed();
                }
         }); 

   } // End of if (!popup_stick_to_left) {
   else {
  
    //console.log('popup stick to left');
    
      // Usual appearing, in the middle with the background shading.
      cb1 = $.fn.colorbox({
        transition: 'fade' , //'elastic',
        speed: 800,
        fadeOut: 1700,
        inline:true, 
        href:"#cb-popup_1", 
        width: 550,  //'40%'
        height: 500//545///470
        
        ,right: 530
        
        ,//added to remove initial flickering
       opacity : 0,
       //use the onOpen event...
       onOpen: function() {


           $("#colorbox").addClass('md-modal md-effect-6');
           $("#cboxWrapper").addClass('md-content');

           // prevent Overlay from being displayed...
           ////$('#cboxOverlay,#colorbox').css('visibility', 'hidden');
           // make the overlay visible and
           // re-add all it's original properties!
           $('#cboxOverlay').css({
               'visibility': 'visible',
               'opacity': 0.2,
               //'height': 0,
               'cursor': 'pointer',

               // execute our original animation on the overlay!
               // animate it you can use here all the
               // possible animate combination or plugin...
           }).animate({
               //height: ['toggle', 'swing'],
               ////height: ['100%', 'swing'],
               //opacity: 'toggle',
               opacity: 0
           }, 1000 , function() {
               //$('#colorbox')
                   //.css({'visibility': 'visible'})
                   //.fadeIn(1000)

                   ////.css({opacity: 0, visibility: "visible", display: "block", left: "10%"})
                   ////.animate({opacity: 1, left: '30%'}, 1000, "easeOutBounce")
                   //.fadeIn(1000)

                   //.css({visibility: "visible", display: "block"})
                   ;
               //$("#colorbox").addClass('md-modal md-effect-6');
               //$("#cboxWrapper").addClass('md-content');

               // Works!
               $("#colorbox").addClass('md-show');


           }); // End of animate of $('#cboxOverlay')
        }
        ,onClosed: function() {
               $("#colorbox").removeClass('md-show');
               //console.log('closed...');
               $("body").css('overflow', 'inherit');
               turned_off = true;
               // Return to Side Slide window, if the popup was called from a side slide window.
               return_to_sidewindow_if_needed();
             }
      }); 
      
   } // End of Else of if (!popup_stick_to_left) {
   
  
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
