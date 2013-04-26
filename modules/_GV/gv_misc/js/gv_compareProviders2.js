(function ($) {

  Drupal.behaviors.gv_compareProviders = {
    attach: function (context, settings) {
           
       var block_height = ($(".bu-providers tbody").height() / 2) + 15;
       //console.log('height = ' + block_height);
       
       //$('#block-views-providers-block_top_business_cmp').append('<div class="compare-button" id="b1" style="display: none; height: 100px; width: 35px; position: absolute; right: -24px;top: 216px; z-index: 20;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
       //$('.bu-providers').append('<div class="compare-button" id="b1" style="display: none; height: 100px; width: 35px; position: absolute; right: -24px;top: 216px; z-index: 20;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
       $('.bu-providers').append('<div class="compare-button" id="b1" style="top: ' + block_height + 'px;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
         
       
         
       $(".compare-button#b1").click(function(e){
         
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
         
       });    
       
       
       
       
       
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
         
         console.log(checkboxes_checked);
         
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
         
         
         
         console.log($(this)[0].checked);
         
         if (!checked_count) {
           //$('.compare-button#b1').hide();
           $('#b2').remove();
         }
         else {
           
            //$('.compare-button#b1').show();
           
            var current_tr = $(this).parent().parent();
         
            console.log(current_tr);
            console.log(e);

            $('#b2').remove();
            if ($(this)[0].checked) {
              $(this).parent().parent().append('<div class="compare-button" id="b2" style="display: block !important;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
            }
            else {
             console.log(checkboxes_checked[0]);
            }
         
         }
         
       });


       
    }
  };

}(jQuery));
