<?php
use App\Http\Livewire\Login;
use App\Http\Livewire\Signup;
use App\Http\Livewire\Contact;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\Dashboard\User;
use App\Http\Livewire\Dashboard\Consultant;
use App\Http\Livewire\ForgotPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard\Service;
use App\Http\Livewire\Dashboard\Calendar;
use App\Http\Livewire\Dashboard\Settings;
use App\Http\Livewire\Dashboard\Statistic;
use App\Http\Controllers\GeneralController;
use App\Http\Livewire\Dashboard\BookingNew;
use App\Http\Livewire\Dashboard\Calendar\Slot;
use App\Http\Livewire\Dashboard\Calendar\BulkCreate;
use App\Http\Livewire\Dashboard\User\Create as UserCreate;
use App\Http\Livewire\Dashboard\User\Update as UserUpdate;
use App\Http\Livewire\Dashboard\Consultant\Create as ConsultantCreate;
use App\Http\Livewire\Dashboard\Consultant\Update as ConsultantUpdate;
use App\Http\Livewire\Dashboard\Booking\Reschedule\History;
use App\Http\Livewire\Dashboard\Contact\Show as ContactShow;
use App\Http\Livewire\Dashboard\Service\Create as ServiceCreate;
use App\Http\Livewire\Dashboard\Service\Update as ServiceUpdate;
use App\Http\Livewire\Dashboard\Calendar\Create as CalendarCreate;
use App\Http\Livewire\Dashboard\Calendar\Slot\Create as SlotCreate;
use App\Http\Livewire\Dashboard\Calendar\Slot\Update as SlotUpdate;

Route::prefix('admin')->group(function () {
    // Auth
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', Login::class)->name('login');
        Route::get('/signup', Signup::class)->name('signup');
        Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
        Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
    });
    // Dashboard
    Route::middleware(['auth:consultant'])->as('admin.')->group(function () {
        Route::get('/booking/reschedule', History::class)->name('booking.reschedule.history');
        // Route::get('/booking/{booking?}', Booking::class)->name('booking');
        Route::get('/booking/{booking?}', BookingNew::class)->name('booking');
        // Route::get('/booking/{booking}', Dashboard\Booking\Show::class)->name('booking.show');
        Route::get('/calendar', Calendar::class)->name('calendar');
        Route::get('/calendar/create', CalendarCreate::class)->name('calendar.create');
        Route::get('/calendar/create-bulk', BulkCreate::class)->name('calendar.bulkcreate');
        Route::get('/calendar/{calendar}/slot', Slot::class)->name('slot');
        Route::get('/calendar/{calendar}/slot/create', SlotCreate::class)->name('slot.create');
        Route::get('/calendar/{calendar}/slot/{slot}', SlotUpdate::class)->name('slot.update');

    });        
    Route::middleware(['auth'])->as('admin.')->group(function () {
        Route::get('/dashboard', Statistic::class)->name('home');
        Route::get('/contact', Contact::class)->name('contact');
        Route::get('/contact/{contact}', ContactShow::class)->name('contact.show');
        Route::get('/service', Service::class)->name('service');
        Route::get('/service/create', ServiceCreate::class)->name('service.create');
        Route::get('/service/{service}', ServiceUpdate::class)->name('service.update');
        Route::get('/user', User::class)->name('user');
        Route::get('/user/create', UserCreate::class)->name('user.create');
        Route::get('/user/{user}/update', UserUpdate::class)->name('user.update');
        Route::get('/consultant', Consultant::class)->name('consultant');
        Route::get('/consultant/create', ConsultantCreate::class)->name('consultant.create');
        Route::get('/consultant/{consultant}/update', ConsultantUpdate::class)->name('consultant.update');
        Route::get('/settings', Settings::class)->name('profileUpdate');
    });
    Route::get('/logout', [GeneralController::class, 'logout'])->name('logout');
    // Zoom Integration
    Route::get('/integrate-zoom-client', [GeneralController::class, 'zoom'])->name('zoom.redirect');
});
