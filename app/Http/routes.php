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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
	//dd(Auth::user());
    return view('home.home');
});

/*
 |---------------------------------------------------------------------------- 
 |	Minha Conta routes
 |----------------------------------------------------------------------------
 |
 |
 */

Route::get('/meu-cadastro', 'MinhaConta\MinhaContaController@meuCadastro');

Route::group(['prefix' => 'minha-conta', 'middleware' => 'auth'], function(){

	Route::get('/', 'MinhaConta\MinhaContaController@index');
});

/*
 |---------------------------------------------------------------------------- 
 |	Admin routes
 |----------------------------------------------------------------------------
 |
 |
 */


//carrega tela de login
Route::get('/admin/login', 'Admin\AdminLoginController@index');

//Autentica credenciais do user
Route::post('/admin/auth', 'Admin\AdminLoginController@auth')->name('admin.auth');

Route::get('/admin/logout', 'Admin\AdminLoginController@logout');

/*Route::get('/admin/login', function (){
	return \estoque\User::all();

});*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function()
{
	Route::get('/painel', 'Admin\AdminHomeController@index');	

	/**
	*	Produtc Routes
	*/
	//GET
	Route::get('/produtos', 'Admin\AdminProdutoController@index');
	Route::get('/produtos/novo', 'Admin\AdminProdutoController@create');
	Route::get('/produtos/detalhes/{id}', 'Admin\AdminProdutoController@show')->where('id', '[0-9]+');;
	Route::get('/produtos/excluir/{id}', 'Admin\AdminProdutoController@destroy');
	Route::get('/produtos/editar/{id}', 'Admin\AdminProdutoController@edit');
	
	//POST
	Route::post('/produtos/adicionar', 'Admin\AdminProdutoController@store');

	Route::post('/produtos/', 'Admin\AdminProdutoController@index');
});


//Site
Route::get('home', 'HomeController@index');

Route::controllers([
'auth' => 'Auth\AuthController',
'password' => 'Auth\PasswordController',
]);