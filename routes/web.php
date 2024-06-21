<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SalesController;

Route::get('/', [DashboardController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::resource('products', ProductController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('sales', SalesController::class)->only(['create', 'store']);
