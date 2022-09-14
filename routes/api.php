<?php

Route::get('/tenants', 'Api\TenantApiController@index');

Route::get('/debug', function(){
    return [
        'aparece' => 'deu certo',
    ];
});
