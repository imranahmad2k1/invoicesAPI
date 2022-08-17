<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(InvoiceController::class)->group(function(){
    Route::post('invoice','create');
    Route::get('invoice','read');
    Route::put('invoice/{invoice}','update');
    Route::delete('invoice/{id}','destroy');
});

// Route::controller(InvoiceitemController::class)->group(function(){
//     Route::post('invoice','create');
//     Route::get('invoice','read');
//     Route::put('invoice/{invoice}','update');
//     Route::delete('invoice/{id}','destroy');
// });