$(document).ready(function() {
    $('#months').hide();
	 $('#year').hide();

     $('#ex-drop').change(function () {
        if ($('#ex-drop option:selected').text() == "Experience"){
            $('#months').show();
			$('#year').show();
        }
         else { 
              $('#months').hide();
	 $('#year').hide();
         }
    });
   
    
 
});