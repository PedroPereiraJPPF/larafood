<?php

Route::get('/tenants/{uuid}', 'Api\TenantApiController@getTenantByUuid');
Route::get('/tenants', 'Api\TenantApiController@index');

Route::get('/categories/{url}', 'Api\CategoryApiController@show');
Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');

Route::get('/products', 'Api\ProductApiController@productsByTenant');

Route::get('/debug', function(){
    return [
        'aparece' => 'deu certo',
    ];
});
