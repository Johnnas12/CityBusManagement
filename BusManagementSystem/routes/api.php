<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassengerSideResponses;
use App\Http\Controllers\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('search', [PassengerSideResponses::class, 'searchResults']);
Route::post('/chappa', [Payment::class, 'makePayment']);
Route::post('/ticket', [PassengerSideResponses::class, 'ticket']);
Route::post('refresh/{id}', [PassengerSideResponses::class, 'ticketRefresh']);
Route::post('/{id}', [PassengerSideResponses::class, 'updateUnreservedSeats']);







