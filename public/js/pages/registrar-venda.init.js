$(document).ready(function() {
	
 
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});

   	$("#btnbuscaitem").click(function(){
 
   		$("#divFormAlterar").html('<img src="/images/loader.gif"  width="50px" />');
   		var idPagamento = $(this).val();
   		jQuery.ajax({
	                  url: "/registrar-venda/buscaritem/",
	                  method: 'get',
	                  success: function(result){
	                  	$("#divBuscaritem").html(result);
	                  	$("#title-alterar").html("Buscar item");
	                  	$(".select2").select2();	                  	
	                  }
	              	});
   	});

});