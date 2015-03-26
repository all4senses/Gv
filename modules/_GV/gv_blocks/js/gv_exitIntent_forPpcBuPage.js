(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_exitIntent_forPpcBuPage = {
    attach: function (context, settings) {
       
       
       
       // Exit intent functionality.
       
        var turned_off = null; //true;
        var turned_off_suppressed = null;
        
        $(".visit-site-btn, table .company a, table a.logo, table a.link").click(function(){
            turned_off = true;
            turned_off_suppressed = true;
        });
        
        
        // Quick hack for prevent scrolling down of colorbox popup window on press the tab key in the Company field (first step)
//        jQuery('.exit-intent-form input[id="company"]').keydown(function (event) { 
//            
//            //console.log(jQuery(this).val());
//            console.log(event.keyCode);
//   
//            if(event.keyCode == 9){ // Tab
//              jQuery(this).blur();
//              jQuery('.exit-intent-form #phones_amt-button').focus();
//              event.preventDefault();     // Prevent character input
//            }
//
//        }); 
        

        jQuery('.exit-intent-form').keydown(function (event) { 

            // Stop changing focus on the last element in the form section
            if(event.keyCode == 9 && (event.target.id == "phones_amt-button" || event.target.id == "phone") ) {
              event.preventDefault();     // Prevent character input
            }
        }); 
        
       
        $(document).on('mouseleave', function(e) {
            
            if (!turned_off && e.pageY - $(window).scrollTop() <= 1) {    
                turned_off = true;
                  // Disable page scrolling
                  // Other ways of scrolling disabling - 
                  // http://stackoverflow.com/questions/4770025/how-to-disable-scrolling-temporarily
                  // http://stackoverflow.com/questions/19817899/jquery-or-javascript-how-to-disable-window-scroll-without-overflowhidden
                  
          
                  // Uncomment to stop scrolling.
                  $$("body").css('overflow', 'hidden');
      
                  $.fn.popup("exit");
            }
        });

        // Prepare form
        $('#exitIntent').form('prepare');

        $('.exit-intent-form .next').click(function(){
          $('.exit-intent-form').form('next');
        });

        $(".exit-intent-form .no, .popup-overlay").click(function(){
            $.fn.popup("close");
        });

        $('.exit-intent-form').submit(function(e){
            e.preventDefault();
            $('.exit-intent-form').form('submit');
        });
        
       
       
       
       
        $('.exit-intent-form input[name="referrer"]').val(document.referrer);
        $('.exit-intent-form input[name="url"]').val(document.URL);
       
              
        
        $('input[id="firstname"], input[id="lastname"]').keydown(function (event) { 
            
            if( 
                    (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                    || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
                    || (event.keyCode == 186) // :
                    || (event.keyCode == 191) // /
                    || (event.keyCode == 190) // .
              ) {
                    event.preventDefault();     // Prevent character input
            }

        });
        
        
       // jQuery.validator.addMethod("notEqualsTo", function(value, element, param) {
       //    return !(this.optional(element) || value === param);
       //  }, "All fields with * are required");


        // Click on a label will click on a radio button.
        $(".exit-intent-form .label_after").click(function(){
          $(this).prev().click();
        });
        
        
    //     $(".exit-intent-form").formwizard({ 

				//  	formOptions :{
            
    //         success: function(data){
    //           $('.exit-intent-form .sending').hide(); 
    //           $('.exit-intent-form').html('');
    //           $(".exit-intent-form .success").append(data.data); 
    //           $(".exit-intent-form .success").show();
              
    //           setTimeout(
    //                 function(){
    //                   $.fn.popup("close");
    //                   turned_off = true;
    //                 },
    //                15000
    //              ); 
               
    //         },
						
    //         beforeSubmit: function(data){
    //           $('.exit-intent-form .exit-intent-control').html(''); 
    //           $('.exit-intent-form #Navigation').hide();
    //           $(".exit-intent-form .sending").append('<div class="wait"><p><strong>Please wait</strong> a moment while processing your request...</p></div>'); 
    //           $(".exit-intent-form .sending").show(); 
    //         },
            
            
    //         dataType: 'json',
				// 		resetForm: true
				//  	}	
				//  }
				// );
    
    
        

    
    }
  };

}(jQuery));