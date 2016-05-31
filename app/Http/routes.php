<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function() {
  return view('welcome');
});

//usar quando quiser autenticar na rota
Route::get('/home', 'HomeController@index');
Route::get('/perfil', 'HomeController@perfil');
//controle das paginas de anuncios
Route::get('/anuncio/novo', 'AnuncioController@showAnuncioForm');
Route::post('/anuncio/novo', 'AnuncioController@createAnuncio');
Route::get('/anuncio/interesses', 'AnuncioController@showInteressesPage');
Route::get('/anuncio/meusitens', 'AnuncioController@showMeusItensPage');


Route::get('anuncio/{id}', 'AnuncioController@showAnuncioPage@{id}');
Route::post('anuncio/{id}', 'AnuncioController@enviarInteresse@{id}');
