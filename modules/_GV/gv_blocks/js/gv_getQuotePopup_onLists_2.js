(function ($) {

  Drupal.behaviors.gv_getQuotePopup_onLists_2 = {
    attach: function (context, settings) {
       
        //var turned_off = null;
        var turned_off = true;
        
        
        
        
        $$(".quote-trigger").click(function(){
            
            $$("body").css('overflow', 'hidden');

            jQuery.fn.popup("quote");
            
            // Track click.
            
            (jQuery).ajax({
            
                url: '/click', 
                data: {
                        type: 'quote_popup_on_list_click',
                        oid: jQuery(this).siblings().find('.nid').html(),
                        click_page: window.location.href,
                        url: '',//jQuery(this).attr('href'),
                        title: jQuery(this).siblings().find('.name').html()
                        //,referer: document.referrer
                       
                      }, 
                    type: 'POST', 
                    dataType: 'json'
                    
                    , 
                    success: function(data) 
                            { 
                                if(!data.error) {
                                    //console.log('Track clicked!');
                                }
                                return false;
                            } 
                     
            }); // end of ($).ajax

              $$('popup-request-intro-title-highlight').html(jQuery(this).siblings().find('.name').html());
              
              $$('.popup-request input[name="provider_id"]').val(jQuery(this).siblings().find('.nid').html());
              $$('.popup-request input[name="provider_name"]').val(jQuery(this).siblings().find('.name').html());
            //});

       
            


        // Prepare form
        $$('.popup-request-form').form('prepare');

        $$('.popup-request-form .next').click(function(){
          $$('.popup-request-form').form('next');
        });

        $$(".popup-request-form .close, .popup-overlay").click(function(){
            jQuery.fn.popup("close");
        });

        $$(".step-three .popup-request-control-button").click(function(){
            $$('.popup-request-form').submit();
        });

        $$('.popup-request-form').submit(function(e){
            e.preventDefault();
            $$('.popup-request-form').form('submit', '/request');
        });
        
       
            
            
            turned_off = true;
            
            
            return false;
            
            
        });
        
        
       
    }
  };

}($));
