!function($){Drupal.behaviors.gv_requestquote_page_v8={attach:function(e,t){$('input[name="referrer"]').val(document.referrer),$('input[name="url"]').val(document.URL),$("select").selectmenu({maxHeight:300}),$('input[id="phone"]').keydown(function(e){8==e.keyCode||9==e.keyCode||46==e.keyCode||e.keyCode>=35&&e.keyCode<=40||e.keyCode>=48&&e.keyCode<=57||e.keyCode>=96&&e.keyCode<=105||32==e.keyCode||189==e.keyCode||190==e.keyCode||173==e.keyCode||e.preventDefault()}),$('input[id="firstname"], input[id="lastname"]').keydown(function(e){(e.keyCode>=48&&e.keyCode<=57||e.keyCode>=96&&e.keyCode<=105||186==e.keyCode||191==e.keyCode||190==e.keyCode)&&e.preventDefault()}),jQuery.validator.addMethod("notEqualsTo",function(e,t,r){return!(this.optional(t)||e===r)},"All fields with * are required"),jQuery.extend(jQuery.validator.messages,{required:Drupal.t("All fields with * are required")}),$(".label_after").click(function(){$(this).prev().click()}),$("#requestQuoteFormWrapper .multipartForm").formwizard({formPluginEnabled:!0,validationEnabled:!0,textSubmit:"Get My Free Quote",textNext:"Let's Get Started",validationOptions:{groups:{username:"firstname lastname email phone",first_step:"phones_amt q_for q_type buying_time"},errorPlacement:function(e,t){e.insertAfter("phones_amt"==t.attr("name")||"q_for"==t.attr("name")||"buying_time"==t.attr("name")||"q_type"==t.attr("name")?".step":"firstname"==t.attr("name")||"lastname"==t.attr("name")||"company"==t.attr("name")||"email"==t.attr("name")||"phone"==t.attr("name")?"#phone":t)},rules:{phones_amt:"required",q_for:"required",q_type:"required",buying_time:"required",connection:"required",firstname:{required:!0,minlength:2,notEqualsTo:$('input[id="firstname"]').attr("title")},lastname:{required:!0,minlength:2,notEqualsTo:$('input[id="lastname"]').attr("title")},phone:{required:!0,minlength:10,maxlength:15,notEqualsTo:$('input[id="phone"]').attr("title")}},messages:{firstname:Drupal.t("First Name is required"),lastname:Drupal.t("Last Name is required"),phone:Drupal.t("Enter a valid phone number"),email:{email:Drupal.t("Email format must be name@domain.com")}}},formOptions:{success:function(e){$("#requestQuoteFormWrapper .sending").hide(),$("#requestQuoteFormWrapper .success").append(e.data),$("#requestQuoteFormWrapper .success").show()},beforeSubmit:function(e){$("#requestQuoteFormWrapper .multipartForm").hide(),$("#requestQuoteFormWrapper .sending").append('<div class="wait"><p><strong>Please wait</strong> a moment while processing your request...</p></div>'),$("#requestQuoteFormWrapper .sending").show()},dataType:"json",resetForm:!0}}),$("#requestQuoteFormWrapper").removeClass("hidden")}}}(jQuery);