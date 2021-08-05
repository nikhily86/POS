<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Models\Sale;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/addsales', [App\Http\Controllers\SalesController::class, 'addsales'])->middleware('is_admin');

Route::post('/add-sales', [App\Http\Controllers\SalesController::class, 'createSalesPerson'])->name('sales.add')->middleware('is_admin');

Route::get('/addproduct', [App\Http\Controllers\ProductController::class, 'addproduct'])->middleware('is_admin');

Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'createProduct'])->name('product.add');

// Route::get('/saleslogin', [App\Http\Controllers\SalesLoginController::class, 'check']);

// Route::post('/sales-login', [App\Http\Controllers\SalesLoginController::class, 'checklogin']);

Route::get('get_price/{name}', [App\Http\Controllers\ProductController::class, 'getprice'])->middleware('isUser');

Route::post('/createOrder' ,  [App\Http\Controllers\OrderController::class, 'createOrder'])->middleware('isUser');

Route::post('/createCust' ,  [App\Http\Controllers\CustomerController::class, 'createCustomer'])->middleware('isUser');

Route::get('/checkOrder' ,  [App\Http\Controllers\OrderController::class, 'checkOrder'])->middleware('isUser');

Route::get('/statics',  [App\Http\Controllers\ShowStatics::class, 'statics'])->middleware('is_admin');

Route::get('/export-csv', [App\Http\Controllers\ShowStatics::class, 'exportToCSV'])->middleware('is_admin');

Route::post('/checkTable', [App\Http\Controllers\TaskController::class, 'check'])->middleware('isUser');
