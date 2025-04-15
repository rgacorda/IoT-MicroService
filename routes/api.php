<?php

use App\Http\Controllers\Feature\RelayController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//FEATURE function
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('features', FeatureController::class);
});

//RELAY Function
Route::middleware(['auth:sanctum', 'permission:manage-relays'])->group(function () {
    Route::apiResource('relays', RelayController::class);
    Route::patch('relays/{relay}/toggle', [RelayController::class, 'toggle']);
});

//PAYMENT Function
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('payment', [PaymentController::class, 'paymentFeature']);
});


