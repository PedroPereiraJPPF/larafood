<?php

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/v1/orders', 'Api\OrderApiController@store');
    Route::get('/auth/v1/myOrders', 'Api\OrderApiController@myOrders');
    Route::get('auth/me', 'Api\Auth\AuthClientController@me');
    Route::post('auth/logout', 'Api\Auth\AuthClientController@logout');
});


Route::get('teste', function (order $order) {
    $client = Order::first();

    dd($order->products());
});

Route::prefix('v1')->namespace('Api')->group(function () {
    Route::get('/tenants/{uuid}', 'TenantApiController@getTenantByUuid');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/products', 'ProductApiController@productsByTenant');
    Route::get('/products/{uuid}', 'ProductApiController@show');

    Route::post('/client', 'Auth\RegisterController@store');

    Route::post('/sactum/token', 'Auth\AuthClientController@auth');

    Route::post('/orders', 'OrderApiController@store');
    Route::get('/orders/{identify}', 'OrderApiController@show');
});

