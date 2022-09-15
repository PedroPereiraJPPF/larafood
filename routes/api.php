<?php

Route::get('/tenants/{uuid}', 'Api\TenantApiController@getTenantByUuid');
Route::get('/tenants', 'Api\TenantApiController@index');

Route::get('/categoiries', 'Api\CategoryApiController@categoriesByTenant');

Route::get('/debug', function(){
    return [
        'aparece' => 'deu certo',
    ];
});
