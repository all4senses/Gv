(function ($) {

  Drupal.behaviors.gv_compareProviders = {
    attach: function (context, settings) {
           
       
       //console.log('height = ' + block_height);
       
       //$('#block-views-providers-block_top_business_cmp').append('<div class="compare-button" id="b1" style="display: none; height: 100px; width: 35px; position: absolute; right: -24px;top: 216px; z-index: 20;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
       //$('.bu-providers').append('<div class="compare-button" id="b1" style="display: none; height: 100px; width: 35px; position: absolute; right: -24px;top: 216px; z-index: 20;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');

       ////var block_height = ($(".bu-providers tbody").height() / 2) + 15;
       ////$('.bu-providers').append('<div class="compare-button" id="b1" style="top: ' + block_height + 'px;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
         
       
         
//       $(".compare-button#b2").click(function(e){
//         
//         var checkboxes = $(".p-compare");
//         
//         var params = '';
//         for (i = 0; i < checkboxes.length; ++i) {
//           if (checkboxes[i].checked) {
//             //console.log(checkboxes[i].name);
//             if (params) {
//               params += ';' + checkboxes[i].name;
//             }
//             else {
//               params = checkboxes[i].name;
//             }
//           }
//         }
//         var url = 'http://getvoip.com/compare-providers?p=' + encodeURIComponent(params);
//         //console.log(url);
//         
//         top.location.href = url;
//         
//       });    
       
       
       
       
       
       $(".p-compare").click(function(e){
         
         var checked_count = 0;
         var checkboxes = $(".p-compare");
         
         var checkboxes_checked = [];
         
         for (i = 0; i < checkboxes.length; ++i) {
           if (checkboxes[i].checked) {
             ++checked_count;
             checkboxes_checked.push(checkboxes[i]);
           }
         }
         
         //console.log(checkboxes_checked);
         
         if (checked_count >= 3) {
           for (i = 0; i < checkboxes.length; ++i) {
            if (!checkboxes[i].checked) {
              checkboxes[i].disabled = true;
              checkboxes[i].title = 'You can select not more than 3 providers';
            }
          }
         }
         else {
           for (i = 0; i < checkboxes.length; ++i) {
              checkboxes[i].disabled = false;
              checkboxes[i].title = '';
            }
         }
         
         
         
         //console.log($(this)[0].checked);
         
         if (!checked_count) {
           //$('.compare-button#b1').hide();
           $('#b2').remove();
         }
         else {
           
            //$('.compare-button#b1').show();
           
            //var current_tr = $(this).parent().parent();
         
            //console.log(current_tr);
            //console.log(e);

            
            $('#b2').remove();
            if ($(this)[0].checked) {
              
              //var b_top = ($(this).parent().height()/2 - 35);
              var b_top = ($(this).parent().parent().height()/2 - 20) - $(this).parent().parent().height()/2;
            
              //$(this).parent().parent().append('<div class="compare-button" id="b2" style="display: block !important;"><img src="/sites/all/themes/gv_orange/css/images/compare-btn-next4.png"/></div>');
              //$(this).parent().append('<div class="compare-button" id="b2" style="top: ' + b_top + 'px; display: block !important;"><img src="/sites/all/themes/gv_orange/css/images/compare-btn-next4.png"/></div>');
              $(this).parent().append('<div style="padding: 0px; top: -30px; position: relative; width: 80px; margin: 0px; height: 1px;"><div class="compare-button" id="b2" style="top: ' + b_top + 'px; display: block !important;"><img src="/sites/all/themes/gv_orange/css/images/compare-btn-next4.png"/></div></div>');
            }
            else {
             //console.log(checkboxes_checked[0]);
             
              //var b_top = $(checkboxes_checked[checked_count - 1]).parent().height()/2 - 35;
              var b_top = $(checkboxes_checked[checked_count - 1]).parent().parent().height()/2 - 35 - $(checkboxes_checked[checked_count - 1]).parent().parent().height()/2;
              
             //$(checkboxes_checked[checked_count - 1]).parent().parent().append('<div class="compare-button" id="b2" style="display: block !important;"><img src="/sites/all/themes/gv_orange/css/images/compare-btn-next4.png"/></div>');
             //$(checkboxes_checked[checked_count - 1]).parent().append('<div class="compare-button" id="b2" style="top: ' + b_top + 'px; display: block !important;"><img src="/sites/all/themes/gv_orange/css/images/compare-btn-next4.png"/></div>');
             $(checkboxes_checked[checked_count - 1]).parent().append('<div style="padding: 0px; top: -30px; position: relative; width: 80px; margin: 0px; height: 1px;"><div class="compare-button" id="b2" style="top: ' + b_top + 'px; display: block !important;"><img src="/sites/all/themes/gv_orange/css/images/compare-btn-next4.png"/></div></div>');
            }
            
            $(this).parent().css('position', 'relative');
            
            $(".compare-button#b2").click(compare_click);
         
         }
         
       });


       
    }
  };


      function compare_click(e){
         
         var checkboxes = $(".p-compare");
         
         var params = '';
         for (i = 0; i < checkboxes.length; ++i) {
           if (checkboxes[i].checked) {
             //console.log(checkboxes[i].name);
             if (params) {
               params += ';' + checkboxes[i].name;
             }
             else {
               params = checkboxes[i].name;
             }
           }
         }
         var url = 'http://getvoip.com/compare-providers?p=' + encodeURIComponent(params);
         //console.log(url);
         
         top.location.href = url;
         
       }
       
       
}(jQuery));
