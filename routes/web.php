<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/logout', 'LexaAdmin@logout');

// Render perticular view file by foldername and filename and all passed in only one controller at a time
//Route::get('{folder}/{file}', 'LexaAdmin@index');

// when render first time project redirect
// Route::get('/home', function () {
//     return redirect('dashboard/index')->middleware('validaUsuario');
// });

// Route::get('/keep-live', "LexaAdmin@live");

// when render first time project redirect
// Route::get('/', function () {
//     return redirect('login');
// });

Route::get('/', 'LoginController@index');
Route::post('/login/valida', 'LoginController@valida')->name('home.post');
Route::get('/email/remessa-email', 'RecuperaSenhaController@index');
Route::post('/email/remessa-email', 'RecuperaSenhaController@validar');

//Route::view('/dashboard/index' , 'dashboard/index')->middleware('validaUsuario');

Route::name('estoque')->middleware('validaUsuario')->group(function () {
  Route::get('/cad-tipo-estoque', 'TipoEstoqueController@index');
  Route::post('/cad-tipo-estoque/inserir', 'TipoEstoqueController@store');
  Route::get('/cad-tipo-estoque/excluir/{id}', 'TipoEstoqueController@destroy');
  Route::get('/cad-tipo-estoque/alterar/{id}', 'TipoEstoqueController@edit');
  Route::put('/cad-tipo-estoque/atualizar/{id}', 'TipoEstoqueController@update');
});

Route::name('sit-doacao')->middleware('validaUsuario')->group(function () {
  Route::get('/cad-sit-doacao', 'SitDoacaoController@index');
  Route::post('/cad-sit-doacao/inserir', 'SitDoacaoController@store');
  Route::get('/cad-sit-doacao/excluir/{id}', 'SitDoacaoController@destroy');
  Route::get('/cad-sit-doacao/alterar/{id}', 'SitDoacaoController@edit');
  Route::put('/cad-sit-doacao/atualizar/{id}', 'SitDoacaoController@update');
});

Route::get('/unidade-medida', 'UnidadeMedidaController@index')->middleware('validaUsuario');
Route::post('/unidade-medida/inserir', 'UnidadeMedidaController@store')->middleware('validaUsuario');
Route::get('/unidade-medida/excluir/{id}', 'UnidadeMedidaController@destroy')->middleware('validaUsuario');
Route::get('/unidade-medida/alterar/{id}', 'UnidadeMedidaController@edit')->middleware('validaUsuario');
Route::put('/unidade-medida/atualizar/{id}', 'UnidadeMedidaController@update')->middleware('validaUsuario');


Route::get('/gerenciar-pessoa', 'PessoaController@index')->middleware('validaUsuario')->name('listapessoa.index');
Route::get('cad-pessoa', 'PessoaController@create')->middleware('validaUsuario');
Route::post('cad-pessoa/inserir', 'PessoaController@store')->middleware('validaUsuario')->name('inserepessoa.index');
Route::get('/filtrar-pessoa', 'PessoaController@show')->middleware('validaUsuario')->name('filtrarpessoa.show');
Route::get('pessoa/alterar/{id}', 'PessoaController@edit')->middleware('validaUsuario');
Route::put('pessoa-atualizar/{id}', 'PessoaController@update')->middleware('validaUsuario');
Route::get('/pessoa/excluir/{id}', 'PessoaController@destroy')->middleware('validaUsuario');
Route::get('/registrar-pessoa', 'PessoaController@search')->middleware('validaUsuario');

Route::name('entidade')->middleware('validaUsuario')->group(function () {
  Route::get('cad-entidade', 'EntidadeController@create');
  Route::post('cad-entidade/inserir', 'EntidadeController@store');
  Route::get('gerenciar-entidade', 'EntidadeController@index');
  Route::post('pesquisar-entidade', 'EntidadeController@show');
  Route::get('entidade/alterar/{id}', 'EntidadeController@edit');
  Route::put('entidade-atualizar/{id}', 'EntidadeController@update');
  Route::get('/entidade/excluir/{id}', 'EntidadeController@destroy');
});

Route::name('usuario')->middleware('validaUsuario')->group(function () {
  Route::get('gerenciar-usuario', 'UsuarioController@index');
  Route::get('usuario-incluir', 'UsuarioController@create');
  Route::get('cadastrar-usuarios/configurar/{id}', 'UsuarioController@configurarUsuario');
  Route::post('/cad-usuario/inserir', 'UsuarioController@store');
  Route::get('/usuario/excluir/{id}', 'UsuarioController@destroy');
  Route::get('/usuario/alterar/{id}', 'UsuarioController@edit');
  Route::put('usuario-atualizar/{id}', 'UsuarioController@update');
  Route::get('/usuario/gerar-Senha/{id}', 'UsuarioController@gerarSenha');
  Route::get('/usuario/alterar-senha', 'UsuarioController@alteraSenha');
  Route::post('/usuario/gravaSenha', 'UsuarioController@gravaSenha');

});

