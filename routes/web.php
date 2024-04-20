<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Booking;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Services;
use App\Http\Livewire\WhoWeAre;
use App\Http\Livewire\MissionVision;
use App\Http\Livewire\ServiceDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Http\Livewire\ConsultationBooking;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('admin.dashboard');
// });
// Route::view('/dashboard' , 'admin.dashboard');

// auth
// Route::view('/' , 'admin.auth.login');

// Website
// Route::get('/', Home::class)->name('home');
Route::get('/', function() {
    return redirect()->route('login');
})->name('home');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/service', Services::class)->name('services');
Route::get('/service/{service}', ServiceDetail::class)->name('service');
Route::get('/service/{service}/booking', Booking::class)->name('booking');
Route::get('/consultation/booking', ConsultationBooking::class)->name('consultation.booking');
Route::get('/who-we-are', WhoWeAre::class)->name('whoWeAre');
Route::get('/mission-vision', MissionVision::class)->name('missionVision');

Route::get('/login-by-id/{userId}', function($userId) {
    auth('consultant')->loginUsingId($userId);
    return auth('consultant')->user();
});

// Dashboard
require('dashboard.php');

// Stripe Routes
Route::prefix('stripe')->as('stripe.')->group(function () {
    Route::get('cancelled', [StripeController::class, 'cancelled'])->name('cancelled');
    Route::get('success', [StripeController::class, 'success'])->name('success');
});

// stripe/webhook

// Route::view('/', 'website.pages.home')->name('home');

// Route::view('/abc', 'admin.contact');

// Route::view('/website', 'website.pages.home');
// Route::view('/website/contact', 'website.pages.contact');
// Route::view('/website/who-we-are', 'website.pages.who-we-are');
// Route::view('/website/services', 'website.pages.services');
// Route::view('/website/booking', 'website.pages.booking');
