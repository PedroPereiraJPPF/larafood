<?php

Route::prefix('v1')->namespace('Api')->group(function () {
    Route::get('/tenants/{uuid}', 'TenantApiController@getTenantByUuid');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/products', 'ProductApiController@productsByTenant');
    Route::get('/products/{flag}', 'ProductApiController@show');

    Route::get('/debug', function(){
        return [
            'aparece' => 'deu certo',
        ];
    });
});