Route::get('gerenciar-item-catalogo', 'ItemCatalogoController@index')->middleware('validaUsuario');
Route::get('item-catalogo-incluir', 'ItemCatalogoController@create')->middleware('validaUsuario');
Route::post('cad-item-material/inserir', 'ItemCatalogoController@store')->middleware('validaUsuario');
Route::get('/item-catalogo/alterar/{id}', 'ItemCatalogoController@edit')->middleware('validaUsuario');
Route::put('item-catalogo-atualizar/{id}', 'ItemCatalogoController@update')->middleware('validaUsuario');
Route::get('/item-catalogo/excluir/{id}', 'ItemCatalogoController@destroy')->middleware('validaUsuario');
Route::post('/cad-item-material/inserir', 'ItemCatalogoController@store')->middleware('validaUsuario');

Route::get('gerenciar-composicao', 'ComposicaoItemController@index')->middleware('validaUsuario');
Route::get('item-composicao/incluir/{id}', 'ComposicaoItemController@create')->middleware('validaUsuario');
Route::post('item-composicao/inserir', 'ComposicaoItemController@store')->middleware('validaUsuario');
Route::get('/item-composicao/excluir/{id}/{idComposicao}', 'ComposicaoItemController@destroy')->middleware('validaUsuario');

Route::get('/marca', 'MarcaController@index')->middleware('validaUsuario');
Route::post('/marca/inserir', 'MarcaController@store')->middleware('validaUsuario');
Route::get('/marca/excluir/{id}', 'MarcaController@destroy')->middleware('validaUsuario');
Route::get('/marca/alterar/{id}', 'MarcaController@edit')->middleware('validaUsuario');
Route::put('/marca/atualizar/{id}', 'MarcaController@update')->middleware('validaUsuario');

Route::get('/tamanho', 'TamanhoController@index')->middleware('validaUsuario');
Route::post('/tamanho/inserir', 'TamanhoController@store')->middleware('validaUsuario');
Route::get('/tamanho/excluir/{id}', 'TamanhoController@destroy')->middleware('validaUsuario');
Route::get('/tamanho/alterar/{id}', 'TamanhoController@edit')->middleware('validaUsuario');
Route::put('/tamanho/atualizar/{id}', 'TamanhoController@update')->middleware('validaUsuario');

Route::get('/cor', 'CorController@index')->middleware('validaUsuario');
Route::post('/cor/inserir', 'CorController@store')->middleware('validaUsuario');
Route::get('/cor/excluir/{id}', 'CorController@destroy')->middleware('validaUsuario');
Route::get('/cor/alterar/{id}', 'CorController@edit')->middleware('validaUsuario');
Route::put('/cor/atualizar/{id}', 'CorController@update')->middleware('validaUsuario');

Route::get('/cad-cat-material', 'CatMaterialController@index')->middleware('validaUsuario')->name('cadcat.index');
Route::post('/cad-cat-material/inserir', 'CatMaterialController@store')->middleware('validaUsuario');
Route::get('/cad-cat-material/excluir/{id}', 'CatMaterialController@destroy')->middleware('validaUsuario');
Route::get('/cad-cat-material/alterar/{id}', 'CatMaterialController@edit')->middleware('validaUsuario');
Route::put('/cad-cat-material/atualizar/{id}', 'CatMaterialController@update')->middleware('validaUsuario');

Route::get('/cad-embalagem', 'EmbalagemController@index')->middleware('validaUsuario');
Route::post('/cad-embalagem/inserir', 'EmbalagemController@store')->middleware('validaUsuario');
Route::get('/cad-embalagem/excluir/{id}', 'EmbalagemController@destroy')->middleware('validaUsuario');
Route::get('/cad-embalagem/alterar/{id}', 'EmbalagemController@edit')->middleware('validaUsuario');
Route::put('/cad-embalagem/atualizar/{id}', 'EmbalagemController@update')->middleware('validaUsuario');

Route::get('/cad-genero', 'GeneroController@index')->middleware('validaUsuario');
Route::post('/cad-genero/inserir', 'GeneroController@store')->middleware('validaUsuario');
Route::get('/cad-genero/excluir/{id}', 'GeneroController@destroy')->middleware('validaUsuario');
Route::get('/cad-genero/alterar/{id}', 'GeneroController@edit')->middleware('validaUsuario');
Route::put('/cad-genero/atualizar/{id}', 'GeneroController@update')->middleware('validaUsuario');

