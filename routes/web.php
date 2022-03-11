<?php

use App\Http\Controllers\GerenciarVendasController;
use Illuminate\Support\Facades\Route;


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
Route::post('/login/valida', 'LoginController@valida');

Route::get('/cad-cat-material', 'CatMaterialController@index')->middleware('validaUsuario');
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
Route::put('/cad-genero/atualizar/{id}','GeneroController@update')->middleware('validaUsuario');

Route::get('/cad-tipo-estoque', 'TipoEstoqueController@index')->middleware('validaUsuario');
Route::post('/cad-tipo-estoque/inserir', 'TipoEstoqueController@store')->middleware('validaUsuario');
Route::get('/cad-tipo-estoque/excluir/{id}', 'TipoEstoqueController@destroy')->middleware('validaUsuario');
Route::get('/cad-tipo-estoque/alterar/{id}', 'TipoEstoqueController@edit')->middleware('validaUsuario');
Route::put('/cad-tipo-estoque/atualizar/{id}', 'TipoEstoqueController@update')->middleware('validaUsuario');

Route::get('/cad-pagamento', 'TipoPagamentoController@index')->middleware('validaUsuario');
Route::post('/cad-pagamento/inserir', 'TipoPagamentoController@store')->middleware('validaUsuario');
Route::get('/cad-pagamento/excluir/{id}', 'TipoPagamentoController@destroy')->middleware('validaUsuario');
Route::get('/cad-pagamento/alterar/{id}', 'TipoPagamentoController@edit')->middleware('validaUsuario');
Route::put('/cad-pagamento/atualizar/{id}', 'TipoPagamentoController@update')->middleware('validaUsuario');

Route::get('/cad-sit-doacao', 'SitDoacaoController@index')->middleware('validaUsuario');
Route::post('/cad-sit-doacao/inserir', 'SitDoacaoController@store')->middleware('validaUsuario');
Route::get('/cad-sit-doacao/excluir/{id}', 'SitDoacaoController@destroy')->middleware('validaUsuario');
Route::get('/cad-sit-doacao/alterar/{id}', 'SitDoacaoController@edit')->middleware('validaUsuario');
Route::put('/cad-sit-doacao/atualizar/{id}', 'SitDoacaoController@update')->middleware('validaUsuario');

Route::get('/unidade-medida', 'UnidadeMedidaController@index')->middleware('validaUsuario');
Route::post('/unidade-medida/inserir', 'UnidadeMedidaController@store')->middleware('validaUsuario');
Route::get('/unidade-medida/excluir/{id}', 'UnidadeMedidaController@destroy')->middleware('validaUsuario');
Route::get('/unidade-medida/alterar/{id}', 'UnidadeMedidaController@edit')->middleware('validaUsuario');
Route::put('/unidade-medida/atualizar/{id}', 'UnidadeMedidaController@update')->middleware('validaUsuario');


Route::get('/gerenciar-pessoa', 'PessoaController@index')->middleware('validaUsuario');
Route::get('cad-pessoa', 'PessoaController@create')->middleware('validaUsuario');
Route::post('cad-pessoa/inserir', 'PessoaController@store')->middleware('validaUsuario');
Route::get('/gerenciar-pessoa', 'PessoaController@show')->middleware('validaUsuario');
Route::get('pessoa/alterar/{id}', 'PessoaController@edit')->middleware('validaUsuario');
Route::put('pessoa-atualizar/{id}', 'PessoaController@update')->middleware('validaUsuario');
Route::get('/pessoa/excluir/{id}', 'PessoaController@destroy')->middleware('validaUsuario');
Route::get('/registrar-pessoa', 'PessoaController@search')->middleware('validaUsuario');

