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
// registrar planos
Route::get('/admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
// editar registros
Route::put('admin/plans/{url}', 'Admin\PlanController@update')->name('plans.update');
Route::get('admin/plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');
//pesquisar registros
Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');
Route::post('/admin/plans/', 'Admin\PlanController@store')->name('plans.store');
// mostrar registros com detalhes
Route::get('/admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');
// deletar registros
Route::delete('/admin/plans/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');

Route::get('/admin/plans', 'Admin\PlanController@index')->name('plans.index');

Route::get('/admin', 'Admin\PlanController@index')->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
