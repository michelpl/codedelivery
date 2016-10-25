<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware' => 'auth.checkrole', 'as'=>'admin.'], function(){

    Route::group(['prefix'=>'categories', 'as'=>'categories.'], function(){
        Route::get('/', ['as' => 'index',  'uses' => 'CategoriesController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'CategoriesController@create']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoriesController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CategoriesController@update']);
        Route::post('store', ['as' => 'store',  'uses' => 'CategoriesController@store']);
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
        Route::get('/',        ['as' => 'index',  'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ProductsController@create']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductsController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ProductsController@update']);
        Route::post('store', ['as' => 'store',  'uses' => 'ProductsController@store']);
        Route::get('destroy/{id}', ['as' => 'destroy',  'uses' => 'ProductsController@destroy']);
    });

    Route::group(['prefix'=>'clients', 'as' => 'clients.'], function(){
        Route::get('/',        ['as' => 'index',  'uses' => 'ClientsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ClientsController@create']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ClientsController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ClientsController@update']);
        Route::post('store', ['as' => 'store',  'uses' => 'ClientsController@store']);
        Route::get('destroy/{id}', ['as' => 'destroy',  'uses' => 'ClientsController@destroy']);
    });

    Route::group(['prefix'=>'orders', 'as' => 'orders.'], function(){
        Route::get('/',        ['as' => 'index',  'uses' => 'OrdersController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'OrdersController@create']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'OrdersController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'OrdersController@update']);
        Route::post('store', ['as' => 'store',  'uses' => 'OrdersController@store']);
        Route::get('destroy/{id}', ['as' => 'destroy',  'uses' => 'OrdersController@destroy']);
        Route::get('newItem/{id}', ['as' => 'newItem',  'uses' => 'OrdersController@newItem']);

        Route::get('removeItem/{id}&{itemId}', ['as' => 'removeItem',  'uses' => 'OrdersController@removeItem']);
    });
    Route::group(['prefix'=>'orderItems', 'as' => 'orderItems.'], function(){
        Route::post('store', ['as' => 'store',  'uses' => 'OrderItemsController@store']);
    });

});




