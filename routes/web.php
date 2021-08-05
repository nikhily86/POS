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

// ROUTE FOR HOME PAGE

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROUTE FOR ADMIN HOME PAGE

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// ROUTE FOR ADD SALES PERSON PAGE

Route::get('/addsales', [App\Http\Controllers\SalesController::class, 'addsales'])->middleware('is_admin');

// ROUTE FOR CREATING A NEW SALES PERSON 

Route::post('/add-sales', [App\Http\Controllers\SalesController::class, 'createSalesPerson'])->name('sales.add')->middleware('is_admin');

// ROUTE FOR ADD PRODUCT PAGE

Route::get('/addproduct', [App\Http\Controllers\ProductController::class, 'addproduct'])->middleware('is_admin');

// ROUTE FOR ADDING NEW PRODUCT TO DATABSE

Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'createProduct'])->name('product.add');

//ROUTE FOR GETTING PRICE OF SELECTED PRODUCT FROM DROPDOWN

Route::get('get_price/{name}', [App\Http\Controllers\ProductController::class, 'getprice'])->middleware('isUser');

// ROUTE FOR CREATING ORDER

Route::post('/createOrder' ,  [App\Http\Controllers\OrderController::class, 'createOrder'])->middleware('isUser');

// ROUTE FOR CREATING CUSTOMER

Route::post('/createCust' ,  [App\Http\Controllers\CustomerController::class, 'createCustomer'])->middleware('isUser');

// ROUTE FOR CHECHIKING ORDER

Route::get('/checkOrder' ,  [App\Http\Controllers\OrderController::class, 'checkOrder'])->middleware('isUser');

// ROUTE FOR VIEW PRODUCT SALES PAGE

Route::get('/statics',  [App\Http\Controllers\ShowStatics::class, 'statics'])->middleware('is_admin');

//ROUTE FOR EXPORTING CSV

Route::get('/export-csv', [App\Http\Controllers\ShowStatics::class, 'exportToCSV'])->middleware('is_admin');

//ROUTE FOR CREATING BILLING TABLE ROWS

Route::post('/checkTable', [App\Http\Controllers\TaskController::class, 'check'])->middleware('isUser');
