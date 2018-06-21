
document.addEventListener('DOMContentLoaded', function(){

    var uploadvideobtn = document.getElementById("uploadvideobtn");

   uploadvideobtn.addEventListener("click", function(){
	    uploadvideobtn.style.display = 'none'
		 $('#uploadDiv').show();
		  $('#cancelvideobtn').show();
		 $('#uploadvideobtn').hide();
    });
	
	
});
document.addEventListener('DOMContentLoaded', function(){

    var uploadcancel = document.getElementById("cancelvideobtn");

   uploadcancel.addEventListener("click", function(){
	     
		 $('#uploadDiv').hide();
		 $('#uploadvideobtn').show();
		  $('#cancelvideobtn').hide();
		
    });
	
	
});

