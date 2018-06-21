$(document).ready(function() {
    $('#months').hide();
    // $('#months1').hide();
	 $('#year').hide();
// $('#year1').hide();

     $('#ex-dropp').change(function () {
        if ($('#ex-drop option:selected').text() == "Experience"){
            $('#months').show();
           // $('#months1').show();
			$('#year').show();
                        // $('#year1').show();
        }
         else { 
              $('#months').hide();
              //$('#months1').hide();
	     $('#year').hide();
            // $('#year1').hide();
         }
    });
});