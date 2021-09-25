<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hotel\RoomController;
use App\Http\Controllers\Hotel\TypeController;
use App\Http\Controllers\Hotel\FloorController;
use App\Http\Controllers\Hotel\CustomerController;
use App\Http\Controllers\Hotel\BookingController;
use App\Http\Controllers\Hotel\ProductsController;
use App\Http\Controllers\Hotel\SellingController;
use App\Http\Controllers\Hotel\SellingDetailController;
use App\Http\Controllers\Hotel\MoneyLogController;
use App\Http\Controllers\Hotel\StockController;
use App\Http\Controllers\Hotel\SupplierController;
use App\Http\Controllers\Hotel\SupplierProductController;
use App\Http\Controllers\Hotel\HomeController;
use App\Http\Controllers\Hotel\RolesController;
use App\Http\Controllers\Hotel\EmployeeController;

Route::group(['prefix' => 'Hotel',  'middleware' => 'auth'], function () {
    Route::resource('room', RoomController::class);
    Route::get('customer-list', [RoomController::class, 'fetch_data']);
    Route::get('booking-list', [RoomController::class, 'paginateBooking']);
    Route::resource('type', TypeController::class);
    Route::resource('floor', FloorController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('selling', SellingController::class);
    Route::resource('selling-detail', SellingDetailController::class);
    Route::resource('money-log', MoneyLogController::class);
    Route::resource('stock', StockController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('supplier-product', SupplierProductController::class);
    Route::resource('home', HomeController::class);
    Route::resource('role', RolesController::class);
    Route::resource('employee', EmployeeController::class);
    Route::get('/seach', [CustomerController::class, 'seach'])->name('customer.seach');
    Route::get('/role/{id}/seachrole', [RolesController::class, 'seachRole'])->name('role.seach');
    Route::get('/role/{id}/seach', [RolesController::class, 'seach'])->name('role.seachContent');
});

Route::post('authlogin', [HomeController::class, 'postLogin']);
Route::get('authlogout', [HomeController::class, 'logout'])->name('user_logout');
Route::get('authlogin', [HomeController::class, 'login'])->middleware('CheckUser')->name('login');;
