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


Route::get('/', 'HomeController@index');


//controle das paginas de anuncios
Route::get('/anuncio/novo', 'AnuncioController@showAnuncioForm');
Route::post('/anuncio/novo', 'AnuncioController@createAnuncio');
Route::get('/anuncio/interesses', 'InteresseController@showInteressesPage');
Route::get('/anuncio/meusitens', 'AnuncioController@showMeusItensPage');
Route::get('/anuncio/recebidos', 'InteresseController@showInteressesRecebidosPage');


Route::get('anuncio/{id}', 'CategoriaController@showAnuncioPage@{id}');
Route::post('anuncio/{id}', 'InteresseController@enviarInteresse@{id}');


//Route::get('categoria', 'AnuncioController');
Route::get('categoria/{id}', 'CategoriaController@showAnunciosByCat@{id}');
Route::get('pesquisa/{palavrachave}', 'CategoriaController@showAnunciosByUrl@{palavrachave}');

Route::post('pesquisa', 'CategoriaController@showAnunciosBySearch');

Route::post('perfil/fotoperfil', 'ProfileController@uploadFotoPerfil');
Route::get('perfil', 'ProfileController@perfil');
Route::get('perfil/editar', 'ProfileController@showEditarPerfilPage');
Route::post('perfil/editar', 'ProfileController@editarPerfil');
