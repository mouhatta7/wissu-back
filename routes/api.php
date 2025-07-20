<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DressController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\AdminController;

// Routes pour les robes
Route::get('/dresses', [DressController::class, 'index']);
Route::get('/dresses/category/{type}', [DressController::class, 'getByCategory']);
Route::get('/dresses/{id}', [DressController::class, 'show']);
Route::post('/dresses', [DressController::class, 'store']);

// Routes pour les commandes
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);

// Routes pour l'admin
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/register', [AdminController::class, 'store']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::put('/admin/orders/{orderId}/status', [AdminController::class, 'updateOrderStatus']);