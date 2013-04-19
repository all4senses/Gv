(function ($) {

  Drupal.behaviors.gv_compareProviders = {
    attach: function (context, settings) {
           
       
       $('#block-views-providers-block_top_business_cmp').append('<div class="compare-button" id="b1" style="display: none; height: 100px; width: 35px; background-color: red; position: absolute; right: -10px;top: 220px;"></div>');
           
       $(".p-compare").click(function(e){
         console.log(e);
         //console.log(this);
         
         //console.log($(this).val());
         
         console.log($(this));
         
         
         

         //console.log($(this)[0]);
         console.log($(this)[0].checked);
         console.log($(this)[0].id);
         console.log($(this)[0].name);
         //return false;
         
         var checked_count = 0;
         var checkboxes = $(".p-compare");
         console.log(checkboxes);
         
         for (i = 0; i < checkboxes.length; ++i) {
           if (checkboxes[i].checked) {
             console.log(i + ' is checked');
             ++checked_count;
           }
         }
         
         if (checked_count >= 3) {
           console.log('more than 3');
           for (i = 0; i < checkboxes.length; ++i) {
            if (!checkboxes[i].checked) {
              console.log(i + ' disabled');
              checkboxes[i].disabled = true;
              checkboxes[i].title = 'You can select not more than 3 providers';
            }
          }
         }
         else {
           console.log('enable all');
           for (i = 0; i < checkboxes.length; ++i) {
              checkboxes[i].disabled = false;
              checkboxes[i].title = '';
            }
         }
         
         if (!checked_count) {
           console.log('not selected at all');
           $('.compare-button#b1').hide();
         }
         else {
           console.log('selected something');
           $('.compare-button#b1').show();
         }
         
       });


       
    }
  };

}(jQuery));
