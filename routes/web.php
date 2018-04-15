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

Route::get('/', 'ClienteController@index');
Route::get('/residencia/{id}','ClienteController@residencia');
Route::post('/procurar', 'ClienteController@procurar');
Route::post('cadastrar', 'Auth\RegisterController@cadastraUsuarioLogin')->name('cadastrar');

Route::resource('residencias','ResidenciasController');
Route::resource('users','Auth\RegisterController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rota para mensagens.
Route::post('/mensagens/enviar', 'MensagensController@enviar')->name('enviarMensagem');
Route::get('/mensagens/recebidas/{user}', 'MensagensController@verficaMensagensRecebidas')->name('mensagensRecebidas');
Route::get('/mensagens/enviadas/{user}', 'MensagensController@verificaMensagensEnviadas')->name('mensagensEnviadas');