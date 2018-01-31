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
    return view('vendor/adminlte/login');
});

Route::resource('/vazamentos', 'VazamentoController');
Route::resource('/faltadeagua', 'FaltaDeAguaController');
Route::resource('/ligacaoirregular', 'LigacaoIrregularController');
Route::resource('/home', 'HomeController');

Auth::routes();




