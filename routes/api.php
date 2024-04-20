<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ConsultationController;

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

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/services', [ConsultationController::class, 'services']);
Route::get('/service/{service}', [ConsultationController::class, 'service']);
Route::get('/service/{service}/consultant', [ConsultationController::class, 'consultants']);
Route::get('/consultant/{consultant}/calendar', [ConsultationController::class, 'calendar']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/user', [AuthController::class, 'loggedInUser']);
  Route::post('/stripe-checkout', [BookingController::class, 'stripeCheckout']);
  Route::post('/save-booking', [BookingController::class, 'saveBooking']);
  Route::get('/bookings', [BookingController::class, 'bookings']);
});
