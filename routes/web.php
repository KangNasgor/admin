<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PhotographersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Photography_sessionsController;
use App\Http\Controllers\BookingsController;

Route::get('/dashboard', function(){
    return view('admin/dashboard/dashboard');
})->name('dashboard');
Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/register/proses', 'registerSubmit')->name('register.submit');
});
Route::controller(LoginController::class)->group(function() {
    Route::get('/', 'login')->name('login')->withoutMiddleware([AdminMiddleware::class]);
    Route::post('/login/proses', 'loginsubmit')->name('login.submit')->withoutMiddleware([AdminMiddleware::class]);
    Route::get('/logout', 'logout')->name('login.logout')->withoutMiddleware(AdminMiddleware::class);
});
Route::middleware(['admin'])->group( function () {
    Route::controller(CustomersController::class)->group(function () {
        Route::get('/customers', 'customers')->name('customers');
        Route::get('/customers/create', 'create')->name('customers.create');
        Route::post('/customers/create/update', 'store')->name('customers.update');
        Route::get('/customers/edit/{id}', 'edit')->name('customers.editpage');
        Route::put('/customers/softdelete/{id}', 'softdelete')->name('customers.softdelete');
        Route::put('/customers/edit/update/{id}', 'update')->name('customers.edit');    
        Route::get('/customers/restore/{id}', 'restore')->name('customers.restore');
        Route::delete('/customers/delete/{id}', 'delete')->name('customers.delete');
        Route::get('/customers/history', 'history')->name('customers.history');
    });    
    Route::controller(PhotographersController::class)->group(function () {
        Route::get('/photographers', 'photographers')->name('photographers');
        Route::get('/photographers/create', 'create')->name('photographers.create');
        Route::post('/photographers/create/update', 'store')->name('photographers.update');
        Route::get('/photographers/edit/{id}', 'edit')->name('photographers.editpage');
        Route::put('/photographers/softdelete/{id}', 'softdelete')->name('photographers.softdelete');
        Route::put('/photographers/edit/update/{id}', 'update')->name('photographers.edit');    
        Route::get('/photographers/restore/{id}', 'restore')->name('photographers.restore');
        Route::delete('/photographers/delete/{id}', 'delete')->name('photographers.delete');
        Route::get('/photographers/history', 'history')->name('photographers.history');
    });
    Route::controller(Photography_sessionsController::class)->group(function () {
        Route::get('/photography_sessions', 'photography_sessions')->name('photography_sessions');
        Route::get('/photography_sessions/create', 'create')->name('photography_sessions.create');
        Route::post('/photography_sessions/create/update', 'store')->name('photography_sessions.update');
        Route::get('/photography_sessions/edit/{id}', 'edit')->name('photography_sessions.editpage');
        Route::put('/photography_sessions/softdelete/{id}', 'softdelete')->name('photography_sessions.softdelete');
        Route::put('/photography_sessions/edit/update/{id}', 'update')->name('photography_sessions.edit');    
        Route::get('/photography_sessions/restore/{id}', 'restore')->name('photography_sessions.restore');
        Route::delete('/photography_sessions/delete/{id}', 'delete')->name('photography_sessions.delete');
        Route::get('/photography_sessions/history', 'history')->name('photography_sessions.history');
    });
    
    Route::controller(BookingsController::class)->group(function () {
        Route::get('/bookings', 'bookings')->name('bookings');
        Route::get('/bookings/create', 'create')->name('bookings.create');
        Route::post('/bookings/create/update', 'store')->name('bookings.update');
        Route::get('/bookings/edit/{id}', 'edit')->name('bookings.editpage');
        Route::put('/bookings/softdelete/{id}', 'softdelete')->name('bookings.softdelete');
        Route::put('/bookings/edit/update/{id}', 'update')->name('bookings.edit');    
        Route::get('/bookings/restore/{id}', 'restore')->name('bookings.restore');
        Route::delete('/bookings/delete/{id}', 'delete')->name('bookings.delete');
        Route::get('/bookings/history', 'history')->name('bookings.history');
    });
        
});
