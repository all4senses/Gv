function css_browser_selector(e){var t=e.toLowerCase(),a=function(e){return t.indexOf(e)>-1},s="gecko",i="webkit",o="safari",r="opera",n="mobile",l=document.documentElement,f=[!/opera|webtv/i.test(t)&&/msie\s(\d)/.test(t)?"ie ie"+RegExp.$1:a("firefox/2")?s+" ff2":a("firefox/3.5")?s+" ff3 ff3_5":a("firefox/3.6")?s+" ff3 ff3_6":a("firefox/3")?s+" ff3":a("gecko/")?s:a("opera")?r+(/version\/(\d+)/.test(t)?" "+r+RegExp.$1:/opera(\s|\/)(\d+)/.test(t)?" "+r+RegExp.$2:""):a("konqueror")?"konqueror":a("blackberry")?n+" blackberry":a("android")?n+" android":a("chrome")?i+" chrome":a("iron")?i+" iron":a("applewebkit/")?i+" "+o+(/version\/(\d+)/.test(t)?" "+o+RegExp.$1:""):a("mozilla/")?s:"",a("j2me")?n+" j2me":a("iphone")?n+" iphone":a("ipod")?n+" ipod":a("ipad")?n+" ipad":a("mac")?"mac":a("darwin")?"mac":a("webtv")?"webtv":a("win")?"win"+(a("windows nt 6.0")?" vista":""):a("freebsd")?"freebsd":a("x11")||a("linux")?"linux":"","js"];return c=f.join(" "),l.className+=" "+c,c}css_browser_selector(navigator.userAgent),!function(e,t){var $={};$$=function(a){var s=$[a];return s!==t?s:$[a]=e(a)},$$.clear=function(e){$[e]=t},$$.fresh=function(e){return $[e]=t,$$(e)}}(jQuery);var $window=$$(window),$this=$$(this);$$(".solution-nav").insertAfter(".navigation"),$$(".main-menu-item.first").on("click",function(){var e=$this.data("clicks");e?$$(".solution-nav").removeClass("open"):$$(".solution-nav").addClass("open"),$this.data("clicks",!e)}),$$(".hero-header").on("click, touchstart",function(){var e=$$(".main-menu-item.first").data("clicks");$$(".solution-nav").removeClass("open"),$$(".main-menu-item.first").data("clicks",!e)}),$$("#tab-0-c, #tab-0").addClass("active"),$$(".learn-box-tabs-item").click(function(){var e=jQuery(this).prop("id"),t="#"+e+"-c";$$(".learn-box-tabs-item").removeClass("active"),$$(".learn-box-content-section").removeClass("active"),jQuery(this).addClass("active"),$$(t).addClass("active")});var $windowOffset=$window.scrollTop(),$tableOffset=$$(".chart").offset().top,$tableSticky='<table class="chart horizontal sticky-table"></table>';$$(".chart").before($tableSticky),$$(".chart thead").clone().addClass("sticky-table-thead").appendTo(".sticky-table"),0>$tableOffset-$windowOffset&&$$(".sticky-table").addClass("show"),$window.scroll(function(){var e=$window.scrollTop(),t=$$(".chart").not(".sticky-table").offset().top,a=$$(".chart").not(".sticky-table").height(),s=$$(".chart thead").height(),i=t+a-s,o=i-e;0>t-e?$$(".sticky-table").addClass("show"):$$(".sticky-table").removeClass("show"),e>=i&&74>e-i&&$$(".sticky-table").css("top",o),0>e-i&&$$(".sticky-table").css("top",0),e-i>74&&$$(".sticky-table").removeClass("show")});