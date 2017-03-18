<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutosController@lista');
Route::post('/produtos', 'ProdutosController@salvar');
Route::delete('/produtos', 'ProdutosController@excluir');
Route::get('/produtos/novo', 'ProdutosController@form');
Route::get('/produtos/{id}', 'ProdutosController@editar');
Route::put('/produtos', 'ProdutosController@alterar');

Auth::routes();

Route::get('/home', 'HomeController@index');
