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


 

  $("#cpf").change(function(){
    
    if($("#cpf").val()!=null && $("#cpf").val()!=''){
      $("#divAddItem").show();  
    }else{
      $("#divAddItem").hide();
    }

  });
    
  

  $(document).on("click", "#btnAddLista", function(){     

      if ($("#id_venda").val()==null || $("#id_venda").val()=='') {
         
         var id_pessoa = $("#cpf").val();
         var data_venda = $("#data_venda").val();
         var id_usuario = $("#id_usuario").val();
         
      jQuery.ajax({
        url: "/registrar-venda/setVenda/"+id_pessoa+"/"+data_venda+"/"+id_usuario+"",
        method: 'get',
        success: function(result){
           $("#id_venda").val(result);
           //$("#cpf").val(result);           
           // var html = $("#divVenda").html(result);
           // $("#divVenda").html(result);
           
          // $("#dialogBuscaItem").dialog("close")
          // $("#title-alterar").html("Buscar item");
          // $(".select2").select2();
        }
      });
    
     }


    // if ($("#id_venda").val()==null) {

      // jQuery.ajax({
      //   url: "/registrar-venda-lista/setItemLista/"+id_item,
      //   method: 'get',
      //   success: function(result){
      //     $("#divListaCompras").html(result);
      //     // $("#dialogBuscaItem").dialog("close")
      //     // $("#title-alterar").html("Buscar item");
      //     // $(".select2").select2();
      //   }
      // });


    
    // }
      
    
      if($("#idItem").val() ==null){
        alert("Selecione um item");
        
      }else{
        var id_item = $("#idItem").val();
        var id_venda = $("#id_venda").val();

        // alert("teste");
        jQuery.ajax({
          url: "/registrar-venda/setItemLista/"+id_item+"/"+id_venda,
          method: 'get',
          success: function(result){
            $("#divListaCompras").html(result);
            // $("#dialogBuscaItem").dialog("close")
            // $("#title-alterar").html("Buscar item");
            // $(".select2").select2();
          }
        });
      }
  });


});
