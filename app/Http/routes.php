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
Route::get('/anuncio/editar/{id}', 'AnuncioController@showEditarItemPage@{id}');
Route::post('/anuncio/editar/{id}', 'AnuncioController@editarAnuncio@{id}');
Route::get('/anuncio/deletar/{id}', 'AnuncioController@deletaAnuncio@{id}');
Route::get('/anuncio/recebidos', 'InteresseController@showInteressesRecebidosPage');
Route::post('anuncio/por-localizacao', 'CategoriaController@showAnunciosByLocation');
Route::post('anuncio/por-preco', 'CategoriaController@showAnunciosByPrice');

Route::post('anuncio/gera-boleto', 'AnuncioController@geraBoletoPdf');
Route::get('anuncio/{id}', 'CategoriaController@showAnuncioPage@{id}');
Route::post('anuncio/{id}', 'InteresseController@enviarInteresse@{id}');
Route::post('anuncio/{id}/comentar', 'ComentarioController@enviarComentario');
Route::get('anuncio/{id}/comentar', 'CategoriaController@showAnuncioPage@{id}');

Route::get('categoria/recentes', 'CategoriaController@showAnunciosRecentes');
Route::get('categoria/destaques', 'CategoriaController@showAnunciosDestaques');
Route::get('categoria/{id}', 'CategoriaController@showAnunciosByCat@{id}');
Route::get('categoria', 'CategoriaController@showCategoriasPage');

Route::get('pesquisa', 'CategoriaController@showAnunciosBySearch');

Route::post('perfil/fotoperfil', 'ProfileController@uploadFotoPerfil');
Route::get('perfil', 'ProfileController@perfil');
Route::get('perfil/editar', 'ProfileController@showEditarPerfilPage');
Route::post('perfil/editar', 'ProfileController@editarPerfil');
Route::get('perfil/alterarsenha', 'ProfileController@paginaAlterarSenha');
Route::post('perfil/alterarsenha', 'ProfileController@alterarSenha');

Route::get('denuncia/anuncioid={id}', 'DenunciaController@showDenunciaPage');
Route::post('denuncia/anuncioid={id}', 'DenunciaController@denunciaAnuncio');

Route::get('ajuda', 'HomeController@paginaDeAjuda');
Route::post('ajuda', 'HomeController@enviarContatoAjuda');

Route::get('regras', 'HomeController@paginaDeRegras');


/* Rotas da área restrita */

Route::get('restrito', 'AdminController@showRestritoPage');
Route::post('restrito', 'AdminController@loginAdmin');
Route::get('restrito/logout', 'AdminController@logoutAdmin');

Route::get('restrito/usuarios', 'AdminController@gerenciaUsuarios');
Route::post('restrito/usuarios', 'AdminController@procuraUsuarios');
Route::get('restrito/usuarios/novo', 'AdminController@criaUsuario');
Route::get('restrito/usuarios/{email}', 'AdminController@updateUsuario@{email}');
Route::get('restrito/usuarios/delete/{email}', 'AdminController@deletaUsuario@{email}');
Route::post('restrito/usuarios/{email}', 'AdminController@aplicaUpdateUsuario');

Route::get('restrito/anuncios', 'AdminController@gerenciaAnuncios');
Route::get('restrito/anuncios/{id}', 'AdminController@visualizarAnuncio@{id}');
Route::post('restrito/anuncios', 'AdminController@procuraAnuncios');
Route::get('restrito/anuncios/delete/{id}', 'AdminController@deletaAnuncio@{id}');
Route::get('restrito/denuncias', 'AdminController@gerenciaDenuncias');

Route::post('restrito/addcat', 'AdminController@addCategoria');
Route::post('restrito/addpag', 'AdminController@addPagamento');
