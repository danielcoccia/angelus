$(document).ready(function() {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});

  $(document).on("click", "#btncodigobarra", function () {
    var txt = '<label for="txtCodigoBarra">Código de Barra</label>';
    txt += '<input type="text" id="txtCodigoBarra" name="txtCodigoBarra">';
    txt += '<button id="btnPesqItem" type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>';
    showModal("divModal", txt);
    $("#btnPesqItem").off().click(function (e) {
      //hideModal();
      window.setTimeout(function () {
        if ($("#txtCodigoBarra").val().trim()) {
          pesqItem($("#txtCodigoBarra").val());
        } else {
          alert("Digite o código");
        }

      }, 100);

    });
    window.setTimeout(function () {
      $("#txtCodigoBarra").trigger("focus").off().keypress(function (e) {
        if (e.which == 13) {
          $("#btnPesqItem").trigger("click");
        }
      });

    }, 300);
  });



  $("#btnbuscaitem").click(function(){

    $("#dialogBuscaItem").dialog({
      width:700,
      height:400
    });
    $("#divBuscaritem").html('<img src="/images/loading02.gif" width="50px"><span>&nbsp;Carregando...</span>');

  $("#divFormAlterar").html('<img src="/images/loader.gif"  width="50px" />');
    var idPagamento = $(this).val();
    jQuery.ajax({
      url: "/registrar-venda/buscaritem/",
      method: 'get',
      success: function(result){
      	$("#divBuscaritem").html(result);
      	$("#title-alterar").html("Buscar item");
      	$(".select2").select2();

        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
          lengthChange: false,
          buttons: ['copy', 'excel', 'pdf', 'colvis']
        });


      }
    });



 	});






  $(document).on("click", ".btnRemoveItem", function(){
    removeItem($("#id_venda").val(), $(this).val());
  });


  $(document).on("click", "#btnAddItem", function () {
    $("#dialogBuscaItem").dialog("close")
    pesqItem($(this).val());
    /*
    var id_item = $(this).val();
    jQuery.ajax({
      url: "/registrar-venda/getItem/"+id_item,
      method: 'get',
      success: function(result){
      	$("#DivConfirmaItem").html(result);
        $("#vlr_unit").val($("#vlrVenda").val());
      	$("#dialogBuscaItem").dialog("close")
        //$("#divVendaItens").show();
        //$("#divVendaBotoes").show();

        fCalculaValor();
      	// $("#title-alterar").html("Buscar item");
      	// $(".select2").select2();
      }
    });
    */
  });




  $("#cpf").change(function(){

    if($("#cpf").val()!=null && $("#cpf").val()!=''){
      $("#divAddItem").show();
      //$("#divVendaItens").show();
    }else{
      $("#divAddItem").hide();
    }

  });


  function pesqItem(id_item) {

    showModal();
    jQuery.ajax({
      url: "/registrar-venda/getItem/" +id_item,
      method: 'get',
      success: function (result) {
        hideModal();
        $("#DivConfirmaItem").html(result);
        $("#vlr_unit").val($("#vlrVenda").val());
        //$("#dialogBuscaItem").dialog("close")
        //$("#divVendaItens").show();
        //$("#divVendaBotoes").show();

        fCalculaValor();
        // $("#title-alterar").html("Buscar item");
        // $(".select2").select2();
      }
    });
  }



  $(document).on("click", "#btnAddLista", function(){

      if($("#idItem").val() ==null){
        alert("Selecione um item");
        return;
      }else if ($("#qtd_item").val()<=0) {
        alert("Informe a quantidade");
        $("#qtd_item").focus();
        return;
      }

      showModal("divModal", "", "", "", true, pBackdrop="static", pKeyboard=false);




      if ($("#id_venda").val()==null || $("#id_venda").val()=='') {



        var id_pessoa = $("#cpf").val();
        var data_venda = $("#data_venda").val();
        var id_usuario = $("#id_usuario").val();

        jQuery.ajax({
          url: "/registrar-venda/setVenda/"+id_pessoa+"/"+data_venda+"/"+id_usuario+"",
          method: 'get',
          success: function(result){
            $("#id_venda").val(result);
            adicionarItem();
            //$("#cpf").val(result);
            // var html = $("#divVenda").html(result);
            // $("#divVenda").html(result);

            // $("#dialogBuscaItem").dialog("close")
            // $("#title-alterar").html("Buscar item");
            // $(".select2").select2();

          }
        });

        }else {

       adicionarItem();

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
    });

  $("#qtd_item").keyup(function(evt){
    fCalculaValor();
    });
});






