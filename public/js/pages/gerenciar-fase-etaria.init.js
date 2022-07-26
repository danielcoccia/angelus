$(document).ready(function() {
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});

   	$(".classBtnAlterar").click(function(){

   		$("#divFormAlterar").html('<img src="/images/loader.gif"  width="50px" />');
   		var idFaseEtaria = $(this).val();
   		jQuery.ajax({
	                  url: "/fase-etaria/alterar/"+idFaseEtaria,
	                  method: 'get',
	                  success: function(result){
	                  	$("#divFormAlterar").html(result);
	                  	$("#title-alterar").html("Alteração de Depostio");
	                  	$(".select2").select2();	                  	
	                  }
	              	});
   	});

});