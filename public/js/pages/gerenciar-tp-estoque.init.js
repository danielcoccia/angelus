$(document).ready(function() {
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});

   	$(".classBtnAlterar").click(function(){

   		$("#divFormAlterar").html('<img src="/images/loader.gif"  width="50px" />');
   		var idTpEstoque = $(this).val();
   		jQuery.ajax({
	                  url: "/cad-tipo-estoque/alterar/"+idTpEstoque,
	                  method: 'get',
	                  success: function(result){
	                  	$("#divFormAlterar").html(result);
	                  	$("#title-alterar").html("Alteração Tipo Estoque");
	                  	$(".select2").select2();	                  	
	                  }
	              	});
   	});

});