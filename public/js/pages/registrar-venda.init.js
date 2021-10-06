
$(document).ready(function() {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});



   	$("#btnbuscaitem").click(function(){

   		$("#dialogBuscaItem").dialog({  
               width:700,               
               height:400

            });
 
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

   	$(document).on("click", "#btnAddItem", function(){
               
               var id_item = $(this).val();               
               jQuery.ajax({
	                  url: "/registrar-venda/getItem/"+id_item,
	                  method: 'get',
	                  success: function(result){
	                  	$("#DivConfirmaItem").html(result);
	                  	$("#dialogBuscaItem").dialog("close")
	                  	// $("#title-alterar").html("Buscar item");
	                  	// $(".select2").select2();	                  	
	                  }
	              	});
               
    });

    $(document).on("click", "#btnAddLista", function(){
               
        var id_item = $("#idItem").val();  
        alert(id_item);
    });



});