<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('invoices.invoice');
});

// Route::get('/invoice_detail', 'InvoicesController@show');
Route::get('/invoice_detail', 'InvoicesController@edit');
Route::post('/invoice_detail','InvoicesController@update');
// Route::patch('/invoice_detail','InvoicesController@update');
// Route::resource('/invoice_detail', 'InvoicesController');
