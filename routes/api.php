<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('auth/logout', 'Api\Auth\AuthClientController@logout');
});


Route::get('teste', function () {
    $client = Client::first();

    $token = $client->createToken('token-teste');

    dd($token->plainTextToken);
});

Route::prefix('v1')->namespace('Api')->group(function () {
    Route::get('/tenants/{uuid}', 'TenantApiController@getTenantByUuid');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/products', 'ProductApiController@productsByTenant');
    Route::get('/products/{flag}', 'ProductApiController@show');

    Route::post('/client', 'Auth\RegisterController@store');

    Route::post('/sactum/token', 'Auth\AuthClientController@auth');
});