Route::get('cad-entidade', 'EntidadeController@create')->middleware('validaUsuario');
Route::post('cad-entidade/inserir', 'EntidadeController@store')->middleware('validaUsuario');
Route::get('gerenciar-entidade', 'EntidadeController@index')->middleware('validaUsuario');
Route::post('pesquisar-entidade', 'EntidadeController@show')->middleware('validaUsuario');
Route::get('entidade/alterar/{id}', 'EntidadeController@edit')->middleware('validaUsuario');
Route::put('entidade-atualizar/{id}', 'EntidadeController@update')->middleware('validaUsuario');
Route::get('/entidade/excluir/{id}', 'EntidadeController@destroy')->middleware('validaUsuario');

Route::get('gerenciar-usuario', 'UsuarioController@index')->middleware('validaUsuario');
Route::get('usuario-incluir', 'UsuarioController@create')->middleware('validaUsuario');
Route::get('cadastrar-usuarios/configurar/{id}', 'UsuarioController@configurarUsuario')->middleware('validaUsuario');
Route::post('/cad-usuario/inserir', 'UsuarioController@store')->middleware('validaUsuario');
Route::get('/usuario/excluir/{id}', 'UsuarioController@destroy')->middleware('validaUsuario');
Route::get('/usuario/alterar/{id}', 'UsuarioController@edit')->middleware('validaUsuario');
Route::put('usuario-atualizar/{id}', 'UsuarioController@update')->middleware('validaUsuario');
Route::get('/usuario/gerar-Senha/{id}', 'UsuarioController@gerarSenha')->middleware('validaUsuario');
Route::get('/usuario/alterar-senha', 'UsuarioController@alteraSenha')->middleware('validaUsuario');
Route::post('/usuario/gravaSenha', 'UsuarioController@gravaSenha')->middleware('validaUsuario');


Route::get('gerenciar-itemCatalogo', 'ItemCatalogoController@index')->middleware('validaUsuario');
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

Route::get('/localizador', 'LocalizadorController@index')->middleware('validaUsuario');
Route::post('/localizador/inserir', 'LocalizadorController@store')->middleware('validaUsuario');
Route::get('/localizador/excluir/{id}', 'LocalizadorController@destroy')->middleware('validaUsuario');
Route::get('/localizador/alterar/{id}', 'LocalizadorController@edit')->middleware('validaUsuario');
Route::put('/localizador/atualizar/{id}', 'LocalizadorController@update')->middleware('validaUsuario');


Route::get('/fase-etaria', 'FaseEtariaController@index')->middleware('validaUsuario');
Route::post('/fase-etaria/inserir', 'FaseEtariaController@store')->middleware('validaUsuario');
Route::get('/fase-etaria/excluir/{id}', 'FaseEtariaController@destroy')->middleware('validaUsuario');
Route::get('/fase-etaria/alterar/{id}', 'FaseEtariaController@edit')->middleware('validaUsuario');
Route::put('/fase-etaria/atualizar/{id}', 'FaseEtariaController@edit')->middleware('validaUsuario');

Route::get('/deposito', 'DepositoController@index')->middleware('validaUsuario');
Route::post('/deposito/inserir', 'DepositoController@store')->middleware('validaUsuario');
Route::get('/deposito/excluir/{id}', 'DepositoController@destroy')->middleware('validaUsuario');
Route::get('/deposito/alterar/{id}', 'DepositoController@edit')->middleware('validaUsuario');
Route::put('/deposito/atualizar/{id}', 'DepositoController@update')->middleware('validaUsuario');


Route::get('/combo/catItem/{id}', 'CadastroInicialController@getCategoria')->middleware('validaUsuario');
Route::get('/combo/catForm/{id}', 'CadastroInicialController@getFormCadastro')->middleware('validaUsuario');
Route::get('/combo/valor/{id}', 'CadastroInicialController@getValor')->middleware('validaUsuario');
Route::get('/combo/catFormFinal/{id}', 'CadastroInicialController@getFormCadastroFinal')->middleware('validaUsuario');
Route::get('/combo/catValVariado/{id}', 'CadastroInicialController@getValorVariado')->middleware('validaUsuario');
Route::get('/combo/composicao/{id}', 'CadastroInicialController@getComposicao')->middleware('validaUsuario');
Route::post('/cad-inicial-material/inserir', 'CadastroInicialController@store')->middleware('validaUsuario');
Route::get('/usuario-logado', 'CadastroInicialController@search');


