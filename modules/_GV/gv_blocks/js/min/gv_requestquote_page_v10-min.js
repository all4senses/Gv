!function($){Drupal.behaviors.gv_requestquote_page_v10={attach:function(e,t){jQuery(document).ready(function($){var e=$(window).height(),t=e-87;if(e>815){$(".full-height").height(t);var a=t-607}else if(815>e){$(".full-height").height(728);var a=473}$(".video").height(a)}),$(window).resize(function(){var e=$(window).height(),t=e-87;if(e>815){$(".full-height").height(t);var a=t-607}else if(815>e){$(".full-height").height(728);var a=386}$(".video").height(a)}),$(".lpv10-form").form("prepare"),$(".lpv10-form .next").click(function(){$(".lpv10-form").form("next")}),$(".lpv10-form .back").click(function(){$(".lpv10-form").form("back")}),$(".lpv10-form .calculate").click(function(){$(".lpv10-form").form("next"),$(".step.two .error").length||setTimeout(function(){do x=Math.floor(5*Math.random()+1);while(x<3);$(".title-second .number, .title-second .number2").html(x),$(".lpv10-form").form("next")},2e3)}),$(".lpv10-form .submit").click(function(){$(".lpv10-form").submit()}),$(".lpv10-form").submit(function(e){e.preventDefault(),$(".lpv10-form").form("submit","/request")}),$('input[name="referrer"]').val(document.referrer),$('input[name="url"]').val(document.URL),$('input[id="firstname"], input[id="lastname"]').keydown(function(e){(e.keyCode>=48&&e.keyCode<=57||e.keyCode>=96&&e.keyCode<=105||186==e.keyCode||191==e.keyCode||190==e.keyCode)&&e.preventDefault()}),$("input").blur(function(){jQuery.ajax({url:"/request/capture",data:{op:"set",url:window.location.href,email:$("#email").val()!=$("#email").attr("placeholder")?$("#email").val():"",firstname:$("#firstname").val()!=$("#firstname").attr("placeholder")?$("#firstname").val():"",lastname:$("#lastname").val()!=$("#lastname").attr("placeholder")?$("#lastname").val():"",website:$("#website").val()!=$("#website").attr("placeholder")?$("#website").val():"",company:$("#company").val()!=$("#company").attr("placeholder")?$("#company").val():"",company:$("#q-title").val()!=$("#q-title").attr("placeholder")?$("#q-title").val():"",phone:$("#phone").val()!=$("#phone").attr("placeholder")?$("#phone").val():"",phones_amt:$("#phones_amt").val(),q_type:$("#q_type").val(),buying_time:$("#buying_time").val(),source:$('input[name="source"]').val(),version:$('input[name="version"]').val(),referrer:document.referrer},type:"POST",dataType:"json"})})}}}(jQuery);