$(document).ready(function() {
    $('#months').hide();
	 $('#year').hide();
     $('#frm').hide();
     $('#to').hide();

         $('#months1').hide();
     $('#year1').hide();

     $('#ex-drop').change(function () {
        if ($('#ex-drop option:selected').text() == "Experience"){
            $('#months').show();
			$('#year').show();
     $('#months1').show();
            $('#year1').show();
             $('#frm').show();
     $('#to').show();
        }
         else { 
              $('#months').hide();
	 $('#year').hide();
     $('#months1').hide();
     $('#year1').hide();
         $('#frm').hide();
     $('#to').hide();

     
         }
    });

});