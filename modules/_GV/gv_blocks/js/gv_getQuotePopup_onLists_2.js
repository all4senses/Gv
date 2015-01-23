(function ($) {

  Drupal.behaviors.gv_getQuotePopup_onLists_2 = {
    attach: function (context, settings) {
       
        //var turned_off = null;
        var turned_off = true;
        
        
        
        
        $(".get_quote_popup").click(function(){
            //console.log('Show...');
            
            // Disable page scrolling
            // Other ways of scrolling disabling - 
            // http://stackoverflow.com/questions/4770025/how-to-disable-scrolling-temporarily
            // http://stackoverflow.com/questions/19817899/jquery-or-javascript-how-to-disable-window-scroll-without-overflowhidden
            $("body").css('overflow', 'hidden');
            
            
            // Track click.
            
            (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'quote_popup_on_list_click',
                        oid: jQuery(this).find('.nid').html(),
                        click_page: window.location.href,
                        url: '',//$(this).attr('href'),
                        title: jQuery(this).find('.name').html()
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    console.log('Track clicked!');
                                }
                                return false;
                            } 
                     
            }); // end of (jQuery).ajax
        

            
            
            // Reset previous submission state.
            $('.popup-request.quote .results').hide(); 
            $('.popup-request.quote .multipartForm').show(); 
            
            // Recreatehints if it they were cleared on the previous submission.
            $('input[id="firstname"], input[id="lastname"], input[id="email"], input[id="company"], input[id="phone"]').each(function(){
              if ($(this).val() == '') {
                $(this).val($(this).attr('title'));
              }
              if ($(this).val() == $(this).attr('title')) {
                $(this).addClass('blur');
              }
            });

            
//            jQuery('.get_quote_popup').parent().parent().find('img');
//            console.log(jQuery('.multipartForm input[name="provider_id"]').val());
            
            //jQuery('.get_quote_popup').click(function() {
              //jQuery('.popup-request.quote .logo').html(jQuery(this).parent().parent().find('img').clone());
              //jQuery('.popup-request.quote .logo').html(jQuery(this).parent().parent().find('.sprite-div').clone());
              jQuery('.popup-request.quote .title-first span, .popup-request.quote .title-second span span').html(jQuery(this).find('.name').html());
              
              jQuery('.popup-request.quote .multipartForm input[name="provider_id"]').val(jQuery(this).find('.nid').html());
              jQuery('.popup-request.quote .multipartForm input[name="provider_name"]').val(jQuery(this).find('.name').html());
            //});
            
            
            // Reset checkboxes.
            /*
            jQuery('.top5 .choice-checkbox.checked, .people .choice.checked').each(function(){
              checkb = jQuery(this).find('input');
              jQuery(checkb).removeAttr('checked');
              jQuery(this).removeClass('checked');
            });
            */
            $('.top5 .choice-checkbox.checked, .people .choice.checked').each(function(){
              checkb = $(this).find('input');
              $(checkb).removeAttr('checked');
              $(this).removeClass('checked');
            });
            
            /*
            jQuery('.choice-checkbox ').each(function(){
              checkb = jQuery(this).find('input');
              checked = jQuery(checkb).attr('checked')
              //console.log(checked);
              if (checked) {
                jQuery(checkb).removeAttr('checked');
                jQuery(this).removeClass('checked');
              }
            });
            
            jQuery('.choice.checked').each(function(){
              checkb = jQuery(this).find('input');
                jQuery(checkb).removeAttr('checked');
                jQuery(this).removeClass('checked');
            });
           */
            
            //jQuery(".popup-request.quote .multipartForm").formwizard("show","phones_amt_section");
            $(".popup-request.quote .multipartForm").formwizard("reset");
          
          
          


            
            $.fn.colorbox({
              inline:true, 
              href:".popup-request.quote", 
              width:730, 
              height:606, 
              onClosed: function() {
               //console.log('closed...');
               $("body").css('overflow', 'inherit');
               turned_off = true;
              }
            });  
            
            
            turned_off = false;
            
            if ($(".popup-request.quote form").css('display') == 'block') {
              $('.popup-request.quote .results').hide();
            }
            
            return false;
        });
        
        
        /*
        $("#no").click(function(){
            //console.log('Closed...');
            
            // Enabling back the page scrolling
            $("body").css('overflow', 'inherit');
            
            $.fn.colorbox.close();
            turned_off = true;
            return false;
        });
        */
    
        
        
        
        /*
        $("#cboxOverlay").click(function(){
            //console.log('Closed via body click...');
            // Enabling back the page scrolling
            $("body").css('overflow', 'inherit');
            
            //$('.popup-request').hide();
            
//            $('.popup-request .sending').hide();
//            $(".popup-request .success").hide();
//            $('.popup-request .multipartForm').show();
            turned_off = true;
            //return false;
        });
        */
        
        
        
        
       
    }
  };

}(jQuery));
