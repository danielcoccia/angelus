$(document).ready(function() {

 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

  	$("#categoria_item").change(function(){

  	 	var categoria_item = $("#categoria_item").val();
  	 	var urls = "/combo/catItem/"+categoria_item;  	 	
	  	jQuery.ajax({
	                  url: urls,
	                  method: 'get',
	                  //data: {                     
	                     // type: jQuery('#type').val(),
	                     // price: jQuery('#price').val()
	                 // },
	                  success: function(result){
	                  //	$("#divComboMarca").html("");
	                  //	$("#labelMArca").html("Marca");
	                  //	$("#divComboMarca").html(result);
	                   	
	                  	$("#DivCategoria").html(result);
	                  	$(".select2").select2();
	                  }

	              	});  
	});


});