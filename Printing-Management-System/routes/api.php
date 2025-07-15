<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| API routes with authentication via Sanctum or tokens.
|
*/

// Get authenticated user info
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'user' => $request->user(),
    ]);
});

// Example protected API routes
Route::middleware('auth:sanctum')->group(function () {
    // Uncomment and define your controllers
    // Route::apiResource('users', UserController::class);
    // Route::apiResource('suppliers', SupplierController::class);
    // Route::apiResource('orders', OrderController::class);
    // Route::apiResource('materials', MaterialController::class);
    // Route::apiResource('products', ProductController::class);
});
