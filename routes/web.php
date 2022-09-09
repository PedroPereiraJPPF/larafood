<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function(){

    // rotas de categorias x produtos
    Route::get('products/{id}/categories/{idCategory}/delete', 'CategoryProductController@productCategoryDetach')->name('categories.detach');
    Route::post('products/{id}/categories', 'CategoryProductController@productCategoryAttach')->name('categories.attach');
    Route::any('products/{id}/categories/show', 'CategoryProductController@categoriesAvaliable')->name('categories.avaliable');
    Route::get('categories/{id}/categories', 'CategoryProductController@categories')->name('product.categories');
    Route::get('categories/{id}/products', 'CategoryProductController@products');


    //Rotas de produtos
    Route::any('products/search', 'ProductsController@search')->name('products.search');
    Route::resource('products', 'ProductsController');

    //Rotas de categorias
    Route::any('categories/search', 'CategoriesController@search')->name('categories.search');
    Route::resource('categories', 'CategoriesController');

    //Rotas de Users
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    //Rotas de Plan X Profile
    Route::get('/plan/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plan.profile.show');
    Route::post('plan/{id}/profiles', 'ACL\PlanProfileController@attachPlanProfile')->name('plan.profiles.attach');
    Route::get('plan/{id}/profiles/{idProfile}/detach', 'ACL\PlanProfileController@detachPlanProfile')->name('plan.profiles.detach');
    Route::get('/plan/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvaliable')->name('plan.profiles.avaliable');

    //Rotas de Permissions X profile
    Route::get('profiles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profile.permissions.detach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvaliable')->name('profile.permissions.avaliable');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profile.permissions.attach');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profile.permissions');
    Route::get('profiles/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('permissions.profile');


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

// rotas do site
Route::get('/plan/{url}', 'site\SiteController@plan')->name('plan.subscribe');
Route::get('/', 'site\SiteController@index');

Auth::routes();

