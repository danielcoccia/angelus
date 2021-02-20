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
Route::get('{folder}/{file}', 'LexaAdmin@index');

// when render first time project redirect
Route::get('/home', function () {
    return redirect('dashboard/index');
});

Route::get('/keep-live', "LexaAdmin@live");

// when render first time project redirect
Route::get('/', function () {
    return redirect('login');
});


Route::get('cad-tipo-material', 'TipoMaterialController@index');
Route::post('cad-tipo-material/inserir', 'TipoMaterialController@store');
Route::get('cad-tipo-material/excluir/{id}', 'TipoMaterialController@destroy');


Route::get('cad-embalagem', 'EmbalagemController@index');
Route::post('cad-embalagem/inserir', 'EmbalagemController@store');
Route::get('cad-embalagem/excluir/{id}', 'EmbalagemController@destroy');

Route::get('cad-genero', 'GeneroController@index');
Route::post('cad-genero/inserir', 'GeneroController@store');
Route::get('cad-genero/excluir/{id}', 'GeneroController@destroy');

Route::get('cad-tipo-estoque', 'TipoEstoqueController@index');
Route::post('cad-tipo-estoque/inserir', 'TipoEstoqueController@store');
Route::get('cad-tipo-estoque/excluir/{id}', 'TipoEstoqueController@destroy');

Route::get('cad-pagamento', 'TipoPagamentoController@index');
Route::post('cad-pagamento/inserir', 'TipoPagamentoController@store');
Route::get('cad-pagamento/excluir/{id}', 'TipoPagamentoController@destroy');

Route::get('cad-sit-doacao', 'SitDoacaoController@index');
Route::post('cad-sit-doacao/inserir', 'SitDoacaoController@store');
Route::get('cad-sit-doacao/excluir/{id}', 'SitDoacaoController@destroy');

Route::get('cad-pessoa', 'PessoaController@create');
Route::post('cad-pessoa/inserir', 'PessoaController@store');
Route::get('pesquisar-pessoa', 'PessoaController@index');
Route::post('pesquisar-pessoa/show', 'PessoaController@show');
Route::get('pessoa/alterar/{id}', 'PessoaController@edit');


Route::get('cad-entidade', 'EntidadeController@create');
Route::post('cad-entidade/inserir', 'EntidadeController@store');