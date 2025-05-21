

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
  // <<< move this AFTER Route facade import


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/', [ProductController::class, 'index']);


Route::post('/cart/add/{productId}', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);


Route::get('/checkout', [CheckoutController::class, 'form']);
Route::post('/checkout', [CheckoutController::class, 'submit']);



Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/orders/{order_id}', [OrderController::class, 'show']);

Route::get('/order/success', function () {
    return view('checkout.success');
});

Route::get('/orders/history', [OrderController::class, 'history']);






Route::prefix('admin/products')->group(function () {
    Route::get('/', [AdminProductController::class, 'index']);
    Route::get('/create', [AdminProductController::class, 'create']);
    Route::post('/', [AdminProductController::class, 'store']);

    //  REQUIRED for EDIT to work
    Route::get('/{id}/edit', [AdminProductController::class, 'edit']);
    Route::post('/{id}/update', [AdminProductController::class, 'update']);

    //  REQUIRED for DELETE to work
    Route::post('/{id}/delete', [AdminProductController::class, 'destroy']);
});


/*
// Import EventController for handling event-related routes
use App\Http\Controllers\EventController; 
// Import Event model, representing the events in the database
use App\Models\Event;  
// Import Laravel's Route facade for defining application routes
use Illuminate\Support\Facades\Route;  // Import Laravel's Route facade for defining application routes

// Define a route for the homepage ('/') that calls the 'index' method of EventController
Route::get('/',[EventController::class, 'index']);*/ 
/*
Route::get('/event/{event_id}',[EventController::class, 'get']);


Route::post('/event/{event_id}',[EventController::class, 'signup']);
Route::get('/event', function () {
    return view('home');
}); 
*/


/*Route::get('/', function () {
    print "Hello World!";
    // return view('welcome');

    $rs = \DB::select("select version() as version");
    print $rs[0]->version;
}

);*/
