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

// Route::get('/', function()
// {
//   return view('index');
// });
//
// Route::get('/invoice_detail', function () {
//     return view('invoices.invoice_detail');
// });

//Route::resource('invoices','InvoicesController');

Route::get('/', 'InvoicesController@index');
//
Route::get('/invoice_detail', 'InvoicesController@show');
