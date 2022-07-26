$(document).ready(function() {
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
	});

   	$(".classBtnAlterar").click(function(){
   		
   		$("#divFormAlterar").html('<img src="/images/loader.gif"  width="50px" />');
   		var idLocalizador =$(this).val();
   		
   		jQuery.ajax({
	                  url: "/localizador/alterar/"+idLocalizador,
	                  method: 'get',
	                  success: function(result){
	                  	$("#divFormAlterar").html(result);
	                  	$("#title-alterar").html("Alteração de Localizador");
	                  	
	                  	$(".select2").select2();
	                  }
	              	});
   	});

});