function adicionarItem(){
  var id_item = $("#idItem").val();
  var id_venda = $("#id_venda").val();


  jQuery.ajax({
    url: "/registrar-venda/setItemLista/"+id_item+"/"+id_venda,
    method: 'get',
    success: function(result){
      $("#divListaCompras").html(result);
      hideModal();
      $("#DivConfirmaItem").html("");
      $(document).on("click", "#btnCancVenda", function(){
        if ($("#id_venda").val()){
          cancelarVenda($("#id_venda").val());
        }
      });
      $(document).on("click", "#btnConcVenda", function(){

        if ($("#id_venda").val()){
          concluirVenda($("#id_venda").val(), $("#vlrTotalVenda").text());
        }
      });


      // $("#dialogBuscaItem").dialog("close")
      // $("#title-alterar").html("Buscar item");
      // $(".select2").select2();
    }
  });
}



function fCalculaValor(){
  if ($("#qtd_item").val()>0 && $("#vlr_unit").val()>0){
    $("#vlr_total").val($("#qtd_item").val()*$("#vlr_unit").val());
  }else{
    $("#vlr_total").val("");
  }
  console.log("Calcula valor....");
}




function removeItem(pIdVenda, pIdItem){
  console.log("removeItem",pIdVenda, pIdItem);
  showModal();
  jQuery.ajax({
    url: "/registrar-venda/removeItemLista/"+pIdItem+"/"+pIdVenda+"",
    method: 'get',
    success: function(result){
      $("#divListaCompras").html(result);
      hideModal();
      /*
      $(document).on("click", "#btnCancVenda", function(){
        if ($("#id_venda").val()){
          cancelarVenda($("#id_venda").val());
        }
      });
      */

    }
  });
}

function cancelarVenda(pIdVenda){
  console.log("cancelarVenda",pIdVenda);
  showModal();
  jQuery.ajax({
    url: "/registrar-venda/cancelarVenda/"+pIdVenda+"",
    method: 'get',
    success: function(result){
      $("#divListaCompras").html(result);
      $("#id_venda").val("");
      $("#cpf").val(null).trigger('change');
      //$("#divVendaItens").hide();
      //$("#divVendaBotoes").hide();
      hideModal();
    }
  });
}



function concluirVenda(pIdVenda, pVlrTotal){
  console.log("concluirVenda",pIdVenda, pVlrTotal);
  showModal();
  jQuery.ajax({
    url: "/registrar-venda/concluirVenda/"+pIdVenda+"/"+pVlrTotal+"",
    method: 'get',
    success: function(result){
      $("#divListaCompras").html(result);
      $("#id_venda").val("");
      $("#cpf").val(null).trigger('change');
      //$("#divVendaItens").hide();
      //$("#divVendaBotoes").hide();
      hideModal();
    }
  });
}






function showModal(pId="divModal", pMsg="", pTitle="", pButtons="", pShowX=true, pBackdrop="static", pKeyboard=false){
  var lOptions={
      backdrop: pBackdrop,
      keyboard: true,
      show: true
  }
  $("#" + pId + " .modal-title").html(pTitle);
 if (pMsg) {
     $("#" + pId + " .modal-body").html(pMsg);
 } else {
   $("#" + pId + " .modal-body").html('<img src="/images/loading02.gif" width="50px"><span>&nbsp;Carregando...</span>');
 }
 if (pButtons) {
    $("#" + pId + " .modal-footer").html(pButtons);
 }else{
    $("#" + pId + " .modal-footer").html("");
 }
 if (pShowX){
    $("#"+pId+" button.close").css("display", "inherit");
 }else{
      $("#"+pId+" button.close").css("display", "none");
  }
  //console.log(lOptions);
  $("#" + pId).modal(lOptions);
  //$("#" + pId).modal();
}

function hideModal(pId="divModal"){
 $("#"+pId).modal('hide');
}
