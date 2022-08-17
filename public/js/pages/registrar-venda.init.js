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
    var id_item_material = parseInt($(".id_item_material").html());
    var id_venda = parseInt($(".idv").html());
    removeItem(id_item_material, id_venda);
  });


  $(document).on("click", "#btnAddItem", function () {
    console.log("Clicou em btnAddItem");
    $("#dialogBuscaItem").dialog("close")
    pesqItem($(this).val());
  });

  $("#cpf").change(function(){

    if($("#cpf").val()!=null && $("#cpf").val()!=''){
      $("#divAddItem").show();
      //$("#divVendaItens").show();
    }else{
      $("#divAddItem").hide();
    }
  });

  $(document).on("click", "#btnAddLista", function(){
    //   console.log("Clicou em btnAddLista");
      if($("#idItem").val() ==null){
        alert("Selecione um item");
        return;
      }else if ($("#qtd_item").val()<=0) {
        alert("Informe a quantidade");
        $("#qtd_item").focus();
        return;
      }

      showModal("loading", "", "", "", true, pBackdrop="static", pKeyboard=false);

      if ($("#id_venda").val()==null || $("#id_venda").val()=='') {

        // var id_pessoa = parseInt($(".id_pessoa").html());
        // var data_venda = $(".data_venda").html().replace("/", '-').replace("/", '-');
        // var id_usuario = parseInt($("#id_usuario").val());

        // jQuery.ajax({

        //   url: "/registrar-venda/setVenda/"+id_pessoa+"/"+data_venda+"/"+id_usuario+"",
        //   method: 'get',
        //   success: function(result){
        //     console.log("setVenda() ->", "Funcionou");
        //     $("#id_venda").val(result);
            adicionarItem();
        //   }
        // });

     }else{
       adicionarItem();
     }
  });

  $("#qtd_item").keyup(function(evt){
    fCalculaValor();
  });
});

function pesqItem(id_item) {
  showModal("loading");
  jQuery.ajax({
    url: "/registrar-venda/getItem/" +id_item,
    method: 'get',
    success: function (result) {
      console.log("pesqItem() ->", "Entrou");
      $("#DivConfirmaItem").html(result);
      $("#vlr_unit").val($("#vlrVenda").val());

      fCalculaValor();
    }
  });
  hideModal("loading");
}

function adicionarItem(){
  var id_item = parseInt($("#idItem").val());
  var id_venda = parseInt($(".idv").html());
  console.log("adicionaItem() ->", id_item, id_venda)
  // alert("teste");
  jQuery.ajax({
    url: "/registrar-venda/setItemLista/"+id_item+"/"+id_venda,
    method: 'get',
    success: function(result){
      $("#divListaCompras").html(result);
      hideModal("loading");
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

function removeItem(pIdItem, pIdVenda){
  console.log("removeItem",pIdVenda, pIdItem);
  showModal("loading");
  jQuery.ajax({
    url: "/registrar-venda/removeItemLista/"+pIdItem+"/"+pIdVenda+"",
    method: 'get',
    success: function(result){
      $("#divListaCompras").html(result);
      hideModal("loading");
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
