!function($){Drupal.behaviors.gv_getQuotePopup_onLists={attach:function(e,u){var r=!0;jQuery(".quote-trigger").click(function(){return jQuery("body").css("overflow","hidden"),jQuery.fn.popup("quote"),jQuery.ajax({url:"/click",data:{type:"quote_popup_on_list_click",oid:jQuery(this).siblings().find(".nid").html(),click_page:window.location.href,url:"",title:jQuery(this).siblings().find(".name").html()},type:"POST",dataType:"json",success:function(e){return!e.error,!1}}),jQuery(".popup-request-intro-title-highlight").html(jQuery(this).siblings().find(".name").html()),jQuery('.popup-request input[name="provider_id"]').val(jQuery(this).siblings().find(".nid").html()),jQuery('.popup-request input[name="provider_name"]').val(jQuery(this).siblings().find(".name").html()),jQuery(".popup-request-form").form("prepare"),jQuery(".popup-request-form .next").click(function(){jQuery(".popup-request-form").form("next")}),jQuery(".popup-request-form .close, .popup-overlay").click(function(){jQuery.fn.popup("close")}),jQuery(".step-three .popup-request-control-button").click(function(){jQuery(".popup-request-form").submit()}),jQuery(".popup-request-form").submit(function(e){e.preventDefault(),jQuery(".popup-request-form").form("submit","/request")}),r=!1,!1})}}}(jQuery);