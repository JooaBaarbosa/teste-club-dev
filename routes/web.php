<?php

use Illuminate\Support\Facades\Auth;
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


Route::middleware('auth')->group(function () {
    Route::get('/', 'ProdutosController@index')->name('listar');
    Route::get('/produtos', 'ProdutosController@index')->name('listar');
    Route::get('/produtos/cadastro', 'ProdutosController@cadastro')->name('cadastrar');
    Route::post('/produtos/cadastro', 'ProdutosController@salvar')->name('salvar');
    Route::get('/produtos/{id}', 'ProdutosController@destroy')->name('delete');
    Route::get('/produtos/editar/{produtos}', 'ProdutosController@editar')->name('editar');
    Route::post('/produtos/editar/{produtos}', 'ProdutosController@update')->name('update');
});

Auth::routes();

