jQuery(document).ready(function(){


  $('#cep').mask('00000-000');

  $("#cep").blur(function(){    

    var cep = $(this).val().replace(/[^0-9]/, '');
    //alert(cep);
     if(cep.length ==8 ){

      var url = 'https://viacep.com.br/ws/'+cep+'/json/';

      $.ajax({
                    url: url,
                    dataType: 'jsonp',
                    crossDomain: true,
                    contentType: "application/json",
          success : function(json){

            if(json.logradouro != null){
              $("#cep").val(json.cep);
              $("#logradouro").val(json.logradouro);
              $("#complemento").val(json.complemento);
              $("#bairro").val(json.bairro);
              $("#cidade").val(json.localidade);
              $("#estado").val(json.uf);
              $("#ibge").val(json.ibge);
              $("#gia").val(json.gia);
              $("#ddd").val(json.ddd);              
              $("#siafi").val(json.siafi);
            }else{
              alert('Cep não encontrado');
              $("#cep").val('');
              $("#logradouro").val('');
              $("#complemento").val('');
              $("#bairro").val('');
              $("#cidade").val('');
              $("#estado").val('');
              $("#ibge").val('');
              $("#gia").val('');
              $("#ddd").val('');
              $("#siafi").val('');
            }
          }
      });
    }else{
      alert('cep invalido');
              $("#cep").val('');
              $("#logradouro").val('');
              $("#complemento").val('');
              $("#bairro").val('');
              $("#cidade").val('');
              $("#estado").val('');
              $("#ibge").val('');
              $("#gia").val('');
              $("#ddd").val('');
              $("#siafi").val('');
    }

  }); 


});