Route::get('/gerenciar-cadastro-inicial', 'CadastroInicialController@index')->middleware('validaUsuario');
Route::get('/gerenciar-cadastro-inicial/incluir', 'CadastroInicialController@create')->middleware('validaUsuario');
Route::get('/gerenciar-cadastro-inicial/excluir/{id}', 'CadastroInicialController@destroy')->middleware('validaUsuario');
Route::get('/editar-cadastro-inicial/{id}', 'CadastroInicialController@formEditar')->name('formeditar');
Route::put('/gerenciar-cadastro-inicial/alterar/{id}', 'CadastroInicialController@editar')->middleware('validaUsuario');


// Route::get('/combo/marcaItem/{id}', 'CadastroInicialController@getCategoria')->middleware('validaUsuario');
Route::get('/combo/tamanho/{id}', 'CadastroInicialController@getTamanho')->middleware('validaUsuario');
Route::get('/combo/embalagem/{id}', 'CadastroInicialController@getEmbalagem')->middleware('validaUsuario');

Route::get('/barcode', 'BarcodeController@index');

Route::get('/item_material/{id}', 'BarcodeController@show');




Route::any('/gerenciar-vendas', 'GerenciarvendasController@index')->name('vendas.index');
Route::get('/gerenciar-vendas/excluir/{id}', 'GerenciarvendasController@delete');
Route::get('/gerenciar-vendas/{id}', 'GerenciarvendasController@update');
Route::get('/gerenciar-vendas/finalizar/{id}', 'GerenciarvendasController@update');
Route::get('/gerenciar-vendas/demonstrativo/{id}', 'GerenciarvendasController@update');


Route::get('/registrar-venda', 'RegistrarVendaController@index');
Route::get('/registrar-venda/buscaritem', 'RegistrarVendaController@buscaritem');
Route::get('/registrar-venda/editar/{id}', 'RegistrarVendaController@editar');
Route::get('/registrar-venda/getItem/{id}', 'RegistrarVendaController@getItem');
Route::get('/registrar-venda/setVenda/{id_pessoa}/{data_venda}/{id_usuario}', 'RegistrarVendaController@setVenda');
Route::get('/registrar-venda/setItemLista/{id_item}/{id_venda}', 'RegistrarVendaController@setItemLista');
Route::get('/registrar-venda/removeItemLista/{id_item}/{id_venda}', 'RegistrarVendaController@removeItemLista');
Route::get('/registrar-venda/cancelarVenda/{id_venda}', 'RegistrarVendaController@cancelarVenda');
Route::get('/registrar-venda/concluirVenda/{id_venda}/{vlr_total}', 'RegistrarVendaController@concluirVenda');



Route::get('/cad-sit-venda', 'SituacaovendaController@index');


Route::get('/gerenciar-pagamentos/{id}', 'GerenciarpagamentoController@show')->name('pagamentos.show');
Route::post('/gerenciar-pagamentos/{id}', 'GerenciarpagamentoController@inserir')->middleware('validaUsuario');
Route::delete('/gerenciar-pagamentos/{id}', 'GerenciarpagamentoController@destroy')->middleware('validaUsuario');

Route::get('/alerta-pagamento', 'GerenciarpagamentoController@inserir')->middleware('validaUsuario');


Route::get('/demonstrativo/{id}', 'GerenciardemonstrativoController@index');

Route::get('/relatorio-vendas', 'RelatoriosController@index');

Route::get('/inventarios', 'GerenciarInventariosController@index');

