$(document).ready(function() {

 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

  	$("#item_material").change(function(){

  	 	var item_material = $("#item_material").val();
  	 	var urls = "/combo/catItem/"+item_material;
  	 	var urls2 = "/combo/catForm/"+item_material;
  	 	var urls3 = "/combo/valor/"+item_material;
  	 	var urls4 = "/combo/catFormFinal/"+item_material;

	  	$("#btnComposicao").html('<button type="button" id="composicao" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Exibir Composição</button>');

	  	jQuery.ajax({
	                  url: urls,
	                  method: 'get',
	                  //data: {
	                     // type: jQuery('#type').val(),
	                     // price: jQuery('#price').val()
	                 // },
	                  success: function(result){
	                  	$("#DivCategoria").html(result);
	                  	$(".select2").select2();
	                  }
	              	});

	  		  	jQuery.ajax({
	                  url: urls2,
	                  method: 'get',
	                  success: function(result){
	                  	$("#DivFormComplemento").html(result);
	                  	$(".select2").select2();
	                  }
	              	});

	  		  	jQuery.ajax({
	                  url: urls3,
	                  method: 'get',
	                  success: function(result){
	                	$("#DivValor").html(result);
	                  	$(".select2").select2();
	                  }
	              	});

	  		  	jQuery.ajax({
	                  url: urls4,
	                  method: 'get',
	                  success: function(result){
	                	$("#DivFormFinal").html(result);
	                  	$(".select2").select2();
	                  }
	              	});
	});

	$(document).on('change', '.valCheck', function(){

			//alert($("#checkAvariado").is(':checked'));
			//var check = $(this).attr("id"));

		if($(this).attr("id") == "checkAvariado" && $("#checkAvariado").is(':checked') == true	){
		 	$("#checkVal").prop('checked', false);
		}

		if($(this).attr("id") == "checkVal" && $("#checkVal").is(':checked') == true	){
		 	$("#checkAvariado").prop('checked', false);
		}

		// if( $(this).attr("id") == 'checkVal' ){

		//  	$("#checkAvariado").prop('checked', false);
		//}

		// if($("#checkAvariado").is(':checked') && ){

		//  	$("#checkVal").prop('checked', false);
		// }

		//  if($("#checkVal").is(':checked') ){

		//  	$("#checkAvariado").prop('checked', false);
		//  }



		var item_material = $("#item_material").val();
		var listaValor = $("#checkVal").is(':checked');

		var avariado = $("#checkAvariado").is(':checked');

		var urls = "/combo/catValVariado/"+item_material;

		jQuery.ajax({
	                  url: urls,
	                  method: 'get',
	                  data: {
	                    listaValor: $("#checkVal").is(':checked'),
	                    avariado: $("#checkAvariado").is(':checked')
	                	},
	                  success: function(result){
	                  	$("#DivValorInput").html(result);
	                  	$(".select2").select2();
	                  }
	              	});

  	});

  	$(document).on('click', '#composicao', function(){

		var item_material = $("#item_material").val();
		var urls = "/combo/composicao/"+item_material;

		jQuery.ajax({
              url: urls,
              method: 'get',
              success: function(result){
              	$("#divComposicao").html(result);
              	// $(".select2").select2();
              }
          	});

  	});



	// $(document).on('change', '#marca', function(){

	//    	var id_categoria = $("#id_categoria").val();
	//    	alert(id_categoria);
 	//  	var urls = "/combo/tamanho/"+id_categoria;
	//   	jQuery.ajax({
	//                   url: urls,
	//                   method: 'get',
	//                   success: function(result){
	//                   	$("#DivTamanho").html(result);
	//                   	$(".select2").select2();
	//                   }
	//               	});
 	//   });

	// $(document).on('change', '#tamanho', function(){

 //  	var id_categoria = $("#id_categoria").val();
 //  	alert(id_categoria);
	//  	var urls = "/combo/embalagem/"+id_categoria;
 //  	jQuery.ajax({
 //                  url: urls,
 //                  method: 'get',
 //                  success: function(result){
 //                  	$("#DivEmbalagem").html(result);
 //                  	$(".select2").select2();
 //                  }
 //              	});
 //    });




});