Route::get('/cad-tipo-material', 'TipoMaterialController@index')->middleware('validaUsuario');
Route::post('/cad-tipo-material/inserir', 'TipoMaterialController@store')->middleware('validaUsuario');
Route::get('/cad-tipo-material/excluir/{id}', 'TipoMaterialController@destroy')->middleware('validaUsuario');
Route::get('/cad-tipo-material/alterar/{id}', 'TipoMaterialController@edit')->middleware('validaUsuario');
Route::put('/cad-tipo-material/atualizar/{id}', 'TipoMaterialController@update')->middleware('validaUsuario');



Route::name('localizador')->middleware('validaUsuario')->group(function () {
  Route::get('/localizador', 'LocalizadorController@index');
  Route::post('/localizador/inserir', 'LocalizadorController@store');
  Route::get('/localizador/excluir/{id}', 'LocalizadorController@destroy');
  Route::get('/localizador/alterar/{id}', 'LocalizadorController@edit');
  Route::put('/localizador/atualizar/{id}', 'LocalizadorController@update');
});

Route::get('/fase-etaria', 'FaseEtariaController@index')->middleware('validaUsuario');
Route::post('/fase-etaria/inserir', 'FaseEtariaController@store')->middleware('validaUsuario');
Route::get('/fase-etaria/excluir/{id}', 'FaseEtariaController@destroy')->middleware('validaUsuario');
Route::get('/fase-etaria/alterar/{id}', 'FaseEtariaController@edit')->middleware('validaUsuario');
Route::put('/fase-etaria/atualizar/{id}', 'FaseEtariaController@edit')->middleware('validaUsuario');

Route::name('deposito')->middleware('validaUsuario')->group(function () {
  Route::get('/deposito', 'DepositoController@index');
  Route::post('/deposito/inserir', 'DepositoController@store');
  Route::get('/deposito/excluir/{id}', 'DepositoController@destroy');
  Route::get('/deposito/alterar/{id}', 'DepositoController@edit');
  Route::put('/deposito/atualizar/{id}', 'DepositoController@update');
});

Route::get('/combo/catItem/{id}', 'CadastroInicialController@getCategoria')->middleware('validaUsuario');
Route::get('/combo/catForm/{id}', 'CadastroInicialController@getFormCadastro')->middleware('validaUsuario');
Route::get('/combo/valor/{id}', 'CadastroInicialController@getValor')->middleware('validaUsuario');
Route::get('/combo/catFormFinal/{id}', 'CadastroInicialController@getFormCadastroFinal')->middleware('validaUsuario');
Route::get('/combo/catValVariado/{id}', 'CadastroInicialController@getValorVariado')->middleware('validaUsuario');
Route::get('/combo/composicao/{id}', 'CadastroInicialController@getComposicao')->middleware('validaUsuario');
Route::post('/cad-inicial-material/inserir', 'CadastroInicialController@store')->middleware('validaUsuario');
Route::get('/usuario-logado', 'CadastroInicialController@search');

Route::get('/gerenciar-cadastro-inicial', 'CadastroInicialController@index')->name('cadastroinicial.index');
Route::get('/gerenciar-cadastro-inicial/incluir', 'CadastroInicialController@create')->middleware('validaUsuario');
Route::get('/gerenciar-cadastro-inicial/excluir/{id}', 'CadastroInicialController@destroy')->middleware('validaUsuario');
Route::get('/editar-cadastro-inicial/{id}', 'CadastroInicialController@formEditar')->middleware('validaUsuario');
Route::put('/gerenciar-cadastro-inicial/alterar/{id}', 'CadastroInicialController@update')->middleware('validaUsuario');

Route::get('/combo/tamanho/{id}', 'CadastroInicialController@getTamanho')->middleware('validaUsuario');
Route::get('/combo/embalagem/{id}', 'CadastroInicialController@getEmbalagem')->middleware('validaUsuario');



Route::get('/barcode', 'BarcodeController@index')->middleware('validaUsuario');
Route::get('/item_material/{id}', 'BarcodeController@show')->middleware('validaUsuario');


