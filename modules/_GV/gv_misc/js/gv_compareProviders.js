(function ($) {

  Drupal.behaviors.gv_compareProviders = {
    attach: function (context, settings) {
           
       
       //$('#block-views-providers-block_top_business_cmp').append('<div class="compare-button" id="b1" style="display: none; height: 100px; width: 35px; position: absolute; right: -24px;top: 216px; z-index: 20;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
       $('.bu-providers').append('<div class="compare-button" id="b1" style="display: none; height: 100px; width: 35px; position: absolute; right: -24px;top: 216px; z-index: 20;"><img src="/sites/all/themes/gv_orange/css/images/compare-button2.png" style="height: 150px; cursor: pointer;"/></div>');
         
         
         
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
         
         for (i = 0; i < checkboxes.length; ++i) {
           if (checkboxes[i].checked) {
             ++checked_count;
           }
         }
         
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
         
         if (!checked_count) {
           $('.compare-button#b1').hide();
         }
         else {
           $('.compare-button#b1').show();
         }
         
       });


       
    }
  };

}(jQuery));
