<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function(){

    //Rotas de Permissions
    Route::any('/permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');


    //Rotas de Profiles
    Route::any('/profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');


    // detalhes do plan
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}/update', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
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

    Route::get('/', 'PlanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});
