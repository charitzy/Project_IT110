<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Models\Category;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;



// Route::get('/', function () {
//     return response()->json([
//         'message' => 'Welcome App Api test'
//     ]);
// });


// Route::middleware('web')->get('/csrf-token', function () {
//     return response()->json(['csrf_token' => csrf_token()]);
// });

Route::get('/csrf-token', function (Request $request) {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome App Api test'
    ]);
});


Route::post('/register', [AuthController::class, 'register']);

// //Registration and Login 
// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//Public Routes
Route::get('/category/search/{category_name}', [CategoryController::class, 'search']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/review/{id}', [ReviewController::class, 'show']);
Route::get('/review', [ReviewController::class, 'index']);



//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/category', [CategoryController::class, 'store']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/product', [ProductController::class, 'store']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);


    Route::post('/review', [ReviewController::class, 'store']);
    Route::delete('/review/{id}', [ReviewController::class, 'destroy']);


    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

    Route::get('/order-details', [OrderDetailController::class, 'index']);
    Route::post('/order-details', [OrderDetailController::class, 'store']);
    Route::delete('/order-details/{id}', [OrderDetailController::class, 'destroy']);


    Route::get('/payments', [PaymentController::class, 'index']);
    Route::post('/payments', [PaymentController::class, 'store']);
    Route::put('/payments/{id}', [PaymentController::class, 'update']);
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);

    Route::get('/purchases', [PurchaseController::class, 'index']);
});
