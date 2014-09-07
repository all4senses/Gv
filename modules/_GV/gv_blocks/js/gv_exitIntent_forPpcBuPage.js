(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_exitIntent_forPpcBuPage = {
    attach: function (context, settings) {
       
       
       
       // Exit intent functionality.
       //console.log('xxx');
       
       //var turned_off = null;
        var turned_off = true;
        
        // 3 mins delay before turn on the exitIntent popup.
        setTimeout(
                    function(){
                      turned_off = null; 
                      //console.log('popup is turned on');
                    },
                   1800 //180000
                 ); 
       
        $(document).bind("mouseleave", function(e)
        {
            //console.log(e.pageY);
            
            //if (!turned_off && e.pageY <= 1)
            if (!turned_off && e.pageY - $(window).scrollTop() <= 1)
            {    
                turned_off = true;
                //now = new Date();           
                //for (i=0; i < times.length; i++)
                {
                    //if (now.getTime() > times[i][0] && now.getTime() < times[i][1])
                    {
                        //$.fn.colorbox({iframe:true, width:650, height:600, href: "get-popup-on-exit-intent", open: true});  
                        
                        ////$.fn.colorbox({iframe:true, width:650, height:400, href: 'get/iframe/exitIntent_lpV4', open: true});  
                        
                        $.fn.colorbox({inline:true, href:"#exitIntent", width:780, height:440});  
                        
                        //$.fn.colorbox.close();
                        //alert('test');
                    }    
                }
            }
        });
        
        
        $("#no").click(function(){
            //console.log('Closedddddd');
            $.fn.colorbox.close();
        });
        
        
//        window.addEventListener("message", receiveMessage, false);
//        function receiveMessage(event) {
//            //alert('Message: ' + event.data);
//            if (event.data == 'close') {
//              $.fn.colorbox.close();
//            }
//        }
        
        
       
       
       
       
       
       
       
        $('input[name="referrer"]').val(document.referrer);
        $('input[name="url"]').val(document.URL);
       
       
       /*
        //$('select').selectmenu();
        $('select').selectmenu({
          //style:'popup', 
          maxHeight: 300
  			});
       
       
       
       
       
        $('input[id="phone"]').keydown(function (event) { 
            
            //console.log($(this).val());
            //console.log(event.keyCode);
            
            //var l = $(this).val().length;
            if( !(     event.keyCode == 8                                // backspace
                    || event.keyCode == 9
                    || event.keyCode == 46                              // delete
                    || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end

                    || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                    || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
                  
                    || (event.keyCode == 32 || event.keyCode == 189 || event.keyCode == 190 || event.keyCode == 173)    // space, dash, dot
                 )   
              ) {
                    event.preventDefault();     // Prevent character input
            }

        });        
        
        $('input[id="firstname"], input[id="lastname"]').keydown(function (event) { 
            
            //console.log($(this).val());
            //console.log(event.keyCode);
            
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
        
        
       jQuery.validator.addMethod("notEqualsTo", function(value, element, param) {
          return !(this.optional(element) || value === param);
        //}, jQuery.format("You must not enter {0}"));
        }, "All fields with * are required");

        // Overriding the default Required message.
        jQuery.extend(jQuery.validator.messages, {
            required: Drupal.t('All fields with * are required')
        });

        // Click on a label will click on a radio button.
        $(".label_after").click(function(){
          $(this).prev().click();
        });
        
        */
        
        $("#requestQuoteFormWrapper .multipartForm").formwizard({ 
				 	formPluginEnabled: true,
				 	validationEnabled: true,
				 	//focusFirstInput: true,
          textSubmit : 'Send me my Free Quote',
          textNext: "Next",
          
          formOptions :{
						//success: function(data){alert('Success!'); $("#status").fadeTo(50,1,function(){ $(this).html("You are now registered!").fadeTo(5000, 0); })},
            //success: function(data){$('#requestQuoteFormWrapper .sending').hide('clip'); $("#requestQuoteFormWrapper .success").append(data.data); $("#requestQuoteFormWrapper .success").show('clip');},
            
            success: function(data){$('#requestQuoteFormWrapper .sending').hide(); $("#requestQuoteFormWrapper .success").append(data.data); $("#requestQuoteFormWrapper .success").show();},
						
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide('clip'); $("#requestQuoteFormWrapper .sending").append('Data is sendingt: ' + $.param(data)); $("#requestQuoteFormWrapper .sending").show('clip'); },//function(data){$("#data").html("data sent to the server: " + $.param(data));},
            //beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide('clip'); $("#requestQuoteFormWrapper .sending").append('<p>Please wait a moment while processing your request.</p>'); $("#requestQuoteFormWrapper .sending").show('clip'); },
            beforeSubmit: function(data){$('#requestQuoteFormWrapper .multipartForm').hide(); $("#requestQuoteFormWrapper .sending").append('<div class="wait"><p><strong>Please wait</strong> a moment while processing your request...</p></div>'); $("#requestQuoteFormWrapper .sending").show(); },
            
            
            dataType: 'json',
						resetForm: true
				 	}	
				 }
				);
    
        //console.log($("#requestQuoteFormWrapper .multipartForm").formwizard("state"));
    
    
    
      $("#requestQuoteFormWrapper").removeClass('hidden'); 
    

    
    }
  };

}(jQuery));