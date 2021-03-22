<?php

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



Route::get('cad-tipo-material', 'TipoMaterialController@index')->middleware('validaUsuario');
Route::post('cad-tipo-material/inserir', 'TipoMaterialController@store')->middleware('validaUsuario');
Route::get('cad-tipo-material/excluir/{id}', 'TipoMaterialController@destroy')->middleware('validaUsuario');


Route::get('cad-embalagem', 'EmbalagemController@index')->middleware('validaUsuario');
Route::post('cad-embalagem/inserir', 'EmbalagemController@store')->middleware('validaUsuario');
Route::get('cad-embalagem/excluir/{id}', 'EmbalagemController@destroy')->middleware('validaUsuario');

Route::get('cad-genero', 'GeneroController@index')->middleware('validaUsuario');
Route::post('cad-genero/inserir', 'GeneroController@store')->middleware('validaUsuario');
Route::get('cad-genero/excluir/{id}', 'GeneroController@destroy')->middleware('validaUsuario');

Route::get('cad-tipo-estoque', 'TipoEstoqueController@index')->middleware('validaUsuario');
Route::post('cad-tipo-estoque/inserir', 'TipoEstoqueController@store')->middleware('validaUsuario');
Route::get('cad-tipo-estoque/excluir/{id}', 'TipoEstoqueController@destroy')->middleware('validaUsuario');

Route::get('cad-pagamento', 'TipoPagamentoController@index')->middleware('validaUsuario');
Route::post('cad-pagamento/inserir', 'TipoPagamentoController@store')->middleware('validaUsuario');
Route::get('cad-pagamento/excluir/{id}', 'TipoPagamentoController@destroy')->middleware('validaUsuario');

Route::get('cad-sit-doacao', 'SitDoacaoController@index')->middleware('validaUsuario');
Route::post('cad-sit-doacao/inserir', 'SitDoacaoController@store')->middleware('validaUsuario');
Route::get('cad-sit-doacao/excluir/{id}', 'SitDoacaoController@destroy')->middleware('validaUsuario');

Route::get('unidade-medida', 'UnidadeMedidaController@index')->middleware('validaUsuario');
Route::post('unidade-medida/inserir', 'UnidadeMedidaController@store')->middleware('validaUsuario');
Route::get('unidade-medida/excluir/{id}', 'UnidadeMedidaController@destroy')->middleware('validaUsuario');

Route::get('cad-pessoa', 'PessoaController@create')->middleware('validaUsuario');
Route::post('cad-pessoa/inserir', 'PessoaController@store')->middleware('validaUsuario');
Route::get('pesquisar-pessoa', 'PessoaController@index')->middleware('validaUsuario');
Route::post('pesquisar-pessoa/show', 'PessoaController@show')->middleware('validaUsuario');
Route::get('pessoa/alterar/{id}', 'PessoaController@edit')->middleware('validaUsuario');
Route::put('pessoa-atualizar/{id}', 'PessoaController@update')->middleware('validaUsuario');
Route::get('/pessoa/excluir/{id}', 'PessoaController@destroy')->middleware('validaUsuario');

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

Route::get('gerenciar-composicao', 'ComposicaoItemController@index')->middleware('validaUsuario');
Route::get('item-composicao/incluir/{id}', 'ComposicaoItemController@create')->middleware('validaUsuario');
Route::post('item-composicao/inserir', 'ComposicaoItemController@store')->middleware('validaUsuario');
Route::get('/item-composicao/excluir/{id}/{idComposicao}', 'ComposicaoItemController@destroy')->middleware('validaUsuario');
