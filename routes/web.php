<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionController;
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
    return view('auth.login');
});

//for invoicesDetails
Route::controller(InvoicesDetailsController::class)->group(function(){
    Route::get('InvoicesDetails' , 'index')->name('InvoicesDetails');
    Route::get('InvoicesDetails/edit/{id}' , 'edit')->name('InvoiceDetails.edit');
});

//for products
Route::controller(ProductsController::class)->group(function(){
    Route::get('products' , 'index')->name('products');
    Route::post('products/store' , 'store')->name('products.store');
    Route::get('products/edit/{id}' , 'edit')->name('products.edit');
    Route::PUT('products/update/{id}','update')->name('products.update');
    Route::get('products/delete/{id}' , 'delete')->name('products.delete');

});

//for Sections
Route::controller(SectionController::class)->group(function(){
    Route::get('sections' , 'index')->name('sections');
    Route::post('sections/store' , 'store')->name('sections.store');
    Route::get('sections/edit/{id}' , 'edit')->name('sections.edit');
    Route::PUT('sections/update/{id}','update')->name('sections.update');
    Route::get('sections/delete/{id}' , 'delete')->name('sections.delete');

});

//for invoices
Route::controller(InvoicesController::class)->group(function(){
    Route::get('invoices' , 'index')->name('invoices');
    Route::get('invoices/create' , 'create')->name('invoices.create');
    Route::post('invoices/store' , 'store')->name('invoices.store');
    Route::get('/section/{id}','getProducts')->name('invoices.getProducts');
});

//for Begin
Route::get('/{page}', [AdminController::class,'index']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
