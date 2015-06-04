(function ($) {

// Based on 2-step form of the page v1.
  Drupal.behaviors.gv_exitIntent_pdf = {
    attach: function (context, settings) {
              
       // Exit intent functionality.
       
        var turned_off = null; //true;
        var turned_off_suppressed = null;

        $$('.pdf-button').on('click', function(){
            $$("body").addClass('opened-popup');
            $.fn.popup("exit_pdf");

            if ( $.cookie('pdf_complete') === 'true' ) {
              var downloadMsg = '<div class="results"><div class="results-success"><div class="results-success-download"> <a href="http://getvoip.com/pdfs/hosted-voip-guide-2015.pdf" target="_blank"> <div class="results-success-download-wrap"> <div class="results-success-download-icon"></div><span class="results-success-download-text">Download PDF</span></div></a></div><p class="results-success-text"><strong>Thank you</strong> for requesting a quote. A dedicated VoIP specialist will be calling you very shortly to finalize the quote. <br><br>In the meantime, visit <a href="http://getvoip.com/business">GetVoIP.com</a> to browse featured business phone providers.</p></div></div>';

              if ( !$$('.popup .results-success').length ) {
                $$('.popup-content').addClass('final').html(downloadMsg);
              } else {
                $$('.popup-content').addClass('final');
              }

            } else {
              $('#exitIntentPDF').form('prepare');
            }
        });


        // Prepare form

        $('#exitIntentPDF .next').click(function(){
          $('#exitIntentPDF').form('next');
        });

        $$(".popup-overlay").click(function(){
            $.fn.popup("close");
        });

        $$('#exitIntentPDF').children('form').submit(function(e){
            e.preventDefault();
            $('#exitIntentPDF').form('submit', '/request');
            // $.cookie('pdf_complete', 'true');
        });
        
       
       
       
       
        $('#exitIntentPDF').find('input[name="referrer"]').val(document.referrer);
        $('#exitIntentPDF').find('input[name="url"]').val(document.URL);
       
              
        
        $('input[id="firstname"], input[id="lastname"]').keydown(function (event) { 
            
            if( 
                    (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                    || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
                    || (event.keyCode == 186) // :
                    || (event.keyCode == 191) // /
                    || (event.keyCode == 190) // .
              ) {
                    event.preventDefault();     // Prevent character input
            }

        });
        

    }
  };

}(jQuery));