$(document).ready(function() {
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});

   	$(".classBtnAlterar").click(function(){
   	
   		var idLocalizador =$(this).val();  	

   		jQuery.ajax({
	                  url: "/localizador/alterar/"+idLocalizador,
	                  method: 'get',
	                  success: function(result){
	                  	$("#divFormAlterar").html(result);
	                  	$(".select2").select2();
	                  }
	              	});
   	});

});