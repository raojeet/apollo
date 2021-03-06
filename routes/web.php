<?php

Route::get('/', function () {
    return redirect()->route('login');
});

/**
 * Authentication Routes
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->middleware('guest')->name('login');
Route::post('login', 'Auth\LoginController@login')->middleware('guest');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->middleware('guest')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->middleware('guest')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->middleware('guest');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->middleware('guest')->name('password.email');

/**
 * Authenticated Routes
 */
Route::middleware('auth')->group(function () {
    Route::get('dashboard', 'DashboardController@show');

    Route::get('settings', 'UsersController@settings');
    Route::patch('settings', 'UsersController@update');

    Route::resource('customers', 'CustomersController');
    Route::resource('products', 'ProductsController');
    Route::post('products/{product}/forecast', 'ProductsController@forecast');
    Route::resource('suppliers', 'SuppliersController');

    Route::resource('purchases', 'PurchasesController');
    Route::post('purchases/{purchase}/process', 'PurchasesController@process');
    Route::resource('sales', 'SalesController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::get('company', 'CompaniesController@edit');
    Route::patch('company', 'CompaniesController@update');

    Route::resource('users', 'UsersController');
    Route::delete('users/{user}/restore', 'UsersController@restore')->name('users.restore');

    Route::resource('roles', 'RolesController');
    Route::resource('messages', 'MessagesController');

    Route::get('notifications/', 'NotificationsController@index');
    Route::get('notifications/{notification}', 'NotificationsController@show');

    Route::get('csv/product/forecast', 'CsvController@forecast');
    Route::get('csv/product/recap', 'CsvController@recap');
    Route::get('csv/product/sales', 'CsvController@sales');
    Route::get('csv/product/purchases', 'CsvController@purchases');
    Route::get('csv/product/purchases/open', 'CsvController@open_purchases');
});