Route::name('vendas')->middleware('validaUsuario')->group(function () {
  Route::any('/gerenciar-vendas', 'GerenciarvendasController@index')->name('.index');
  Route::get('/gerenciar-vendas/excluir/{id}', 'GerenciarvendasController@delete');
  Route::get('/gerenciar-vendas/finalizar/{id}', 'GerenciarvendasController@finalizar')->name('finalizarvenda.update');
  Route::get('/gerenciar-vendas/demonstrativo/{id}', 'GerenciarvendasController@update');
  Route::get('/gerenciar-vendas/demonstrativo/{id}', 'GerenciarvendasController@imprimir');



  Route::get('/registrar-venda-editar/{id_venda}', 'RegistrarVendaController@edit');
  Route::get('/registrar-venda-fimedicao/{id}', 'RegistrarVendaController@fimEdicao');
  Route::get('/registrar-venda', 'RegistrarVendaController@index');
  Route::get('/registrar-venda/buscaritem', 'RegistrarVendaController@buscaritem');
  Route::get('/registrar-venda/getItem/{id}', 'RegistrarVendaController@getItem');
  Route::get('/registrar-venda/setVenda/{id_pessoa}/{data_venda}/{id_usuario}', 'RegistrarVendaController@setVenda');
  Route::get('/registrar-venda/setItemLista/{id_item}/{id_venda}', 'RegistrarVendaController@setItemLista');
  Route::get('/registrar-venda/removeItemLista/{id_item}/{id_venda}', 'RegistrarVendaController@removeItemLista');
  Route::get('/registrar-venda/cancelarVenda/{id_venda}', 'RegistrarVendaController@cancelarVenda');
  Route::get('/registrar-venda/concluirVenda/{id_venda}/{vlr_total}', 'RegistrarVendaController@concluirVenda');

  Route::get('/cad-sit-venda', 'SituacaovendaController@index');
});

Route::name('pagamentos')->middleware('validaUsuario')->group(function (){
  Route::get('/gerenciar-pagamentos/{id}', 'GerenciarpagamentoController@show')->name('pagamento.show');
  Route::post('/gerenciar-pagamentos/{id}', 'GerenciarpagamentoController@inserir')->middleware('validaUsuario');
  Route::delete('/gerenciar-pagamentos/{id}', 'GerenciarpagamentoController@destroy')->middleware('validaUsuario');
  Route::get('/alerta-pagamento', 'GerenciarpagamentoController@inserir');

  Route::get('/cad-pagamento', 'TipoPagamentoController@index')->middleware('validaUsuario');
  Route::post('/cad-pagamento/inserir', 'TipoPagamentoController@store')->middleware('validaUsuario');
  Route::get('/cad-pagamento/excluir/{id}', 'TipoPagamentoController@destroy')->middleware('validaUsuario');
  Route::get('/cad-pagamento/alterar/{id}', 'TipoPagamentoController@edit')->middleware('validaUsuario');
  Route::put('/cad-pagamento/atualizar/{id}', 'TipoPagamentoController@update')->middleware('validaUsuario');

  Route::get('/demonstrativo/{id}', 'GerenciardemonstrativoController@index')->middleware('validaUsuario');
  Route::get('/relatorio-vendas', 'RelatoriosController@index')->middleware('validaUsuario');
  Route::get('/relatorio-entrada', 'RelatoriosController@entrada')->middleware('validaUsuario');
  Route::get('/inventarios', 'GerenciarInventariosController@index')->middleware('validaUsuario');
});

Route::name('valor-avariado')->middleware('validaUsuario')->group(function () {
  Route::get('/cad-valor-avariado', 'RegistrarAvariaController@index')->middleware('validaUsuario')->name('cadavaria.index');
  Route::post('/cad-valor-avariado/inserir', 'RegistrarAvariaController@insert')->middleware('validaUsuario');
  Route::get('/cad-valor-avariado/excluir/{id}', 'RegistrarAvariaController@destroy')->middleware('validaUsuario');
  Route::get('/cad-valor-avariado/alterar/{id}', 'RegistrarAvariaController@edit')->middleware('validaUsuario');
  Route::any('/alterar-valor-avariado/atualizar/{id}', 'RegistrarAvariaController@update')->middleware('validaUsuario');
});

Route::name('descontos')->middleware('validaUsuario')->group(function () {
  Route::get('/gerenciar-desconto', 'DescontoController@index')->middleware('validaUsuario');
  Route::get('/criar-desconto', 'DescontoController@create')->middleware('validaUsuario');
  Route::post('/incluir-desconto', 'DescontoController@store')->middleware('validaUsuario');
  Route::get('/desconto-alterar/{id}', 'DescontoController@edit')->middleware('validaUsuario');
  Route::post('/modifica-desconto/{id}', 'DescontoController@update')->middleware('validaUsuario');
  Route::get('/desconto/excluir/{id}', 'DescontoController@destroy')->middleware('validaUsuario');
  Route::get('/desconto/ativar/{id}', 'DescontoController@active')->middleware('validaUsuario');
  Route::get('/desconto/inativar/{id}', 'DescontoController@inactive')->middleware('validaUsuario');

});

Route::get('/calculos/Calculadora/{id}', 'CalculadoraController@calcular');



