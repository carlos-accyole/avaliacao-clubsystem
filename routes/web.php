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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos','App\Http\Controllers\ProdutosController@index')->name('listar_produtos');
Route::get('/produtos/criar','App\Http\Controllers\ProdutosController@create')->name('form_criar_produto');
Route::post('/produtos/criar','App\Http\Controllers\ProdutosController@store');
Route::delete('/produtos/{id}','App\Http\Controllers\ProdutosController@destroy');
Route::post('/produtos/{id}/editaNome', 'App\Http\Controllers\ProdutosController@editaNome');
Route::get('/login','App\Http\Controllers\LoginController@index');
Route::post('/login','App\Http\Controllers\LoginController@logar');
Route::get('/registrar','App\Http\Controllers\RegistroController@create');
Route::post('/registrar','App\Http\Controllers\RegistroController@store');

Route::get('/sair', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});
