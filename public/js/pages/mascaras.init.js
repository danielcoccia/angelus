jQuery(document).ready(function(){

$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

$('.mascara_cpf').mask('000.000.000-00');

$('.mascara_celular').mask('(00) 00000-0000');

$('.mascara_cnpj').mask('00.000.000/0000-00');

});