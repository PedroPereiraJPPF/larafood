<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function(){
    
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    // registrar planos
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    // editar registros
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    //pesquisar registros
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    // mostrar registros com detalhes
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    // deletar registros
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');

    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::post('plans/', 'PlanController@store')->name('plans.store');

    Route::get('/', 'lanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});
