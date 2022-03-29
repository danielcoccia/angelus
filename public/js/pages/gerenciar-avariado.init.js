$(document).ready(function() {

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});

   	$(".classBtnAlterar").click(function(){

   		$("#divFormAlterar").html('<img src="/images/loader.gif"  width="50px" />');
   		var idAvariado = $(this).val();
   		jQuery.ajax({
	                  url: "/cad-valor-avariado/alterar/"+idAvariado,
	                  method: 'get',
	                  success: function(result){
	                  	$("#divFormAlterar").html(result);
	                  	$("#title-alterar").html("Alterar valor avariado");
	                  	$(".select2").select2();
	                  }
	              	});
   	});

});
